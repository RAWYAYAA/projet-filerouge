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
    public function propadmin(){
      $idUser = $_SESSION['user_id'];
      $prop = $this->demandeModel->  getprop($idUser);
        $data=[
          'demande'=>$prop
        
        ];
        $this->view('admin/proposition',$data);
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
    //admin
    public function adminprop(){
      $idUser = $_SESSION['user_id'];
      $proposition = $this->demandeModel->  getprop($idUser);
        $data=[
          'proposition'=>$proposition];
          $this->view('admin/proposition',$data);
    }
    //staff
    public function proposer(){
      if ($_SERVER['REQUEST_METHOD']== 'POST'){
        $_POST=filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        $titredelivre = $_POST['titredelivre'];
        $idUser = $_SESSION['user_id'];
        $ecrivain=$_POST['ecrivain'];
        $this->demandeModel->addproposition($titredelivre,$idUser,$ecrivain);
        // $this->view('staff/proposition');
        header('Location: '.URLROOT.'staff/proposition');
      }
    }
    //admin resume
    public function resume(){
      $idUser = $_SESSION['user_id'];
      $resume = $this->demandeModel->  getresume($idUser);
        $data=[
          'resume'=>$resume];
          $this->view('admin/resume',$data);
    }
    //staff resume
    public function resumeaffichage(){
      $idUser = $_SESSION['user_id'];
      $resume = $this->demandeModel->  getresume($idUser);
        $data=[
          'resume'=>$resume];
          $this->view('staff/resume',$data);
    }
    //staff resume add
    public function addresumes()
    {
        $body = [
            'id' => '',
            'titrelivre' => '',
            'resume' => '',
            'titre_err'  => '',
            'resume_err' => '',
        ];
        if ($_SERVER['REQUEST_METHOD'] == 'POST' &&  $_SESSION['user_id']==2) {
            //Sanitize post array
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data = [
                'type'         => trim($_POST['type']),
                'titrelivre'          => trim($_POST['titrelivre']),
                'resume'          => trim($_POST['resume']),
                'user_id'       => $_SESSION['user_id'],
                'titre_err'      => '',
                'resume_err' => '',
            ];
            //validate title
            if (empty($data['titrelivre'])) {
                $data['titre_err'] = 'Please enter title';
            }

            //validate body
            if (empty($data['resume'])) {
                $data['resume_err'] = 'Please enter resume';
            }
            //check if errors are present
            if ( empty($data['resume_err']) && empty($data['titre_err'])) {
                if ($this->demandeModel->addresume($data)) {
                    redirect('demandes/resumeaffichage');
                } else {
                    die('Something went wrong');
                }
            } else {
                //load view with errors
                $data['action'] = 'add';

                $this->view('staff/addresume', $data);
            }
        } else {
            $data = [
                'action' => 'add',
                'titrelivre' => '',
                'resume'  => '',
                'body' => $body,

            ];

            $this->view('staff/addresume', $data);
        }
    }
    //get proposition staff
    public function getproposition(){
      $idUser = $_SESSION['user_id'];
      $proposition = $this->demandeModel->  getprop($idUser);
        $data=[
          'proposition'=>$proposition];
          $this->view('staff/proposition',$data);
    }
  }
