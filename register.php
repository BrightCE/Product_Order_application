<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
include 'functions.php'; session_start();
$mesg = "<h2>Member Registration</h2>Please fill out the form below to
            register as a Greenlife member and enjoy discounts on products
and other benefits.";
$info = "";
$page = TRUE;

    displayheader();//displays page's head section
    output_menu();//displays page's menu bar in the body section.
    start_lhs(); //opens the right hand side main content area of the page
    
    //check to know if form is submitted filled_out($_POST)
    if(isset($_POST['submited']))
        {
            //process membership form
            $l_name = sanitizeString($_POST['l_name']);
            $f_name = sanitizeString($_POST['f_name']);
            $email = sanitizeString($_POST['email']);
            $gender = sanitizeString($_POST['gender']);
            $phone = sanitizeString($_POST['phone']);
            $address = escapestring($_POST['address']);
            $form_var = array('l_name'=>$l_name ,'f_name'=>$f_name,'email'=>$email,'gender'=>$gender,'phone'=>$phone,'address'=>$address);
            if(filled_out($form_var))
                {
                  //check to know if email is valid.
                  if(validate_email($email))
                        {
                            //check if member with this email already exist
                           if(getmember($email))
                                {
                                    $info="<span class= 'error'>Error: A member with this email already exist. Please try again</span>";
                                }
                                else{
                                    //save member details(get last insert id) and output success message
                                    $code = substr(str_shuffle(str_repeat('ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789',5)),0,8);
                                    $pswd = sha1($code);
                                    $message = "Dear $l_name, <br>
                                                 Thanks for registering at GreenlifeHerbal.<br>
                                                Your password is: <b>$code</b>.
                                                If you have any inquries, please use our contact form.<br>
                                                Thanks for your interest in GreenlifeHerbal.<br><br>
                                                Yours faithfully,<br>
                                                 GreenlifeHerbal.";

                                    //implement mail here...


                                                $q_db = "INSERT INTO members VALUES (NULL, '$l_name','$f_name', '$address','$phone','$gender')";
                                                $member_id = insertMysql($q_db);
                                     
                                                $q_login = "INSERT INTO login VALUES ('$member_id','$email','$pswd','YES')";
                                                if(queryMysql($q_login))
                                                    {
                                                        if(send_pswd($email,$message))
                                                       {
                                                           $page = FALSE;

                                                            $mesg = "<h2>Member Registration</h2>
                                                            Your registration was completed successfully.<br>
                                                            Please note that your password has been sent to the email address you provided.<br>
                                                            Your username on this site is your email address.";

                                                            output_responce_box($mesg);
                                                            display_rhs();
                                                            display_footer();
                                                       }
                                                       else{
                                                            $page = FALSE;

                                                            $mesg = "<h2>Member Registration</h2>
                                                            Your registration was completed successfully.<br>
                                                            However, we encountered an error while trying to send your password.<br>
                                                            Please use the reset password link to set your password. Your username on this site is your email address.<br>
                                                             We sincerely regret the inconvinence.";

                                                            output_responce_box($mesg);
                                                            display_rhs();
                                                            display_footer();
                                                       }
                                        }

                                }
                        }
                    else{
                        $info="<span class= 'error'>Error: Invalid email format. Please try again.</span>";

                    }
                }
                else{
                    $info="<span class= 'error'>Error: Not all feilds were filled. Please try again.</span>";
                     
                }
        }
     //else, output page as normal for member registration
     if($page){
        output_responce_box($mesg);
        info_box($info);
        display_reg_form();
        display_rhs();
        display_footer();
    }
    
?>
