<?php
  class Pages extends Controller {
    public function __construct(){
      $this->livreModel = $this->model('Livre');

    }
    
    public function index(){
      $countLivre = $this->livreModel->countLivre();
      $countUser = $this->livreModel->countUser();
      $countDemande = $this->livreModel->countDemande();
      $countiddemande= $this->livreModel->getnotification();

      $data = [
        'countLivre' => count($countLivre),
        'countUser' => count($countUser),
        'countDemande' => count($countDemande),
        'countiddemande' => count($countiddemande)
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
    
    // public function demande(){

    //   $this->view('admin/demande');
    // }
    
    public function crudlivres(){
      $livres=$this->livreModel->getLivres();
      $countiddemande= $this->livreModel->getnotification();
      $data=[
        'livres'=>$livres,
        'countiddemande'=>count($countiddemande)
      ];
      $this->view('livres/index',$data);
    }
   
    public function error(){
      $this->view('eror');
    }

  }