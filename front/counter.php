<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


//Count Views
if(isset($_GET['p'])){
    define('post_id', $_GET['p']);
    $lettersObj->addView(post_id);
}