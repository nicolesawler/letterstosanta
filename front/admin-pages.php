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
       if($adminObj->deletePage($id)){ 
            return $lettersObj->redirect('pages?saved');
       }else{
           echo "<p align=center><b>Couldn't Delete Page!</b></p>";
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
    
    //Get Post Contents
    $title = $validateObj->basicValidation($_POST['title']);
    $slug = $validateObj->basicValidation($validateObj->toSlug($_POST['slug']));
    
    if($slug === ""){
        $slug = $validateObj->toSlug($title);
    }
    
    
   //Create Page File
    $pagename = $slug;

    $newFileName = '../'.$pagename.".php";
    //Add Default Content to Page
    $newFileContent = '<?php 
                        /* Required */
                        include_once "back/db-letters.php";
                        include_once "skins/".SKIN."/header.php"; 
                        include_once "skins/".SKIN."/nav.php";
                        ?>
                        <div class="content">
                            <h1>Title</h1>
                            <p>Content...</p>
                        </div>
                        <?php 
                        include_once "skins/".SKIN."/footer.php";
                        ?>';
    
    
    
    ////**********

    if (file_put_contents($newFileName, $newFileContent) !== false) {
        echo "File created (" . basename($newFileName) . ")";

        //Insert Info Into DB
        try
        {
           if($adminObj->addNewPage($title,$slug)){ 
               //redirect output to saved
                return $lettersObj->redirect('pages?saved');
           }else{
               echo "<p align=center><b>Couldn't Add Page!</b></p>";
           }
       }
       catch(PDOException $e)
       {
           echo $e->getMessage();
       }  


    } else {
        echo "Cannot create file (" . basename($newFileName) . ")";

    }
   
   
    
}