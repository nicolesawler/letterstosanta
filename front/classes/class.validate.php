<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class VALIDATE{
    
            // *** BASIC VALIDATION ON ANYTHING *** //
    public function basicValidation($input)
    {
            $input = trim($input);
            $input = strip_tags($input);
            $input = stripcslashes($input);
            $input = htmlspecialchars($input);
            return $input; 
    } 
    
    
    
    public function toSlug($input)
    {
        //lowercase
            $input = strtolower($input);
        //replace spaces with dashes
            $input = str_replace(' ', '-', $input);
        //remove all special characters for letters and numbers only
            $input = preg_replace('/[^A-Za-z0-9\-]/', '', $input);
        //return
            return $input; 
    }  
    
    
    
    
    
    
    
    
    
}