<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
include 'functions.php';

$pdt_id = $_POST['pdt_id'];
if ($pdt_id)
    {
        $query = "select * from products where pdt_id = '$pdt_id'";
        $result = queryMysql($query);
        display_detail($result);
        
    }

function display_detail($result)
    {
        $row = mysqli_fetch_row($result);
        $price=$row[3];
        $price*= 1.2;
       echo<<<_END
         <h2>Product detail</h2>
       <div class="product_box margin_r10">

	            <h3>$row[1]</h3>
                <img src="images/pdt_pix/$row[0].jpg" alt="product" width ="185" height="190"/>
                <span class= "price">Price: =N=$price</span> | <a href="orderproducts.php"> Order</a>
        </div>
        <div class="productdetail_box margin_r10">
          <h3>Description</h3>
            <p>$row[2]</p>
            
        </div>
_END;
    }
?>
