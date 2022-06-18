<?php
  class Users extends Controller {
    public function __construct(){
      $this->userModel=$this->model('user');
     
    }
    public function register(){
      if ($_SERVER['REQUEST_METHOD']== 'POST'){
        //Process form
        
        //sanitize dara
        $_POST=filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        //init data
        $data =[
          'nomcomplete' => trim($_POST['nomcomplete']),
          'email' => trim($_POST['email']),
          'password' => trim($_POST['password']),
          'phone'=>trim($_POST['phone']),
          'salle'=>trim($_POST['salle']),
          'confirm_password' => trim($_POST['confirm_password']),
          'nomcomplete_err' =>'',
          'email_err' => '',
          'password_err' => '',
          'confirm_password_err' => '',
          'phone_err'=>''
        ];
        // validate email
        if(empty($data['email'])){
          $data['email_err']='please enter email';
        }else{
          if($this->userModel->findUserByEmail($data['email'])){
            $data['email_err'] = ' email taken';
          }
        }
        if(empty($data['nomcomplete'])){
          $data['nomcomplete_err']='please enter name';
        }
        if(empty($data['password'])){
          $data['password_err']='please enter password';
        }
        else if(strlen($data['password'])<6)
        {
          $data['password_err']='password must be at least 6 character';
        }
        if(empty($data['confirm_password'])){
          $data['confirm_password_err']='please enter a confirm password';}
          else{
            if($data['password'] != $data['confirm_password']){
              $data['confirm_password_err']='passwords dont match';
            }
          }
          if(empty($data['phone'])){
            $data['phone_err']='please enter phone';
          }
          if(empty($data['salle'])){
            $data['salle_err']='please enter salle';
          }
          if(empty($data['email_err'])&& empty($data['name_err']) && empty($data['password_err']) && empty($data['confirm_password_err']) ){
            //validated
            //hach pass 
            $data['password'] = password_hash($data['password'] , PASSWORD_DEFAULT);

            //registeruser
             if($this->userModel->register($data)){ 
            flash('register_success','you are registered');
             redirect('users/login');
             }else{
              die('something else');
             }
          }else{
            $this->view('users/register',$data);
          }

      }else{
        //Init data
        $data =[
          'nomcomplete' => '',
          'email' => '',
          'password' => '',
          'phone'=>'',
          'salle'=>'',
          'confirm_password' => '',
          'nomcomplete_err' => '',
          'email_err' => '',
          'password_err' => '',
          'confirm_password_err' => '',
          'phone_err'=>''
        ];
        //Load view
        $this-> view('users/register', $data);
      }
    }

    public function login(){
      if ($_SERVER['REQUEST_METHOD']== 'POST'){
        //Process form
        $_POST=filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        //init data
        $data =[
         
          'email' => trim($_POST['email']),
          'password' => trim($_POST['password']),
          'email_err' => '',
          'password_err' => ''
        ];
        if(empty($data['email'])){
          $data['email_err']='please enter email';
        }
        if(empty($data['password'])){
          $data['password_err']='please enter password';
        }
        if($this->userModel->findUserByEmail($data['email'])){
          //found
        }else {
          //not found
          $data['email_err'] ='no user found';
        }

        if(empty($data['email_err']) && empty($data['password_err'])){
        //check set logged in user
        $loggedInUser= $this->userModel->login($data['email'], $data['password']);
        if( $loggedInUser){
          //session
          $this->createUserSession($loggedInUser);
        }else{
          $data['password_err']='password incorect';
          $this->view('users/login',$data);        }
        }
       else{
        $this->view('users/login',$data);
       }
      }else{
        //Init data
        $data =[
          
          'email' => '',
          'password' => '',
          'email_err' => '',
          'password_err' => '',
          
        ];
        //Load view
        $this-> view('users/login',$data);
      }
    }
    public function createUserSession($user){
      $_SESSION['user_id'] = $user->id;
      $_SESSION['user_email'] = $user->email;
      $_SESSION['user_nomcomplete'] = $user->nomcomplete;
      $_SESSION['role'] = $user->role;
      redirect('pages/index');
    }

    public function logout(){
      unset($_SESSION['user_id']);
      unset($_SESSION['user_email']);
      unset($_SESSION['user_name']);
      session_destroy();
      redirect('users/login');

    }
    public function isLoggedIn(){
      if(isset($_SESSION['user_id'])){
        return true ;
      }else{
        return false;
      }
    }
    public function isAdmin(){
      if($_SESSION['role'] == 1){
        return true ;
      }else{
        return false;
      }
    }
    public function isStaff(){
      if($_SESSION['role'] == 2){
        return true ;
      }else{
        return false;
      }
    }

  }