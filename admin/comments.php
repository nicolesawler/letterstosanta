<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/* Admin DB and Letters Class */
include_once '../back/db-admin.php';
/* Post & Validate */
include_once '../front/admin-comments.php';
//Page Title
$title="Admin | Comments";
//Header
include_once '../skins/admin/header.php';
//Navigation
include_once '../skins/admin/nav.php';

?> 

<div class="admin_content">
    
    <h1><?=$title;?></h1>

            <table class="table">
        
     
                   <?php

                    //Get pages List
                    try
                     {

                        if($comments = $adminObj->getComments()){ 
                            foreach ($comments as $comment) 
                            { 
                                echo "<tr><td>".$comment['name']."</td>"
                                         . "<td>".$comment['comment']."</td>"
                                         . "<td><a target=new href='comments?view=".$comment['id']."'>View</a></td>"
                                        . "<td><a href='comments?delete=".$comment['id']."'>Delete</a></td>"
                                        . "<tr>";
                            }
                        }else{
                            echo "<tr><td>None</td></tr>";
                        }


                    }
                    catch(PDOException $e)
                    {
                        echo $e->getMessage();
                    }  
                    ?>
    
   </table>
    
</div>


<!-- Footer -->
<?php include_once '../skins/admin/footer.php';