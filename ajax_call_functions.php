<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
function display_addpdt_form()
    {
       echo <<<_END
          <div class="content_section">

        <h2>Add a product: Step 1 of 2</h2>
        <p>Please fill out the form below to add the product. Note that all feilds are compulsory</p>
            <div class="contact_form">
                <form action="admin.php" method="POST">
                <label>Name</label>
                <input type="text" value="" name="name" size="50"/>
                <label>Price</label>
                <input type="text" value="" name="price" size="50"/>
                <label>Description</label>
                <textarea name="desc" rows="10" cols="45">
                </textarea>
                <div class="cleaner"></div>
                <input type="submit" value="Send"/>
        </form>
<div class="cleaner"></div>
            </div>


        </div>
_END;
    }

//function to get and display a list of available products
function display_products($pdts)
    {
        $c = 0;
        Echo "<div class='prdtlist_box margin_r10'>
	             <ul class='pdt_list'>";
        for ($i = 0; $i < mysqli_num_rows($pdts); ++$i)
            {
                $row = mysqli_fetch_row($pdts);
                if ($c < 10)
                    {
                        echo "<li><a href='#detail' onclick='displaydetail($row[0])'>$row[1]</a></li>";
                        $c++;
                    }
                    else{
                        $c=0;
                        echo "</ul>
                                </div>
            <div class='prdtlist_box margin_r10'>
	             <ul class='pdt_list'>";
            echo "<li><a href='#detail' onclick='displaydetail($row[0])'>$row[1]</a></li>";
                        $c++;
                    }
            }//end for loop

            echo "</ul>
                    </div>";
    }

function display_login_form()
    {
        echo <<<_END
        <div class="contact_form">
                <form action="login.php" method="POST">
                <label>Email</label>
                <input type="text" value="" name="email" size="30"/>
                <label>Password</label>
                <input type="password" value="" name="pswd" size="30"/>
                <span><a href='resetpassword.php'>Forgot password?</a></span>
                <div class="cleaner"></div>
                <input type="submit" value="Login"/>
        </form>
<div class="cleaner"></div>
</div>
_END;
    }


?>
