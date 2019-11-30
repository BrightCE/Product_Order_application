
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Greenlife Herbal::Products</title>
<meta name="keywords" content="Greenlife herbal, Herbal medicine, Greenlife products." />
<meta name="description" content="Greenlife herbal medcine online store." />
<link href="templatemo_style.css" rel="stylesheet" type="text/css" />
<script language="javascript" type="text/javascript">
function clearText(field)
{
    if (field.defaultValue == field.value) field.value = '';
    else if (field.value == '') field.value = field.defaultValue;
}
function displaydetail(num)
{
     params  = "pdt_id="+num;
      request = new ajaxRequest()
    request.open("POST", "productdetail.php", true)
    request.setRequestHeader("Content-type", "application/x-www-form-urlencoded")
    request.setRequestHeader("Content-length", params.length)
    request.setRequestHeader("Connection", "close")

    request.onreadystatechange = function()
    {
        if (this.readyState == 4)
            if (this.status == 200)
                if (this.responseText != null)
                 document.getElementById('desc').innerHTML = this.responseText
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
<body>
    <div id="templatemo_header_wrapper">

	<div id="templatemo_header">

   		<div id="site_title">
            <h1><a href="index.html" target="_parent">
            	<img src="images/templatemo_logo.png" alt="CSS Templates" />
                <span></span>
            </a></h1>
        </div>

         <div id="templatemo_menu">
            <ul>
                <li><a href="index.html" target="_parent">Home</a></li>
                <li><a href="products.php"  class="current">Products</a></li>
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

	<div id="templatemo_content">

        <div class="content_section">

        <h2>Product List</h2>

            <p>Here is a list of Greenlife products we have in stock. Click on any to veiw a detail description of it below the list.</p>

             <?php
                include 'functions.php';
                $pdts = get_pdt_list();
                display_products($pdts);

?>
            
        </div>
         <div class="cleaner_h40"></div>
         <a name="detail"></a>
        <div class="content_section" >
            <div id="desc">
                
            </div>
            <!-- product detail displays here -->
        </div>


        
    </div> <!-- end of content -->


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

  	<div class="cleaner"></div>

</div> <div id="templatemo_content_wrapper_bottom"></div> <!-- end of content_wrapper -->

<div id="templatemo_footer">

   			<ul class="footer_menu">
                <li><a href="#">Home</a></li>
                <li><a href="#">Products</a></li>
                <li><a href="#">Blog</a></li>
                <li><a href="#">About us</a></li>
                <li class="last_menu"><a href="#">Contact</a></li>
            </ul>

            Copyright © 2014 <a href="#">Greenlifeherbal</a> |
            Website created by <a href="http://www.brightprogrammes.com" target="_blank"> Bright Programmes</a></div>
<!-- end of templatemo_footer -->

</body>
</html>



