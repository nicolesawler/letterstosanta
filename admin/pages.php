<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/* Admin DB and Letters Class */
include_once '../back/db-admin.php';
/* Post & Validate */
include_once '../front/admin-pages.php';
//Page Title
$title="Admin | Pages";
//Header
include_once '../skins/admin/header.php';
//Navigation
include_once '../skins/admin/nav.php';

?> 

<div class="admin_content">
    
    <h1><?=$title;?></h1>

 <?php
 // *** If Saved Display *** //
if($saved != "") {
   echo '<div class="saved">Saved.</div>';
}
?>
    
    
    <form name="addpageform" method="post" enctype="multipart/form-data">
        <p>
        <label>Page Name</label><br>
        <input name="title" type="text">
        </p><p>
        <label>Slug</label><br>
        <input name="slug" type="text">
        </p>
        </p>
        <input type="submit" name="submit_post" />
    </form>
    
    
    
       <h1>Existing Pages</h1>
    
            <table class="table">
        
     
                   <?php

                    //Get pages List
                    try
                     {

                        if($pages = $adminObj->getPages()){ 
                            foreach ($pages as $page) 
                            { 
                                echo "<tr><td>".$page['page_title']."</td>"
                                         . "<td>".$page['page_slug']."</td>"
                                         . "<td><a href='pages?view=".$page['id']."'>View</a></td>"
                                        . "<td><a href='pages?delete=".$page['id']."'>Delete</a></td>"
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