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
  Action is delete to delete a category
  @param int id
  @return redirect
*/
if($_GET['delete']){
    $id= $_GET['delete'];
    
    try
    {
       if($adminObj->deleteCategory($id)){ 
            return $lettersObj->redirect('categories?saved');
       }else{
           echo "<p align=center><b>Couldn't Add Category!</b></p>";
       }
   }
   catch(PDOException $e)
   {
       echo $e->getMessage();
   }  
    
}


/**
  $POST form submit
  @param $_POST
  @return redirect
*/
if(isset($_POST['submit_post'])){

    $title = $validateObj->basicValidation($_POST['title']);
    $slug = $validateObj->basicValidation($validateObj->toSlug($_POST['slug']));
    $desc = $validateObj->basicValidation($_POST['desc']);
    
    try
    {
       if($adminObj->addNewCategory($title,$slug,$desc)){ 
            return $lettersObj->redirect('categories?saved');
       }else{
           echo "<p align=center><b>Couldn't Add Category!</b></p>";
       }
   }
   catch(PDOException $e)
   {
       echo $e->getMessage();
   }  
    
}