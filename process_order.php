<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
include 'functions.php'; session_start();

if(isset($_POST['num']))
    {
        $num = $_POST['num'];


          for ($i = 1; $i <= $num; ++$i)
                {
                   $orders[$i] = sanitizeString($_POST[$i]);
                }
         if(valid_qty($orders,$num))
                {
                  if(isset($_POST['name']))
                    {
                    //process for walkin customer
                    $c_name = sanitizeString($_POST['name']);
                    if($c_name=="")
                        {
                            echo <<<_END
<script>
document.location.href ='orderproducts.php?error=1'
</script>
_END;
                           
                        }
                    else{
                        $value = order_value($orders,$num);

                    $query = "insert into orders (c_name,value)
                               values('$c_name','$value')";
                   $order_id = insertMysql($query);
                           if($order_id > 0)
                                {
                                    for ($i = 1; $i <= $num; ++$i)
                                        {
                                            if(!$orders[$i]== "")
                                                {
                                                    $query = "insert into orders_detail
                                                    values('$order_id','$i','$orders[$i]')";
                                                    queryMysql($query);
                                                }

                                        }
                                }
                                echo <<<_END
<script>
document.location.href ='orderproducts.php?o_id=$order_id'
</script>
_END;
                        }

                    }
                    else{
                        //process for registered member
                        $value = order_value_d($orders,$num);
                        $member_id = $_SESSION['member_id'];
                        $query = "insert into orders (member_id,value)
                                    values('$member_id','$value')";
                         $order_id = insertMysql($query);
                           if($order_id > 0)
                                {
                                    for ($i = 1; $i <= $num; ++$i)
                                        {
                                            if(!$orders[$i]== "")
                                                {
                                                    $query = "insert into orders_detail
                                                    values('$order_id','$i','$orders[$i]')";
                                                    queryMysql($query);
                                                }

                                        }
                                }
                                echo <<<_END
<script>
document.location.href ='orderproducts.php?o_id=$order_id'
</script>
_END;
                        
                    }
                }
                Else{
                    echo <<<_END
<script>
document.location.href ='orderproducts.php?error=2'
</script>
_END;
                    
                }

    }
?>
