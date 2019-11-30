<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
include 'db_functions.php';
include 'output_functions.php';
include 'ajax_call_functions.php';


function uploadform($pdt)
    {
        echo <<<_END
          <div class="content_section">

          <h2>Add a product: Step 2 of 2</h2>
          <p>$pdt to complete the entry.</p>
          <div class="contact_form">
                <form action="admin.php" method="POST" enctype="multipart/form-data">
                <input type = "hidden" name= "MAX_FILE_SIZE" value= "1000000" />
                <label>Picture</label>
                    <input type="file" name="picture"/>
                    <div class="cleaner"></div>
                    <input type="submit" value="Send"/>
               </form>
               <div class="cleaner"></div>
            </div>
            
           </div>
_END;
    }

    function filled_out($form_vars) {
  // test that each variable has a value
  foreach ($form_vars as $key => $value) {
     if ((!isset($key)) || ($value == '')) {
        return false;
     }
  }
  return true;
}

function send_pswd($email,$message)
    {
        $subject = 'GreenlifeHerbal Password.';

        $headers = 'From: no-reply@greenlifeherbal.com' . "\r\n" .
                    'X-Mailer: PHP/' . phpversion();
         if(mail($email, $subject, $message, $headers))
            {
                return TRUE;
            }
            else return FALSE;

    }

function destroySession()
{
    $_SESSION=array();

    if (session_id() != "" || isset($_COOKIE[session_name()]))
        setcookie(session_name(), '', time()-2592000, '/');

    session_destroy();
}

//function to check if order form isEmpty
    function valid_qty($form, $num)
        {
            $empty_feilds = 0;
           
            for ($i = 1; $i <= $num; ++$i)
                {
                    if ($form[$i]=="")
                        {
                           $empty_feilds += 1;
                        }
                }
                if ($empty_feilds == $num)
                    {
                        return false;
                    }
                    else
                    {
                        if(!checkvalues($form,$num))
                        return false;
                        else return true;
                    }
        }
 function checkvalues($form,$num)
    {
        $empty_feilds = 0;
        for ($i = 1; $i <= $num; ++$i)
                {
                                       
                    if (eregi('[a-zA-Z#_\-\.]',$form[$i]))
                        {
                             $empty_feilds += 1;
                        }
                }
        if ($empty_feilds >= 1)
              {
                 return false;
              }
         else return true;

    }

function order_value_d($orders,$num)
    {
        $value = 0;
        for ($i = 1; $i <= $num; $i++)
            {
                if(!$orders[$i]=="")
                    {
                        $price= get_price($i);
                        $o_price = $price * $orders[$i];
                        $value += $o_price;
                    }
            }
        return $value;
    }

function order_value($orders,$num)
    {
        $value = 0;
        for ($i = 1; $i <= $num; $i++)
            {
                if(!$orders[$i]=="")
                    {
                        $price= get_price($i);
                        $price *= 1.2;
                        $o_price = $price * $orders[$i];
                        $value += $o_price;
                    }
            }
        return $value;
    }

function get_price($pdt_id)
    {
        $q = "SELECT price from products where pdt_id = '$pdt_id'";
        $row = mysqli_fetch_row(queryMysql($q));
        $price = $row[0];
        return $price;
    }
?>
