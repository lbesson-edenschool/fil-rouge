<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Studies;
use App\Models\Discover;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function show($param){
        if(method_exists($this, $param)){
            return $this->$param();
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

    public function editDiscover(Request $request)
    {
        DB::table('cards_discover')->where('id_discover', $request->all()['id'])->update(['title_discover' => $request->all()['title']]);
        DB::table('content')->where('id_content', $request->all()['idContent'])->update(['content' => $request->all()['content']]);
        return redirect('/admin/discover');
    }

    public function editStudies(Request $request)
    {
        DB::table('cards_school')->where('id_cards_school', $request->all()['id'])->update(['title_school' => $request->all()['title']]);
        DB::table('cards_school')->where('id_cards_school', $request->all()['id'])->update(['img_path' => $request->all()['imgPath']]);
        DB::table('content')->where('id_content', $request->all()['idContent'])->update(['content' => $request->all()['content']]);

        return redirect('/admin/studies');
    }


    public function new($param, Request $request){
        $param = 'new'.ucfirst($param);
        if(method_exists($this, $param)){
            return $this->$param($request);
        } else {
            return $this->error(404);
        }
    }

    public function newDiscover(Request $request){
        $method = $_SERVER['REQUEST_METHOD'];
        if($method == 'GET'){
            return view('admin.new.discover');
        } else if($method == 'POST'){
            $id_content = uniqid();
            DB::table('content')->insert(
                array('content' => $request->all()['content'], "id_content" => $id_content)
            );
            DB::table('cards_discover')->insert(
                array('title_discover' => $request->all()['title'], "id_discover" => uniqid(), "id_content" => $id_content)
            );

            return redirect('/admin/discover');
        }
    }

    public function newStudies(Request $request){
        $method = $_SERVER['REQUEST_METHOD'];
        if($method == 'GET'){
            return view('admin.new.studies');
        } else if($method == 'POST'){
            $id_content = uniqid();
            DB::table('content')->insert(
                array('content' => $request->all()['content'], "id_content" => $id_content)
            );
            DB::table('cards_school')->insert(
                array('title_school' => $request->all()['title'], "id_cards_school" => uniqid(),"img_path" => $request->all()['image'], "id_content" => $id_content)
            );
            return redirect('/admin/studies');
        }
    }
    

    public function delete($param, Request $request){
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