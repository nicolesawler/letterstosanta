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



//On form Submit of Add New Post
if(isset($_POST['submit_post'])){
    
    
    $title = $validateObj->basicValidation($_POST['title']);
    $slug = $validateObj->basicValidation($validateObj->toSlug($_POST['slug']));
    $entry = $validateObj->basicValidation($_POST['entry']);
    $category = $validateObj->basicValidation($_POST['category']);
    $tags = $validateObj->basicValidation($_POST['tags']);
    
    try
    {

       if($adminObj->addNewPost($title,$slug,$entry,$category,$tags)){ 
            return $lettersObj->redirect('addpost?saved');
       }else{
           echo "<p align=center><b>Couldn't Post Entry!</b></p>";
       }


   }
   catch(PDOException $e)
   {
       echo $e->getMessage();
   }  
     
}


/**
  Action is delete to delete a post
  @param int id
  @return redirect
*/
if($_GET['delete']){
    $id= $_GET['delete'];
    
    try
    {
       if($adminObj->deletePost($id)){ 
            return $lettersObj->redirect('addpost?saved');
       }else{
           echo "<p align=center><b>Couldn't Delete Post!</b></p>";
       }
   }
   catch(PDOException $e)
   {
       echo $e->getMessage();
   }  
    
}