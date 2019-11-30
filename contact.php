<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
       include 'functions.php';
       
        $name = sanitizeString($_POST['name']);
        $email = sanitizeString($_POST['email']);
        $message =  sanitizeString($_POST['message']);


        $toaddress = 'jennyonyix@yahoo.com';
        $subject = 'Message from Greenlifeherbal Website';

        if ($email == "" || $name=="" || $message=="")
        {
            echo '<p>Sorry, you cannot submit an empty form</p>';
            
             }



        else{
            $mailcontent = 'Customer Name: '.$name ."\n"
                            .'Customer Email: '.$email."\n"
                            ."Message:\n".$message. "\n" ;
     
           if( mail ($toaddress, $subject, $mailcontent))
            {
             echo '<p>Thank you for contacting us. We will respond to your message shortly.</p>';
            }
            else
                echo '<p>Sorry, we could not send your message at this time. Please try again later.</p>';
        }
            

?>
