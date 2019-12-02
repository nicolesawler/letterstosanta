<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

    include 'classes/class.validate.php';
    $validateObj = new VALIDATE(); 

    
    
//get post
if(isset($_GET['p'])){
    define('ID', $_GET['p']);
    try
    {
       if($letter = $lettersObj->getLetterByID($_GET['p'])){ 
           
                $titleEntry = $letter[0]['title'];
                $idEntry = $letter[0]['id'];
                $slugEntry = $letter[0]['slug'];
                $entryEntry = $letter[0]['entry'];
                $categoryEntry = $letter[0]['category'];
                $tagsEntry = $letter[0]['tags'];
                $viewsEntry = $letter[0]['views'];
                $commentcountEntry = $letter[0]['comment_count'];
             
       }else{
           //echo "<p align=center><b>No Entries Yet!</b></p>";
           $lettersObj->redirect('home');
       }
   }
   catch(PDOException $e)
   {
       echo $e->getMessage();
   }        
    
}else{
    $lettersObj->redirect('home');
}





//get comment post
if(isset($_POST['submit_comment'])){

    $name = $validateObj->basicValidation($_POST['comment_name']);
    $email = $validateObj->basicValidation($_POST['comment_email']);
    $comment = $validateObj->basicValidation($_POST['comment']);
   
    try
    {

       if($lettersObj->addNewComment($name,$email,$comment,ID)){ 
           if($lettersObj->addCommentCount(ID)){
               
            return $lettersObj->redirect('view?p='.ID.'&action=saved');
           
       }
       }else{
           echo "<p align=center><b>Couldn't Add Comment</b></p>";
       }


   }
   catch(PDOException $e)
   {
       echo $e->getMessage();
   }  
    
    
    
    
}