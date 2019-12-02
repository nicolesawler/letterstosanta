<?php


/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

//Include validation class
    include 'classes/class.validate.php';
    $validateObj = new VALIDATE(); 


/**
* Display Saved On Button Click and Redirected Back
*/

$s = substr($_SERVER['REQUEST_URI'], strrpos($_SERVER['REQUEST_URI'], '?') + 1);
$saved = ($s == 'saved' ? 'savesuccess' : "");



/**
  $POST form submit
  @param $_POST
  @return redirect
*/
if(isset($_POST['update_account'])){

    $role = $validateObj->basicValidation($_POST['role']);
echo $role;
    try
    {
       if($adminObj->updateAccount($role)){ 
            return $lettersObj->redirect('account?saved');
       }else{
           echo "<p align=center><b>Couldn't Save Changes!</b></p>";
       }
   }
   catch(PDOException $e)
   {
       echo $e->getMessage();
   }  
    
}