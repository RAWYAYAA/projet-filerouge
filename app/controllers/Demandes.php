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
      if($_SESSION['role'] == 1){
        throw new Exception('Vous n\'avez pas les droits pour accéder à cette page');
        die;
      }
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
    public function adminprop(){
      $idUser = $_SESSION['user_id'];
      $proposition = $this->demandeModel->  getprop($idUser);
      $countiddemande= $this->demandeModel->getnotification();
        $data=[
          'countiddemande'=>count($countiddemande),

          'proposition'=>$proposition];
          $this->view('admin/proposition',$data);
    }

    //admin resume
    public function resume(){
      $idUser = $_SESSION['user_id'];
      $countiddemande= $this->demandeModel->getnotification();
      $resume = $this->demandeModel->  getresume($idUser);
        $data=[
          'countiddemande'=>count($countiddemande),
          'resume'=>$resume];
          $this->view('admin/resume',$data);
    }
    //staff resume
    public function resumeaffichage(){
      $idUser = $_SESSION['user_id'];
      $resume = $this->demandeModel->getresume($idUser);
        $data=[
          'resume'=>$resume];
          $this->view('staff/resume',$data);
    }
    
    //staff resume add
    
    public function addresumes()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            //Sanitize post array
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data = [
              'id' =>'',
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
                    // echo'yeeeeeeeeeeeeees';
                } else {
                    die('Something went wrong');
                }
            } else {
                //load view with errors
                $this->view('staff/addresumes', $data);
            }
        } else {
            $data = [
                'titrelivre' => '',
                'resume'  => '',
            ];

            $this->view('staff/addresume', $data);
        }
    }
    public function addpropositions()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            //Sanitize post array
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data = [
              'id'=>'',
                'titredelivre'          => trim($_POST['titredelivre']),
                'ecrivain'          => trim($_POST['ecrivain']),
                'user_id'       => $_SESSION['user_id'],
                'titre_err'      => '',
                'ecrivain_err' => '',
            ];
            //validate title
            if (empty($data['titredelivre'])) {
                $data['titre_err'] = 'Please enter title';
            }

            //validate body
            if (empty($data['ecrivain'])) {
                $data['ecrivain_err'] = 'Please enter resume';
            }
            //check if errors are present
            if ( empty($data['ecrivain_err']) && empty($data['titre_err'])) {
                if ($this->demandeModel->addproposition($data)) {
                    redirect('staff/addprop');
                    // echo'yeeeeeeeeeeeeees';
                } else {
                    die('Something went wrong');
                }
            } else {
                //load view with errors
                $this->view('staff/addprop', $data);
            }
        } else {
            $data = [
                'titredelivre' => '',
                'ecrivain'  => '',
            ];

            $this->view('staff/addprop', $data);
        }
    }
    //get proposition staff
    public function getproposition(){
      $idUser = $_SESSION['user_id'];
      $proposition = $this->demandeModel-> getprop($idUser);
        $data=[
          'proposition'=>$proposition];
          $this->view('staff/proposition',$data);
    }

    public function isout(){
      $idUser = $_SESSION['user_id'];
      $demande = $this->demandeModel->livreout($idUser);
      print_r($demande);
      die;
        $data=[
          'demande'=>$demande,
        ];
          $this->view('staff/index',$data);
    }

  }
