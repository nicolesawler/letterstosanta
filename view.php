<?php
/* Letters Class */
include_once 'back/db-letters.php';
/* Validation Class */
include_once 'front/view-post.php';
include_once 'front/counter.php';

$title=$titleEntry;
include_once 'skins/'.SKIN.'/header.php'; 
include_once 'skins/'.SKIN.'/nav.php';

?>


<div class="content">
    
    <h1><a href="view?p=<?=$idEntry?>"><?=$titleEntry?></a></h1>
    <p><?=$entryEntry?></p>
    <p><?=$commentcountEntry?> Comments &nbsp; <?=$viewsEntry?> Views</p>
    
</div>  



<div class="comments">
    <h2>Comments</h2>
    <?php
        
    try
    {
       if($comments = $lettersObj->getCommentsByPost($idEntry)){ 
           foreach ($comments as $comment) {
               echo "<div class='comment'><p><a href='mailto:".$comment['email']."'>"
                       . "<b>".$comment['name']."</b>"
                       . "</a><span> ".$comment['date_added']."</span></p>";
               
               echo "<p>".$comment['comment']."</p></div>";
           }
             
       }else{
           echo "<p align=center><b>No Comments Yet!</b></p>";
          
       }
   }
   catch(PDOException $e)
   {
       echo $e->getMessage();
   } 
   ?>
    <h3>Add Comment</h3>
    <form method="post" class="commentform">
        <b>Name</b><br>
        <input type="text" name="comment_name"/><br><br>
        <b>Email</b><br>
        <input type="email" name="comment_email"/><br><br>
        <b>Comment</b><br>
        <textarea name="comment"></textarea><br><br>
        
        <input type="submit" name="submit_comment"/>
    </form>
    
</div>  


<?php      
 include_once 'skins/'.SKIN.'/footer.php';