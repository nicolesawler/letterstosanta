<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


//Connect to DB
$db_host = "localhost";
$db_user = "root";
$db_pass = "root";
$db_name = "letters";

//Try Connection
try
{
     $db_con = new PDO("mysql:host={$db_host};dbname={$db_name}",$db_user,$db_pass);
     $db_con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e)
{
     echo $e->getMessage();
}

//Include and create Object Classes
include_once 'classes/class.letters.php';

$lettersObj = new LETTERS($db_con);


include './constants.php';
