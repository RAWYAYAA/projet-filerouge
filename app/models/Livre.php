<?php
class Livre{
    public function __construct()
    {
        $this->db = new Database;
    }
    // Get data live 
    public function getLivres(){
        $this->db->query("SELECT * FROM `livres` ");
        $results=$this->db->resultSet();
        return $results;
    }
    public function addLivres($data){
        $image = $data['image'];
        $this->db->query("INSERT INTO livres (titre, type, ecrivain, image) VALUES(:titre, :type, :ecrivain, '$image')");
        // Bind values
        $this->db->bind(':titre', $data['titre']);
        $this->db->bind(':type', $data['type']);
        $this->db->bind(':ecrivain', $data['ecrivain']);
    
        // Execute
        if($this->db->execute()){
            return true;    
        } else {
            return false;
        }
    }
    public function getLivreById($id){
        $this->db->query('SELECT * FROM livres WHERE id = :id');
        $this->db->bind(':id', $id);

        $row = $this->db->single();
        return $row;

    }

    public function editLivres($data){
        $img = $data['image'];
        $this->db->query("UPDATE `livres` SET `type`= :type,`titre`= :titre,`ecrivain`= :ecrivain, `image`='$img' WHERE id = :id");
        // Bind values
        $this->db->bind(':titre', $data['titre']);
        $this->db->bind(':type', $data['type']);
        $this->db->bind(':ecrivain', $data['ecrivain']);
        $this->db->bind(':id', $data['id']);
    
        // Execute
        if($this->db->execute()){
            return true;
        } else {
            return false;
        }
    }
    public function deleteLivre($id){
        $this->db->query('DELETE FROM livres WHERE id = :id');
        // Bind values
        $this->db->bind(':id', $id);
    
        // Execute
        if($this->db->execute()){
            return true;
        } else {
            return false;
        }
    }
    public function countUser(){
        
        $this->db->query("SELECT id FROM users"); 
        return  $this->db->resultSet();
        
     }
    public function countLivre(){
        
       $this->db->query("SELECT id FROM livres"); 
        return  $this->db->resultSet();

    }
    public function countdemande(){
        
        $this->db->query("SELECT id FROM demande"); 
        return  $this->db->resultSet();

     }
    
}