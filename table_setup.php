<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
include 'functions.php';

/*createTable('users',
            'user_id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            s_name VARCHAR(32),
            f_name VARCHAR(32),
            email VARCHAR(32)');
 
    createTable('products',
            'pdt_id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            pdt_name VARCHAR(128),
            pdt_desc TEXT,
            price INT');*/


$q_db = "drop table login";
queryMysql($q_db);

createTable('login',
            'member_id INT UNSIGNED NOT NULL PRIMARY KEY,
            email VARCHAR(128),
            password VARCHAR(512),
            f_time VARCHAR(32)');

createTable('members',
            'member_id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            l_name VARCHAR(32),
            f_name VARCHAR(32),
            address TEXT,
            phone VARCHAR(128),
            gender VARCHAR(32)');




createTable('orders',
            'order_id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            member_id INT UNSIGNED,
            c_name VARCHAR(128),
            value INT UNSIGNED,
            date TIMESTAMP,
            processed TINYINT(1)');

createTable('orders_detail',
            'order_id INT UNSIGNED,
            pdt_id INT UNSIGNED,
            qty INT UNSIGNED');
?>
