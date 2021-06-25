<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class FirstController extends AbstractController{
    public function userID() {
        $id = random_int(0,100);
        return new response('<html><body> votre identifiant est '. $id . '</body></html>');
    }
    public function info($formation, $formateur){
        return new Response('<html><body> Formation : ' .$formation. ' ==> Formateur : '.$formateur. '</body></html>');
    }
    /**
        * @Route("/first/index")
    */
    public function index(){
        $formation = "Symfony 4";
        $formateur = "Makrem Mhedhbi";
        $candidats = [['id'=>1,'nom'=>'Amdouni','prenom'=>'Anissa','mail'=>'a.a@gmail.com','photo'=>''],['id'=>2,'nom'=>'Abdelfattah','prenom'=>'Walid','mail'=>'w.a@gmail.com','photo'=>''],['id'=>3,'nom'=>'Hzami','prenom'=>'Olfa','mail'=>'o.h@gmail.com','photo'=>''],['id'=>4,'nom'=>'Belkhiria','prenom'=>'Moez','mail'=>'m.b@gmail.com','photo'=>'']];
        //$candidats = Array('Anissa','Walid','Olfa','Moez');
        //    return new Response('<html><body><h1 align = center>HELLO SYMFONY</h1></body></html>');
        return $this->render('first/index.html.twig',['formation'=>$formation,'formateur'=>$formateur,
        'Candidats'=>$candidats]);
    }
    public function description(){ 
        $description = "Ce workshop aura comme objectifs la présentation des: controleurs, routes et vues";
        return $this->render('first/description.html.twig',['description' => $description]); 
    }    
    public function infoCandidat($id){
        $candidats = [['id'=>1,'nom'=>'Amdouni','prenom'=>'Anissa','mail'=>'a.a@gmail.com','photo'=>"CS1.PNG"],['id'=>2,'nom'=>'Abdelfattah','prenom'=>'Walid','mail'=>'w.a@gmail.com','photo'=>"CS2.PNG"],['id'=>3,'nom'=>'Hzami','prenom'=>'Olfa','mail'=>'o.h@gmail.com','photo'=>"CONV1.PNG"],['id'=>4,'nom'=>'Belkhiria','prenom'=>'Moez','mail'=>'m.b@gmail.com','photo'=>"NN.PNG"]];
        foreach ($candidats as $c) {
            if ($c['id'] == $id)
                $cand=$c;
        }
        if ($cand) {
            return $this->render('first/infoCand.html.twig',['cand' => $cand]); 
        }
        
    }
}