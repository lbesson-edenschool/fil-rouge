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