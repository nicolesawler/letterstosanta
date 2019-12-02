<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/* Admin DB and Letters Class */
include_once '../back/db-admin.php';
/* Post & Validate */
include_once '../front/admin-account.php';
//Page Title
$title="Admin | Account";
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
    <h4>Update Account Details</h4>
    <form name="addpostform" method="post" enctype="multipart/form-data">
        
    <?php

     //Get pages List

         if($details = $adminObj->getAccount()){ 
             foreach ($details as $detail) 
             { 
                 echo "<b>Username</b><br> <input value='".$detail['username']."' disabled /><br><br>"
                          . "<b>Email</b><br> <input value='".$detail['email']."' disabled /><br><br>";?>

        
    
        
    <p>
        <label>Role</label><br>
               <select name="role" >
               <?php
               //first option
                echo "<option>".$detail['role']."</option>";
                
                //other options
                if($roles = $adminObj->getRoles()){ 
                    foreach ($roles as $role) 
                    { 
                        //exclude current option, show all others
                        if($detail['role'] != $role){
                            echo "<option>".$role."</option>";
                        }
                    }
                }else{
                    echo "<option>Administrator</option>";
                }?>
               
           </select>
        
        </p>
        
        <input type="submit" name="update_account" />
        
        
        
             <?php
             }
         }

     ?>   
        
        
    </form>
    
    

    
    
    
    
</div>


<!-- Footer -->
<?php include_once '../skins/admin/footer.php';