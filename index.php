<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include_once 'back/db-letters.php';

define('LOGIN_NOT_REQUIRED', 1);


if(defined('LOGIN_NOT_REQUIRED') && LOGIN_NOT_REQUIRED === 1){
    
    $lettersObj->redirect('home');
    
}