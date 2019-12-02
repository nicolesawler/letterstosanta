<aside>
    
    
<?php
//Create Navigation On Left Menu

if(isset($categoryChosen)){
    
        //Show all recipes under category chosen (if category is selected from nav)
        try
         {
            if($recipes = $recipesObj->getRecipesByCategory($categoryChosen)){ 
                foreach ($recipes as $recipe) 
                { ?>
                    <div class="link">
                        <a href="view?recipe=<?= $recipe['slug'];?>&category=<?= $categoryChosen;?>"><?= $recipe['title'];?></a>
                    </div>

                  <?php
               }
            }else{
                echo "<p align=center><br><br><b>No Recipes Yet!</b></p>";
            }
        }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        } 
    
}else{
    
        //Show all recipes if category is not set (ex: homepage shows all recipes with no category chosen)
        try
         {
            if($recipes = $recipesObj->getRecipes()){ 
                foreach ($recipes as $recipe) 
                { ?>
                    <div class="link">
                        <a href="view?recipe=<?= $recipe['slug'];?>"><?= $recipe['title'];?></a>
                    </div>

                  <?php
               }
            }else{
                echo "<p align=center><br><br><b>No Recipes Yet!</b></p>";
            }
        }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        } 

        
        
}//if(isset($categoryChosen)){
?>
    
    
    
</aside>