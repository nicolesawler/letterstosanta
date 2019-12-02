<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/* Admin DB and Letters Class */
include_once '../back/db-admin.php';
/* Post & Validate */
include_once '../front/admin-categories.php';
//Page Title
$title="Admin | Categories";
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
    
    <form name="addcategoryform" method="post" enctype="multipart/form-data">
        <p>
        <label>Category Name</label><br>
        <input name="title" type="text">
        </p><p>
        <label>Slug</label><br>
        <input name="slug" type="text">
        </p><p>
        <label>Description</label><br>
        <textarea name="desc"></textarea>
        </p>
        </p>
        <input type="submit" name="submit_post" />
    </form>
    
    
    
       <h1>Existing Categories</h1>
    
            <table class="table">
        
     
                   <?php

                    //Get categories List
                    try
                     {

                        if($categories = $adminObj->getCategories()){ 
                            foreach ($categories as $category) 
                            { 
                                echo "<tr><td>".$category['category_name']."</td>"
                                        . "<td><a href='categories?delete=".$category['id']."'>Delete</a></td>"
                                        . "<td>".$category['description']."</td>"
                                        . "<tr>";
                            }
                        }else{
                            echo "<tr><td>Uncategorized</td></tr>";
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