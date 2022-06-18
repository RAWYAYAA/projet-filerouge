<?php
  class Demandes extends Controller {

    public function __construct(){
        $this->demandeModel = $this->model('Demande');
    }
    public function addDemande(){
      if ($_SERVER['REQUEST_METHOD']== 'POST'){
        $_POST=filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        $idLivre = $_POST['idLivre'];
        $idUser = $_SESSION['user_id'];
        $this->demandeModel->addDemande($idLivre,$idUser);
        echo '<script>alert("Demande envoyée");</script>';
      redirect('pages/indexstaf');
      }
      }
      
    public function getDemande(){
      $idUser = $_SESSION['user_id'];
      $demande = $this->demandeModel->getDemandeById($idUser);
        $data=[
          'demande'=>$demande
        
        ];
        $this->view('staff/demande',$data);
    }
    public function demandeaffichage(){
      $idUser = $_SESSION['user_id'];
      $demande = $this->demandeModel-> getDemandeadmin($idUser);
      $countiddemande= $this->demandeModel->getnotification();

        $data=[
          'demande'=>$demande,
          'countiddemande'=>count($countiddemande)
        
        ];
        $this->view('admin/demande',$data);
       
    }
    public function accepter(){
      $id = $_POST['id'];
      $this->demandeModel->accepter($id);
      redirect('demandes/demandeaffichage');
    }
    public function refuser(){
      $id = $_POST['id'];
      $this->demandeModel->refuser($id);
      redirect('demandes/demandeaffichage');
    }
     
    public function satffdemande(){
      $idUser = $_SESSION['user_id'];
      $demande = $this->demandeModel-> getDemandestaf($idUser);
        $data=[
          'demande'=>$demande];
          $this->view('staff/statudemande',$data);
    }
    public function notifications(){
      $idUser = $_SESSION['user_id'];
      $demande = $this->demandeModel-> getnotification($idUser);
        $data=[
          'demande'=>$demande];
          $this->view('admin/',$data);

    }
    
  }