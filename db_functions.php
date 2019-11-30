<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
function dbconnect()
    {
        @ $db = new mysqli('localhost', 'greenapp', 'greenpswd', 'greenlife');

        if (mysqli_connect_error())
            {
                die('Could not connect: ' . mysqli_connect_error());
            }

        return $db;
    }

function queryMysql($query)
    {
        $conn = dbconnect();
        $result = $conn->query($query) or die (mysqli_error($conn));
        return $result;
    }

function createTable($name, $query)
    {
        queryMysql("CREATE TABLE IF NOT EXISTS $name($query)");
        echo "Table '$name' created or already exists.<br />";
    }


function get_pdt_list()
    {
        $q_pdt = "Select pdt_id, pdt_name from products";
        $result = queryMysql($q_pdt);
        return $result;
    }


function sanitizeString($var)
{
    $var = strip_tags($var);
    $var = htmlentities($var);
    $var = stripslashes($var);
    return $var;
}

function escapestring($var)
    {
        $conn = dbconnect();
        $string = $conn->real_escape_string($var);
        return $string;
    }

function insertMysql($query)
    {
        $conn = dbconnect();
        $conn->query($query) or die (mysqli_error($conn));
        $id = $conn->insert_id;
        return $id;
    }

function validate_email($field)
    {
        if (!((strpos($field, ".") > 0) &&
			       (strpos($field, "@") > 0)) ||
					preg_match("/[^a-zA-Z0-9.@_-]/", $field))
		return FALSE;

	else return TRUE;
    }

function getmember($email)
    {
      $q = "Select * from login where email = '$email'";
        $result = queryMysql($q);
        if (mysqli_num_rows($result) == 0)
        return FALSE;
        else return TRUE;
    }

?>
