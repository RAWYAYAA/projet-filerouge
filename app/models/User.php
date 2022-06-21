<?php
  class User {
    private $db;

    public function __construct(){
      $this->db = new Database;
    }

    // Regsiter user
    public function register($data){
      $this->db->query('INSERT INTO users (nomcomplete, email, password,phone,salle,role) VALUES(:nomcomplete, :email, :password, :phone, :salle ,:role)');
      // Bind values
      $this->db->bind(':nomcomplete', $data['nomcomplete']);
      $this->db->bind(':email', $data['email']);
      $this->db->bind(':password', $data['password']);
      $this->db->bind(':phone', $data['phone']);
      $this->db->bind(':salle', $data['salle']);
      $this->db->bind(':role', "2");



      // Execute
      if($this->db->execute()){
        return true;
        echo 'yes';
      } else {
        return false;
      }
    }

    //login user
    public function login($email, $password){
     $this->db->query('SELECT * FROM users WHERE email = :email');     
     $this->db->bind(':email', $email);

     $row = $this->db->single();

     $hashed_password = $row->password;
     if(password_verify($password, $hashed_password)){
      return $row;
     }else{
       return false;
     }
    }
    // Find user by email
    public function findUserByEmail($email){
      $this->db->query('SELECT * FROM users WHERE email = :email');
      // Bind value
      $this->db->bind(':email', $email);

      $row = $this->db->single();

      // Check row
      if($this->db->rowCount() > 0){
        return true;
      } else {
        return false;
      }
    }

    // Find user by Id
    // public function findUserById($id){
    //   $this->db->query('SELECT * FROM users WHERE id = :id');
    //   // Bind value
    //   $this->db->bind(':id', $id);

    //   $row = $this->db->single();

    //   // Check row
    //   if($this->db->rowCount() > 0){
    //     return true;
    //   } else {
    //     return false;
    //   }
    // }
    
  }