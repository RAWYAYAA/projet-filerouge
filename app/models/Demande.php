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
            $this->db->query("SELECT l.titre,l.image,s.nom FROM demande d,livres l,status s,users u WHERE d.user_id = :id and u.id= 2 and statu_id =s.id and livre_id = l.id");
            $this->db->bind(':id', $id);
            return $this->db->resultSet();
        }

        public function addDemande($idLivre,$idUser){
            $this->db->query('INSERT INTO demande (livre_id,user_id,statu_id ) VALUES (:idLivre,:idUser,:statu_id)');
            $this->db->bind(':idLivre', $idLivre);
            $this->db->bind(':idUser', $idUser);
            $this->db->bind(':statu_id', 3);
            if($this->db->execute()){
                return true;
            }else{
                return false;
            }
        }
        public function  getDemandeadmin($id){
            $this->db->query("SELECT d.id,l.titre,u.nomcomplete,d.datedemande,d.statu_id FROM demande d,livres l,users u WHERE u.id = user_id and livre_id = l.id and statu_id=3;");
            $this->db->bind(':id', $id);
            return $this->db->resultSet();
        }
        public function getDemandestaf($id){
            $this->db->query("SELECT d.id,l.titre,d.datedemande,s.nom,u.nomcomplete,statu_id FROM demande d,livres l,status s,users u WHERE d.user_id = u.id and u.id = :id and livre_id = l.id and d.statu_id = s.id");
            $this->db->bind(':id', $id);
            return $this->db->resultSet();
        }
        public function accepter(){
            $id = $_POST['id'];
            $this->db->query('UPDATE demande SET statu_id = :statu_id WHERE id = :id');
            $this->db->bind(':id', $id);
            $this->db->bind(':statu_id', 1);
            if($this->db->execute()){
                return true;
            }else{
                return false;
            }
        }
        public function refuser(){
            $id = $_POST['id'];
            $this->db->query('UPDATE demande SET statu_id = :statu_id WHERE id = :id');
            $this->db->bind(':id', $id);
            $this->db->bind(':statu_id', 2);
            if($this->db->execute()){
                return true;
            }else{
                return false;
            }
        }

      public function getnotification(){
        $this->db->query("SELECT * FROM demande d WHERE  statu_id =3;");
        $results=$this->db->resultSet();
        return $results;
      }
        
    //admin table proposition
    public function getprop(){
        $this->db->query("SELECT * FROM `proposition` ");
        $results=$this->db->resultSet();
        return $results;
    }
    //staff prop
    public function addproposition($data){
        $this->db->query("INSERT INTO proposition (id, titredelivre, ecrivain ) VALUES (:id,:titredelivre,:ecrivain) ");
            $this->db->bind(':titredelivre', $data['titredelivre']);
            $this->db->bind(':ecrivain',$data['ecrivain']);
            if($this->db->execute()){
                return true;
            }else{
                return false;
            }

    }
    //admin resume
    public function getresume(){
        $this->db->query("SELECT * FROM `resume` ");
        $results=$this->db->resultSet();
        return $results;
    }
    //staf resume
    public function addresume($data){
        $this->db->query("INSERT INTO resume (titrelivre, resume , user_id ) VALUES (:titrelivre,:resume,:user_id) ");
            $this->db->bind(':titrelivre', $data['titrelivre']);
            $this->db->bind(':resume',$data['resume']);
            $this->db->bind(':user_id',$data['user_id']);
            if($this->db->execute()){
                return true;
            }else{
                return false;
            }

    }
}

?>
