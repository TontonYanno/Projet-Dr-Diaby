<?php 
    class artist{
        protected $nom;
        protected $label;
        protected $email;
        protected  string $password ;
        public function __construct($nom , $label , $email ,$password) {
            $this->nom = $nom;
            $this->label = $label;
            $this->email = $email;
            $this->password = password_hash($password,PASSWORD_DEFAULT);
        }
        public function getNom(){
            return $this->nom;  
        }
        public function getLabel(){
            return $this->label;  
        }
        public function getEmail(){
            return $this->email;  
        }public function getPassword(){
            return $this->  password;  
        }

    }

    class groupe{
        protected $nom;
        protected $label;
        protected $email;
        protected  string $password ;
        public function __construct($nom , $label , $email ,$password) {
            $this->nom = $nom;
            $this->label = $label;
            $this->email = $email;
            $this->password = password_hash($password,PASSWORD_DEFAULT);
        }
        public function getNom(){
            return $this->nom;  
        }
        public function getLabel(){
            return $this->label;  
        }
        public function getEmail(){
            return $this->email;  
        }public function getPassword(){
            return $this->  password;  
        }
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        echo $_POST['type'];
        if($_POST['type']=="artiste"){

            require_once"../inscription/connexion.php";
            $artist = new artist($_POST["nom"],$_POST["label"],$_POST["email"], $_POST["password"]);
            $info=[$artist->getNom(),$artist->getLabel(), $artist->getEmail() , $artist->getPassword()];
            
            $bd="INSERT INTO `artiste` ( `nom`, `label`, `email`,`password`) VALUES ( :n, :l, :e, :d )";
            $req=$connexion->prepare($bd);
            $req->bindValue(':n',$info[0]);
            $req->bindValue(':l',$info[1]);
            $req->bindValue(':e',$info[2]);
            $req->bindValue(':d',$info[3]);
            $req->execute();
            $connexion=null;
            header("Location:reussi.html");
        }
        else{
            require_once"../inscription/connexion.php";
            $artist = new groupe($_POST["nom"],$_POST["label"],$_POST["email"], $_POST["password"]);
            $info=[$artist->getNom(),$artist->getLabel(), $artist->getEmail() , $artist->getPassword()];
            
            $bd="INSERT INTO `groupe` ( `nom`, `label`, `email`,`password`) VALUES ( :n, :l, :e, :d )";
            $req=$connexion->prepare($bd);
            $req->bindValue(':n',$info[0]);
            $req->bindValue(':l',$info[1]);
            $req->bindValue(':e',$info[2]);
            $req->bindValue(':d',$info[3]);
            $req->execute();
            header("Location:reussi.html");
        }       
    }
?>