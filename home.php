<?php
/* Letters Class */
include_once 'back/db-letters.php';
/* Validation Class */
include_once 'front/home-letter.php';
$title="Home";
include_once 'skins/'.SKIN.'/header.php'; 
include_once 'skins/'.SKIN.'/nav.php';

//Get All Letters
    try
    {
       if($letters = $lettersObj->getLetters()){ 
            foreach($letters as $letter){
                $titleEntry = $letter['title'];
                $idEntry = $letter['id'];
                $slugEntry = $letter['slug'];
                $entryEntry = $letter['entry'];
                $categoryEntry = $letter['category'];
                $tagsEntry = $letter['tags'];
                $viewsEntry = $letter['views'];
                $commentcountEntry = $letter['comment_count'];
                
                
                //OUTPUT DATA
?>




<div class="content">
    
    <h1><a href="view?p=<?=$idEntry?>"><?=$titleEntry?></a></h1>
    
    <p><?=$entryEntry?></p>
    
    <p><?=$commentcountEntry?> Comments &nbsp; <?=$viewsEntry?> Views</p>
    
</div>  
    
    
                
                
                
<?php      
                
            }
       }else{
           echo "<p align=center><b>No Entries Yet!</b></p>";
       }
   }
   catch(PDOException $e)
   {
       echo $e->getMessage();
   }  
   
   
 include_once 'skins/'.SKIN.'/footer.php';