<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

//Connect to DB
include 'db-letters.php';

//Include and create Object Classes
include_once 'classes/class.admin.php';

$adminObj = new ADMIN($db_con);
