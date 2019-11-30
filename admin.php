<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
include 'functions.php'; session_start();
$validuser = TRUE; $mesg = "";
$displayform = $uploadform = FALSE;
/*
if (isset ($_SESSION['username']))
    {
        $validuser = TRUE;
    }
else
    {
        echo <<<_END
<script>
document.location.href = 'index.html'
</script>
_END;
        exit;
    }
*/
if ($validuser)
    {
        displayheader();//displays page's head section
        output_menu();//displays page's menu bar in the body section.
        output_sidebar();//displays the left hand side Admin functions menu
        open_content(); //opens the right hand side main content area of the page
              
    }

//check which form is submitted and process it accordingly
if (isset($_POST['name']) && isset($_POST['price']) && isset($_POST['desc']))
    {
        $pdt_name = sanitizeString($_POST['name']);
        $pdt_desc = escapestring($_POST['desc']);
        $price = sanitizeString($_POST['price']);
            if($pdt_name == "" || $pdt_desc == "" || $price == "")
                {
                    $mesg = "Please fill the form correctly. All feilds are compulsory.";
                     output_responce_box($mesg);
                    output_footer();

                }
                else{
                    $q_pdts = "INSERT INTO products VALUES (NULL, '$pdt_name','$pdt_desc', '$price')";
                    $pdt_id = insertMysql($q_pdts);
                    $uploadform = TRUE;
                    $_SESSION['pdt_id'] = $pdt_id;
                    $product= "Please Upload $pdt_name's picture";
                    //output upload form and the remaining section of the page.
                    uploadform($product);
                        output_footer();
                }

    }
else if(isset($_FILES['picture']['name']))
    {
        if ($_FILES['picture']['type']!= 'text/plain')
            {
               $pdt_id = $_SESSION['pdt_id'];

                     switch($_FILES['picture']['type'])
                             {
                                  case "image/gif": $saveto = "images/pdt_pix/$pdt_id.gif";
                                      break;
                                  case "image/jpeg": $saveto = "images/pdt_pix/$pdt_id.jpg";
                                       break;
                                  case "image/png": $saveto = "images/pdt_pix/$pdt_id.png";
                                        break;
                                  default:  $mesg = "picture format not supported. Please upload only images with a .gif , .jpg or .png file extensions"; output_responce_box($mesg);output_footer();
                                        break;
                              }
                           //check if file exist in temporary folder
                    if (is_uploaded_file($_FILES['picture']['tmp_name']))
                          {
                              //attempt to move file
                             if (move_uploaded_file($_FILES['picture']['tmp_name'], $saveto))
                                      {
                                          $mesg= "Product added successfully!";
                                          output_responce_box($mesg);output_footer();
                                          $_SESSION['pdt_id']="";
                                       }
                                            else
                                                {
                                                   $mesg= "Fatal error! Image could not be saved. Please contact your software vendor.";
                                                   output_responce_box($mesg);output_footer();
                                                }
                          }
            }
            else
                {
                      $mesg= "File format not recognised! please upload only images.";
                      uploadform($product);
                        output_footer();
                }
    }//end of upload pic processing


else{
        output_responce_box($mesg);
        output_footer();
}

?>
