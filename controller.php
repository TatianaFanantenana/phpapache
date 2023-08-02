<?php
  // Vérifie qu'il provient d'un formulaire
  if ($_SERVER["REQUEST_METHOD"] == "POST") {

    //identifiants mysql
    //$host = "172.19.0.2";
    $host = "db";
    $username = "root";
    $password = "password";
    $database = "test";
    
    $name = $_POST["name"]; 
    $lastname = $_POST["lastname"];

    if (!isset($name)){
      die("S'il vous plaît entrez votre nom");
    }
    if (!isset($lastname) ){
      die("S'il vous plaît entrez votre prenom");
    }  

    //Ouvrir une nouvelle connexion au serveur MySQL
    $mysqli = new mysqli($host, $username, $password, $database);
    
    //Afficher toute erreur de connexion
    if ($mysqli->connect_error) {
      die('Error : ('. $mysqli->connect_errno .') '. $mysqli->connect_error);
    }  
    
    //préparer la requête d'insertion SQL
    $statement = $mysqli->prepare("INSERT INTO information (name, lastname) VALUES(?, ?)"); 
    //Associer les valeurs et exécuter la requête d'insertion
    $statement->bind_param('ss', $name, $lastname); 
    
    if($statement->execute()){
     // print "Salut " . $name . "!, votre nom est ". $lastname;
     header("Location: list.php");
    }else{
      print $mysqli->error; 
    }
  }
?>