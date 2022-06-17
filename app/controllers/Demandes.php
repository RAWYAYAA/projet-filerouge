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
      $data = $this->demandeModel->getDemandeById($idUser);
      return $data;
    }
    
  }