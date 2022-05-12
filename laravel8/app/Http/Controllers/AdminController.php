<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Studies;
use App\Models\Discover;

class AdminController extends Controller
{

    public function editDiscover(Request $request)
    {

        extract($request->all());
        //$title
        //$content
        Discover::query()->where("id_discover", $request->all()[''])->update();

        //return redirect('/admin/discover');
    }


    public function show($param){
        if(method_exists($this, $param)){
            return $this->$param();
        } else {
            return $this->error(404);
        }
    }

    public function new($param){
        return dd($param);
        $x = ucfirst("new".$param);
        if(method_exists($this, $x)){
            return $this->$x();
        } else {
            return $this->error(404);
        }
    }

    public function newDiscover(){
        $method = $_SERVER['REQUEST_METHOD'];
        if($method == 'GET'){
            return view('admin.new.discover');
        } else if($method == 'POST'){
            $bullets = $_POST[''];
            $product_id = Input::get('product_id');
            $query = "INSERT INTO bullets (product_id, user_id,bullet_content, bullet_deleted, created_at, updated_at) 
                                VALUES (?, ?, ?, ?, ?, ?)";
            foreach ($bullets as $bullet) {
                $values = [$product_id,$user_id,$bullet,'N',$date,$date];
                DB::insert($query, $values);
            }
            Discover::insert(`INSERT INTO content(id_content, content) VALUES (`.uniqid().`,'')`);
            Discover::insert(`INSERT INTO content(id_content, content) VALUES (`.uniqid().`,'')`);

            return redirect('/admin/discover');
        }
    }

    public function newStudies(){
        $method = $_SERVER['REQUEST_METHOD'];
        if($method == 'GET'){
            return view('admin.new.studies');
        } else if($method == 'POST'){
            Studies::insert(`INSERT INTO content(id_content, content) VALUES (`.uniqid().`,'')`);
            return view('admin.studies');
        }
    }
    

    public function delete($param, Request $request){
        if(method_exists($this, $param)){
            return $this->$param($request);
        } else {
            return $this->error(404);
        }
    }

    public function edit($param, Request $request){
        if(method_exists($this, $param)){
            return $this->$param($request);
        } else {
            return $this->error(404);
        }
    }

    public function error($param){
        echo "Oups ! Nous avons buté sur une erreur ({$param}). Veuillez casser votre GENTILLE MAMAN de cette page ! MMMMerci !";
    }

    public function studies(){
        return view('admin.studies', ["studies" => Studies::query()->join('content', 'content.id_content', '=', 'cards_school.id_content')->get()]);
    }
    
    public function deleteStudies(Request $request) {
        
        Studies::query()->where("id_cards_school", $request->all()['idDelete'])->delete();

        return redirect('/admin/studies');

    }

    public function discover(){
        return view('admin.discover', ["discovers" => Discover::query()->join('content', 'content.id_content', '=', 'cards_discover.id_content')->get()]);
    }

    public function deleteDiscover(Request $request)
    {
        Discover::query()->where("id_discover", $request->all()['idDelete'])->delete();

        return redirect('/admin/discover');
    }
}