<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/* Admin DB and Letters Class */
include_once '../back/db-admin.php';
/* Post & Validate */
include_once '../front/admin-post.php';
//Page Title
$title="Admin | Add New Post";
//Header
include_once '../skins/admin/header.php';
//Navigation
include_once '../skins/admin/nav.php';

?> 

<div class="admin_content">
    
  

    
    <h1><?=$title;?></h1>
    
    
<?php
 // *** Error Display *** //
if($saved != "") {
   echo '<div class="saved">Saved.</div>';
}
?>
    
    <form name="addpostform" method="post" enctype="multipart/form-data">
        <p>
        <label>Title</label><br>
        <input name="title" type="text" placeholder="">
        </p><p>
        <label>Slug</label><br>
        <input name="slug" type="text" placeholder="<?=$_SERVER['SERVER_NAME'];?>/slughere">
        </p><p>
        <label>Entry</label><br>
        <textarea name="entry">Dear Santa/Diary...</textarea>
    </p><p>
        <label>Category</label><br>
               <select name="category" >
               <?php

                    //Get categories List
                    try
                     {

                        if($categories = $adminObj->getCategories()){ 
                            foreach ($categories as $category) 
                            { 
                                echo "<option>".$category['category_name']."</option>";
                            }
                        }else{
                            echo "<option>Uncategorized</option>";
                        }


                    }
                    catch(PDOException $e)
                    {
                        echo $e->getMessage();
                    }  
                    ?>
               
           </select>
        
        </p><p>
        <label>Tags (separate with comma)</label><br>
        <input type="text" name="tags">
        </p>
        
        <input type="submit" name="submit_post" />
        
    </form>
    
    

    
           <h1>Existing Posts</h1>
    
            <table class="table">
        
     
                   <?php

                    //Get pages List
                    try
                     {

                        if($posts = $lettersObj->getLetters()){ 
                            foreach ($posts as $post) 
                            { 
                                echo "<tr><td>".$post['title']."</td>"
                                         . "<td>".$post['entry']."</td>"
                                         . "<td><a href='../view?p=".$post['id']."'>View</a></td>"
                                        . "<td><a href='addpost?delete=".$post['id']."'>Delete</a></td>"
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

<script>
tinymce.init({
  selector: 'textarea',
  height: 400,
  plugins: 'table wordcount code',
  content_css: [
    '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
  '//www.tinymce.com/css/codepen.min.css']
});
</script>
<?php include_once '../skins/admin/footer.php';