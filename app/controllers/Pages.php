<?php
  class Pages extends Controller {
    public function __construct(){
      $this->livreModel = $this->model('Livre');

    }
    
    public function index(){
      $countLivre = $this->livreModel->countLivre();
      $countUser = $this->livreModel->countUser();
      $countDemande = $this->livreModel->countDemande();
      $data = [
        'countLivre' => count($countLivre),
        'countUser' => count($countUser),
        'countDemande' => count($countDemande)
      ];
      // print_r($data);
      $this->view('admin/index', $data);
    }
    public function indexstaf(){
      $livres=$this->livreModel->getLivres();
      $data=[
        'livres'=>$livres
      ];
      $this->view('staff/index',$data);
    }
    // public function signup(){
      
    //   $this->view('pages/signup');
    // }
    public function crudusers(){

      $this->view('admin/cruduser');
    }
    public function demande(){

      $this->view('admin/demande');
    }
    public function demandes(){

      $this->view('staff/demande');
    }
    public function crudlivres(){

      $this->view('pages/crudlivres');
    }
    public function landinguser(){

      $this->view('pages/landinguser');
    }
    public function demander(){

      $this->view('staff/demander');
    }
    // public function demande(){

    //   $this->view('staff/demander');
    // }
    public function voirdetails(){

      $this->view('pages/voirdetails');
    }
    public function rechercher(){

      $this->view('pages/rechercher');
    }

  }