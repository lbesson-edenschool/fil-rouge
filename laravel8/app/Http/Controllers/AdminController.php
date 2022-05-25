<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Studies;
use App\Models\Discover;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    //mini routeur d'affichage
    public function show($param){
        if(method_exists($this, $param)){
            return $this->$param();
        } else {
            return $this->error(404);
        }
    }

    //mini routeur d'edition
    public function edit($param, Request $request){
        if(method_exists($this, $param)){
            return $this->$param($request);
        } else {
            return $this->error(404);
        }
    }

    //Fonction pour afficher la page d'édition discover dynamiquement
    public function editDiscover(Request $request)
    {
        //Requete qui insère le contenu dans cards_discover
        DB::table('cards_discover')->where('id_discover', $request->all()['id'])->update(['title_discover' => $request->all()['title']]);
        //Requete qui insère le contenu dans content
        DB::table('content')->where('id_content', $request->all()['idContent'])->update(['content' => $request->all()['content']]);
        return redirect('/admin/discover');
    }

    //Fonction pour afficher la page d'édition studies dynamiquement
    public function editStudies(Request $request)
    {
        //Requete qui insère le contenu dans cards_school
        DB::table('cards_school')->where('id_cards_school', $request->all()['id'])->update(['title_school' => $request->all()['title'], 'img_path' => $request->all()['imgPath']]);
        //Requete qui insère le contenu dans content
        DB::table('content')->where('id_content', $request->all()['idContent'])->update(['content' => $request->all()['content']]);

        return redirect('/admin/studies');
    }

    //mini routeur d'ajout
    public function new($param, Request $request){
        $param = 'new'.ucfirst($param);
        if(method_exists($this, $param)){
            return $this->$param($request);
        } else {
            return $this->error(404);
        }
    }

    //Ajout des cartes discover
    public function newDiscover(Request $request){
        $method = $_SERVER['REQUEST_METHOD'];
        if($method == 'GET'){
            return view('admin.new.discover');
        } else if($method == 'POST'){
            $id_content = uniqid();
            $id_discover = uniqid();
            DB::table('content')->insert(
                array('content' => $request->all()['content'], "id_content" => $id_content)
            );
            //Requete qui insère le contenu à partir de l'id_content
            DB::table('cards_discover')->insert(
                array('title_discover' => $request->all()['title'], "id_discover" => $id_discover, "id_content" => $id_content)
            );
            session_start();
            //On lance une session avec le dernier id inséré 
            $_SESSION['lastInsertId'] =  $id_discover;
            return redirect('/admin/discover');
        }
    }

    //Ajout des cartes studies
    public function newStudies(Request $request){
        $method = $_SERVER['REQUEST_METHOD'];
        if($method == 'GET'){
            return view('admin.new.studies');
        } else if($method == 'POST'){
            $id_content = uniqid();
            $id_cards_school = uniqid();

            //Requete qui insère le contenu
            DB::table('content')->insert(
                array('content' => $request->all()['content'], "id_content" => $id_content)
            );
            //Requete qui insère les cartes
            DB::table('cards_school')->insert(
                array('title_school' => $request->all()['title'], "id_cards_school" => $id_cards_school,"img_path" => $request->all()['image'], "id_content" => $id_content)
            );
            //On lance une session avec le dernier id inséré 
            $_SESSION['lastInsertId'] = $id_cards_school;

            //redirection admin/studies
            return redirect('/admin/studies');
        }
    }
    
    //mini routeur de suppression
    public function delete($param, Request $request){
        if(method_exists($this, $param)){
            return $this->$param($request);
        } else {
            return $this->error(404);
        }
    }


    public function error($param){
        //Affichage d'erreur personalisé
        echo "Oups ! Nous avons buté sur une erreur ({$param}). Veuillez retourner à la page précédente !";
    }

    public function studies(){
        //redirection pour afficher la page admin/studies avec une jonction vers le contenu
        return view('admin.studies', ["studies" => Studies::query()->join('content', 'content.id_content', '=', 'cards_school.id_content')->get()]);
    }
    
    public function deleteStudies(Request $request) {
        //Requete qui chercher 'id_studies' par rapport à l'idDelete' que lui envoi et on get l'id_content'
        $card_id_content = Studies::query()->where('id_cards_school', $request->all()['idDelete'])->get()[0]->id_content;
        //Requete qui chercher 'id_studies' par rapport à l'idDelete' que lui envoi puis on le supprime
        Studies::query()->where("id_cards_school", $request->all()['idDelete'])->delete();
        //Requete qui supprime le content par rapport à l'id_content'
        DB::table('content')->where('id_content', $card_id_content)->delete();

        //redirection à admin/studies
        return redirect('/admin/studies');

    }

    public function discover(){
        return view('admin.discover', ["discovers" => Discover::query()->join('content', 'content.id_content', '=', 'cards_discover.id_content')->get()]);
    }

    public function deleteDiscover(Request $request)
    {
        //Requete qui chercher 'id_discover' par rapport à l'idDelete' que lui envoi et on get l'id_content'
        $card_id_content = Discover::query()->where('id_discover', $request->all()['idDelete'])->get()[0]->id_content;
        //Requete qui chercher 'id_discover' par rapport à l'idDelete' que lui envoi puis on le supprime
        Discover::query()->where("id_discover", $request->all()['idDelete'])->delete();
        //Requete qui supprime le content par rapport à l'id_content'
        DB::table('content')->where('id_content', $card_id_content)->delete();

        //redirection à admin/discover
        return redirect('/admin/discover');
    }
}