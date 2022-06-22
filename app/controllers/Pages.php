<?php
  class Pages extends Controller {
    public function __construct(){
      $this->livreModel = $this->model('Livre');
      $this->demandeModel = $this->model('Demande');
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
      if($_SESSION['role'] == 1){
      echo('Vous n\'avez pas les droits pour accéder à cette page');
        die;
      }
      $livres=$this->livreModel->getLivres();
      $idUser = $_SESSION['user_id'];
      $demande = $this->demandeModel->livreout();
      $data=[
        'livres'=>$livres,
        'demande'=>$demande,
      ];
      $this->view('staff/index',$data);
    }
    public function crudlivres(){
      if($_SESSION['role'] == 2){
        echo('Vous n\'avez pas les droits pour accéder à cette page');
        die;
      }
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
    // public function statulivre(){
    //   $this->view('staff/statulivre');
    // }

  }