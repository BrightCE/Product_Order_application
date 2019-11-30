<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
function displayheader()
    {
        echo <<<_END
     <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Greenlife Herbal</title>
<meta name="keywords" content="Greenlife herbal, Herbal medicine" />
<meta name="description" content="Greenlife herbal medcine online store." />
<link href="templatemo_style.css" rel="stylesheet" type="text/css" />
<script src="validate_functions.js"></script>
<script language="javascript" type="text/javascript">

function adminfunction(num)
{
     params  = "func_id="+num;
      request = new ajaxRequest()
    request.open("POST", "adminfunction.php", true)
    request.setRequestHeader("Content-type", "application/x-www-form-urlencoded")
    request.setRequestHeader("Content-length", params.length)
    request.setRequestHeader("Connection", "close")

    request.onreadystatechange = function()
    {
        if (this.readyState == 4)
            if (this.status == 200)
                if (this.responseText != null)
                 document.getElementById('page').innerHTML = this.responseText
    }
    request.send(params)
}

function ajaxRequest()
{
    try { var request = new XMLHttpRequest() }
    catch(e1) {
        try { request = new ActiveXObject("Msxml2.XMLHTTP") }
        catch(e2) {
            try { request = new ActiveXObject("Microsoft.XMLHTTP") }
            catch(e3) {
                request = false
    }   }   }
    return request
}

</script>
</head>
_END;

    }

//function to display the menu bar
function output_menu()
    {
        echo<<<_END
        <body>
<div id="templatemo_header_wrapper">

	<div id="templatemo_header">

   		<div id="site_title">
            <h1><a href="index.html" target="_parent">
            	<img src="images/templatemo_logo.png" alt="Logo" />
                <span></span>
            </a></h1>
        </div>

         <div id="templatemo_menu">
            <ul>
                <li><a href="index.html">Home</a></li>
                <li><a href="products.php" target="_parent">Products</a></li>
                <li><a href="blog.php" target="_parent">Blog</a></li>
                <li><a href="about.html" target="_parent">About Us</a></li>
                <li><a href="contact.html" target="_parent">Contact</a></li>
            </ul>
        </div> <!-- end of templatemo_menu -->

    	<div class="cleaner"></div>
    </div> <!-- end of templatemo_header -->

</div>
<!-- end of templatemo_header_wrapper -->
<div id="templatemo_content_wrapper">
_END;
    }

//function to output side menu bar

function output_sidebar()
    {
        echo<<<_END
        
    <div id="admin_box1">
    <div id="templatmeo_sidebar">

    	<div class="sidebar_section">

            <h2>Admin functions</h2>

       		<div class="sidebar_section_content">

                <ul class="categories_list">
                    <li><a href="#" onclick='adminfunction(1)'>Add Product</a></li>
                    <li><a href="#" onclick='adminfunction(2)'>Edit Product</a></li>
                    <li><a href="#" onclick='adminfunction(3)'>Remove Product</a></li>
                    <li><a href="#" onclick='adminfunction(4)'>Blog Post</a></li>
                    <li><a href="#" onclick='adminfunction(5)'>View Orders</a></li>

                </ul>
            </div>

        </div>


	</div> <!-- end of sidebar -->
    </div><!-- end admin box1(left menu panel)-->
_END;
    }

//function to display RHS of page
function display_rhs()
    {
        echo<<<_END
        </div>
    <div id="templatmeo_sidebar">

    	<div class="sidebar_section">

            <h2>Site Links</h2>

       		<div class="sidebar_section_content">

                <ul class="categories_list">
                    <li><a href="register.php">Register Here</a></li>
                    <li><a href="orderproducts.php">Order Products</a></li>
                    <li><a href="financial_freedom.html">Financial freedom - Learn how</a></li>
                    <li><a href="investmentplan.html">Investment plan and options</a></li>
                    <li><a href="#">Nutrition and diet plan</a></li>
                    <li><a href="faq.html">FAQ</a></li>

                </ul>
            </div>

        </div>

        <div class="cleaner_h30"></div>


	</div> <!-- end of sidebar -->
_END;
    }

//function to open content area
function open_content()
    {
        echo<<<_END
     <div id="admin_box2">
<div id="templatemo_content">
_END;
    }

    function start_lhs()
        {
            echo<<<_END
<div id="templatemo_content">
_END;
        }

//function to output ajax response box
function output_responce_box($mesg)
    {
        echo<<<_END
        <div class="content_section">
            <div id = "page">
                <p>$mesg</p>
            </div>

        </div>

_END;
    }

    function info_box($info)
        {
          echo<<<_END
        <div class="content_section">
            <div id = "info">
                <p>$info</p>
            </div>
        </div>
_END;
        }

//function to output page footer
function output_footer()
    {
        echo<<<_END
            </div> <!-- end of content -->
</div> <!-- end admin_box2 (funtions display area)-->
<div class="cleaner"></div>

</div>
        <div class="cleaner"></div>

</div> <div id="templatemo_content_wrapper_bottom"></div> <!-- end of content_wrapper -->

<div id="templatemo_footer">

   			<ul class="footer_menu">
                <li><a href="index.html">Home</a></li>
                <li><a href="products.php">Products</a></li>
                <li><a href="blog.php">Blog</a></li>
                <li><a href="about.html">About us</a></li>
                <li class="last_menu"><a href="contact.html">Contact</a></li>
            </ul>

            Copyright © 2014 <a href="#">Your Company Name</a> |
            Website created by <a href="http://www.brightprogrammes.com" target="_blank"> Bright Programmes</a></div>

</body>
</html>
_END;
    }

function display_footer()
    {
          	echo<<<_END

            <div class="cleaner"></div>
</div>
</div> <div id="templatemo_content_wrapper_bottom"></div> <!-- end of content_wrapper -->

<div id="templatemo_footer">

   			<ul class="footer_menu">
                <li><a href="index.html">Home</a></li>
                <li><a href="products.php">Products</a></li>
                <li><a href="blog.php">Blog</a></li>
                <li><a href="about.html">About us</a></li>
                <li class="last_menu"><a href="contact.html">Contact</a></li>
            </ul>

            Copyright © 2014 <a href="#">Greenlifeherbal</a> |
            Website created by <a href="http://www.brightprogrammes.com" target="_blank"> Bright Programmes</a></div>
<!-- end of templatemo_footer -->

</body>
</html>
_END;
    }

function display_reg_form()
    {
       echo<<<_END
       <div class="content_section">

        <p>Please note that all fields are compulsory.</p>
            <div class = "contact_form">
                <form name="form" action="register.php" method="post">
                <input type="hidden" name="submited" value="yes" />
                <label>Surname<span class="error" id="f1"></span></label>
                <input type="text" id ="f11" value="" name="l_name" size="50" onblur="vname(this,'f1')"/>
                <label>First Name <span class="error" id="f2"></span></label>
                <input type="text" id ="f11" value="" name="f_name" size="50" onblur="vname(this,'f2')"/>
                <label>Email<span class="error" id="f3"></span></label>
                <input type="text" id="f22" value="" name="email" size="50" onblur="vEmail(this,'f3')"/>
                <label>Address <span class="error" id="f4"></span></label>
                <input type="text" id ="f11" value="" name="address" size="50" onblur="vfeild(this,'f4')"/>
                <label>Phone<span class="error" id="f5"></span></label>
                <input type="text" id ="f11" value="" name="phone" size="50" onblur="vfeild(this,'f5')"/>
                </div>

                <label>Gender</label><br>
                <span>Male</span><input type="radio" name="gender" value="male" /> | 
                <span>Female</span><input type="radio" name="gender" value="female" />
                <div class="cleaner"></div>
              <div class = "contact_form">
                <input type="submit" value="Send"/>

        </form>
<div class="cleaner"></div>
            </div>


        </div>
         <div class="cleaner_h40"></div>

_END;

    }

function display_order_form()
    {
        $q_pdts = "select pdt_id,pdt_name,price from products";
        $result = queryMysql($q_pdts);
        $num = mysqli_num_rows($result);

      echo<<<_END
      <div class="cleaner"></div>
          <div class="content_section">

            
             <form name="form" action="process_order.php" method="post">
             <p class = "margin_l20"><label><b>Customer name:</b><span class="error" id="f1"></span></label><br>
                <input type="text" id ="f11" value="" name="name" size="30" onblur="vname(this,'f1')"/><br></p>
                <input type="hidden" name="num" value="$num" />
                <table border="1" class = "margin_l20">
                    <thead>
                        <tr>
                        <th>Product Name</th>
                        <th>Unit price (=N=)</th>
                        <th>Quantity</th>
                        </tr>
                    </thead>
                    <tbody>
_END;
            for ($i = 0; $i < $num; ++$i)
                {
                    $row = mysqli_fetch_row($result);
                    $price = $row[2];
                    $price *= 1.2;
                    echo<<<_END
                       <tr>
                        <td>$row[1]</td>
                        <td>$price</td>
                        <td><input type="text" name="$row[0]" value="" size="6"/></td>
                       </tr>
_END;
                }
                echo<<<_END
             </tbody>
        </table>
        <div class = "contact_form">
        <input type="submit" value="Submit"/>
             </form>
            </div>
<div class="cleaner"></div>
        </div>
_END;
    }

function display_discount_order_form()
    {
         $q_pdts = "select pdt_id,pdt_name,price from products";
        $result = queryMysql($q_pdts);
        $num = mysqli_num_rows($result);

      echo<<<_END
      <div class="cleaner"></div>
          <div class="content_section">
            <form name="form" action="process_order.php" method="post">
            <input type="hidden" name="num" value="$num" />
                <table border="1" class = "margin_l20">
                    <thead>
                        <tr>
                        <th>Product Name</th>
                        <th>Unit price (=N=)</th>
                        <th>Quantity</th>
                        </tr>
                    </thead>
                    <tbody>
_END;
            for ($i = 0; $i < $num; ++$i)
                {
                    $row = mysqli_fetch_row($result);
                    $price = $row[2];
               
                    echo<<<_END
                       <tr>
                        <td>$row[1]</td>
                        <td>$price</td>
                        <td><input type="text" name="$row[0]" value="" size="6"/></td>
                       </tr>
_END;
                }
                echo<<<_END
             </tbody>
        </table>
        <div class = "contact_form">
        <input type="submit" value="Submit"/>
             </form>
            </div>
<div class="cleaner"></div>
        </div>
_END;
    }
?>
