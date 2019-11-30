<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

include 'functions.php';
session_start();

if (isset($_POST['name']) && isset($_POST['price']))
    {
        $pdt_name = sanitizeString($_POST['name']);
        $Pdt_desc = sanitizeString($_POST['desc']);
        $price = sanitizeString($_POST['price']);

        $q_pdts = "INSERT INTO products VALUES (NULL, '$pdt_name','$pdt_desc', '$price')";
        $pdt_id = insertMysql($q_pdts);
        $uploadform = TRUE;
        $_SESSION['pdt_id'] = $pdt_id;
        $product= "Please Upload $pdt_name's picture.";
    }

displayheader();
displaymenu();

if ($uploadform)
    {
        uploadform($product);
    }

displayfooter();
?>
    