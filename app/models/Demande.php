<?php 

        class Demande{

            public function __construct()
    {
           $this->db = new Database;
    }

    public function getDemande(){
        $this->db->query("SELECT * FROM `demande` ");
        $results=$this->db->resultSet();
        return $results;
    }
        

        public function getDemandeById($id){
            $this->db->query('SELECT * FROM demande WHERE id = :id');
            $this->db->bind(':id', $id);
            return $this->db->resultSet();
        }

        public function addDemande($idLivre,$idUser){
            $this->db->query('INSERT INTO demande (livre_id,user_id) VALUES (:idLivre,:idUser)');
            $this->db->bind(':idLivre', $idLivre);
            $this->db->bind(':idUser', $idUser);
            if($this->db->execute()){
                return true;
            }else{
                return false;
            }
        }
        
    }
?>