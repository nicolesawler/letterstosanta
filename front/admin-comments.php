<?php


/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


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
       if($adminObj->deleteComment($id)){ 
            return $lettersObj->redirect('comments?saved');
       }else{
           echo "<p align=center><b>Couldn't Delete Comment!</b></p>";
       }
   }
   catch(PDOException $e)
   {
       echo $e->getMessage();
   }  
    
}


   
   
/**
  Action is delete to delete a category
  @param int id
  @return redirect
*/
if($_GET['view']){
    $c_id= $_GET['view'];
    
    try
    {
       if($post = $adminObj->viewCommentPost($c_id)){ 
            return $lettersObj->redirect('../view?p='.$post['id']);
       }else{
           echo "<p align=center><b>Couldn't View Comment!</b></p>";
       }
   }
   catch(PDOException $e)
   {
       echo $e->getMessage();
   }  
    
}

