<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
include 'functions.php';session_start();
displayheader();

if(isset($_POST['email']))
    {
        $email = sanitizeString($_POST['email']);
        $pswd = sanitizeString($_POST['pswd']);
        $pswd = sha1($pswd);
        $form_var = array('email'=>$email ,'pswd'=>$pswd);
        if(filled_out($form_var))
            {
                $query = "SELECT * from login WHERE email ='$email' and password = '$pswd'";
                $result = queryMysql($query);
                if (mysqli_num_rows($result) == 0)
                    {
                        $mesg = "Error: Email and password combination is incorrect.<br>
                                     Please try again.";
                        output_menu();
                        start_lhs();
                        output_responce_box($mesg);
                        display_login_form();
                        display_rhs();
                        display_footer();
                    }
                    else{
                        $row = mysqli_fetch_row($result);
                        $_SESSION['member_id'] = $row[0];
                        $_SESSION['name'] = get_name($row[0]);
                        echo <<<_END
<script>
document.location.href = 'orderproducts.php'
</script>
_END;
                    }
            }
            else{
               echo <<<_END
<script>
document.location.href = 'orderproducts.php'
</script>
_END;
            }
    }

function get_name($num)
    {
        $q_mem = "SELECT f_name from members where member_id = '$num'";
        $result = queryMysql($q_mem);
        $row = mysqli_fetch_row($result);
        return $row[0];
    }



    
?>
