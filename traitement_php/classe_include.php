<?php
    try{
        $bd_url="localhost";
        $bd_name="inscription_db";
        $bd_login="root";
        $bd_pass="";
        $bdd=new PDO('mysql:host='.$bd_url.';dbname='.$bd_name,$bd_login,$bd_pass);
        $query=$bdd->query('SELECT * FROM tb_frais;');
    }
    catch(Exception $e){
        header('Location: inscription.php?etat=7');
    }      
?>