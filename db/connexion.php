<?php
    $host = 'localhost';
    $dbname = 'aubanel_coffee_blues';
    $username = 'aubanel_coffeeAdmin';
    $password = 'Aubanel84!';
 
  try {
  
    $db = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    
   // echo "Connecté à $dbname sur $host avec succès.";
    
  } catch (PDOException $e) {
  
    die("Impossible de se connecter à la base de données $dbname :" . $e->getMessage());
    
  }
?>