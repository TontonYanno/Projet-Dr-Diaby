<?php 
    class admin{
        protected $nom;
    
        protected $email;
        protected  string $password ;
        public function __construct($nom  , $email ,$password) {
            $this->nom = $nom;
            $this->email = $email;
            $this->password = password_hash($password,PASSWORD_DEFAULT);
        }
        public function getNom(){
            return $this->nom;  
        }
        public function getEmail(){
            return $this->email;  
        }public function getPassword(){
            return $this->  password;  
        }

    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        
            require_once"../superadmin/connexion.php";
            $admin = new admin($_POST["nom"],$_POST["email"], $_POST["password"]);
            $info=[$admin->getNom(), $admin->getEmail() , $admin->getPassword()];
            
            $bd="INSERT INTO `admin` ( `nom`, `email`,`password`) VALUES ( :n, :l, :e)";
            $req=$connexion->prepare($bd);
            $req->bindValue(':n',$info[0]);
            $req->bindValue(':l',$info[1]);
            $req->bindValue(':e',$info[2]);
            $req->execute();
            $connexion=null;
            // header("Location:reussi.html");
    }
?>