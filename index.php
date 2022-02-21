<?php

/**
 * Reprenez le code de l'exercice précédent et transformez vos requêtes pour utiliser les requêtes préparées
 * la méthode de bind du paramètre et du choix du marqueur de données est à votre convenance.
 */
//je deffinie mais valeur a la mains
$name = 'Jean';
$fname = 'michel';
$adress = '12 rue de la porte';
$cp = '02';
$country = 'Hirson';
$mail = 'Jeam.M@truc.fr';


$server = 'localhost';
$user = 'root';
$pass = '';
$db = 'table_test-php';


try {
    $bdd = new PDO("mysql:host=$server;dbname=$db;charset=utf8", $user, $pass);

    $stm = $bdd->prepare("
    INSERT INTO user (nom, fname, address, postal_code, country, mail)
    VALUES (:nom ,:fname ,:adress ,:postalCode , :country ,:mail )
    ");

    $stm->bindParam(':name',$name);
    $stm->bindParam(':fname',$fname);
    $stm->bindParam(':address',$address);
    $stm->bindParam(':postal_code',$postal_code);
    $stm->bindParam(':country',$country);
    $stm->bindParam(':mail',$mail);
    $stm->execute();
    echo "L'utilisateur a étais ajouté !";
}
catch (PDOException $e){
    echo $e->getMessage();
}