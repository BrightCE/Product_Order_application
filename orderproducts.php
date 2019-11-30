<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
include 'functions.php'; session_start();
$member = $discount= FALSE;
$info = ""; $orders = array();
$mesg = "<h2>Order Products</h2>
            Welcome to Order products page.<br>
            To enjoy 20% discount on all products, please <a href = '#' onclick='login_form(6)'>Signin </a> or <a href='register.php'>Register</a>.<br><br>
            Otherwise, please place your order below.<br><br>";

//check if user had signed in before(that is if member_id isset)
if (isset($_SESSION['member_id']))
    {
        $member = $discount = TRUE;
        $name = $_SESSION['name'];
    }
//display page
    displayheader();//displays page's head section
    output_menu();//displays page's menu bar in the body section.
    start_lhs(); //opens the right hand side main content area of the page

if($member)
    {
        $mesg = "<h2>Order Products</h2>
                 <p> Welcome <b>$name </b>. <a href='signout.php'>(sign out)</a></p>
                    <br>Please place your order below.<br><br>";
     }

   //check and process form feilds.
if(isset($_GET['o_id']))
     {
          $order_id = $_GET['o_id'];
          $info = "<p> THANK YOU! <br>Your order have being saved successfully.</p>
                    <p>The order reference number is <b>$order_id</b>. Please save this number for use in processing your order.</p>";
     }
     elseif(isset($_GET['error']))
        {
            $error = $_GET['error'];
            switch($error)
            {
                case "1": $info = "<p> <span class = 'error'>Error! </span> Please enter a name.</p>";
                    break;
                case "2": $info = "<p> <span class = 'error'>Error! </span> Please fill the form correctly.</p>";
                    break;
            }
        }

    output_responce_box($mesg);
    info_box($info);

  if($discount)
        {
            display_discount_order_form();
        }
    else{
        display_order_form();
    }
    
        display_rhs();
        display_footer();
?>
