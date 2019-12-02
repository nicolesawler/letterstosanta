<nav>
  
<?php

//Get categories List
//Class from back/db-recipes Recipes Objects (class.recipes.php)
try
 {

    if($pages = $lettersObj->getPages()){ 
        foreach ($pages as $page) 
        { ?>
                <a href="<?=$page['page_slug'];?>"><?= $page['page_title'];?></a>
          <?php
       }
    }else{
        echo "<p align=center><b>No Pages Yet!</b></p>";
    }


}
catch(PDOException $e)
{
    echo $e->getMessage();
}  
?>
    
    
</nav>