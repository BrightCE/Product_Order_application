<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
include 'functions.php';

$func_id = $_POST['func_id'];

if($func_id)
    {
       switch($func_id)
            {
                case "1": $addproduct = TRUE;
                    break;
                case "2": $editproduct = TRUE;
                    break;
                case "3": $removeproduct = TRUE;
                    break;
                case "4": $blogpost = TRUE;
                    break;
                case "5": $vieworders = TRUE;
                    break;
                case "6": $loginform = TRUE;
                    break;

             }

    }
else{
    echo "";
}

if ($addproduct)
    {
        display_addpdt_form();
    }
if ($loginform)
    {
        display_login_form();
    }

?>
