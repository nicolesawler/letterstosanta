<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class ADMIN{
    
    private $db;
    
    //BUILD
    function __construct($db_con)
    {
      $this->db = $db_con;
    }
    
    
     /**********************************************LETTERS/**********************************************/
    
    /**
      Add New Entry
      @param entry form string,string,textarea,string,string
      @return bool
    */
    public function addNewPost($title,$slug,$entry,$category,$tags)
    {

       try
       {
	       
	  //$letter = nl2br($chapter);

           $stmt = $this->db->prepare("INSERT INTO letters.letters (title, slug, entry, category, tags, date_added) 
                                                       VALUES(:title, :slug, :entry, :category, :tags, NOW() )");
              
           $stmt->bindparam(":title", $title);
           $stmt->bindparam(":slug", $slug);
           $stmt->bindparam(":entry", $entry);            
           $stmt->bindparam(":category", $category);            
           $stmt->bindparam(":tags", $tags);              
           $stmt->execute(); 
   
           return true; 
       }
       catch(PDOException $e)
       {
           echo $e->getMessage();
       }    
    }
 
    
    /**
      Delete Category
      @param int
      @return bool $results
    */

    public function deletePost($id)
    {
       try
       { 
        $stmt = $this->db->prepare("DELETE FROM letters.letters WHERE id = ".$id );
        $stmt->execute();
        return true;
       }
       catch(PDOException $e)
       {
           echo $e->getMessage();
       }   
    }
    
    
    /**********************************************CATEGORIES/**********************************************/
        
    /**
      Get All Categories
      @param NA
      @return Array $results
    */

    public function getCategories()
    {
       try
       { 
        $stmt = $this->db->prepare("SELECT * FROM  letters.categories" );
        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if($stmt->rowCount() > 0){
          return $results;
        }
       }
       catch(PDOException $e)
       {
           echo $e->getMessage();
       }   
    }
    
        
    /**
      Add New Entry
      @param entry form string,string,string
      @return bool
    */
    public function addNewCategory($title,$slug,$entry)
    {

       try
       {
	       
	  //$letter = nl2br($chapter);

           $stmt = $this->db->prepare("INSERT INTO letters.categories (category_name, category_slug, description, date_added) 
                                                       VALUES(:title, :slug, :entry, NOW() )");
              
           $stmt->bindparam(":title", $title);
           $stmt->bindparam(":slug", $slug);
           $stmt->bindparam(":entry", $entry);            
           $stmt->execute(); 
   
           return true; 
       }
       catch(PDOException $e)
       {
           echo $e->getMessage();
       }    
    }
    
    /**
      Delete Category
      @param int
      @return bool $results
    */

    public function deleteCategory($id)
    {
       try
       { 
        $stmt = $this->db->prepare("DELETE FROM letters.categories WHERE id = ".$id );
        $stmt->execute();
        return true;
       }
       catch(PDOException $e)
       {
           echo $e->getMessage();
       }   
    }
    
    
   
    /**********************************************PAGES/**********************************************/
        
    /**
      Get All pages
      @param NA
      @return Array $results
    */

    public function getPages()
    {
       try
       { 
        $stmt = $this->db->prepare("SELECT * FROM  letters.pages" );
        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if($stmt->rowCount() > 0){
          return $results;
        }
       }
       catch(PDOException $e)
       {
           echo $e->getMessage();
       }   
    }
    
        
    /**
      Add New Entry
      @param entry form string,string,string
      @return bool
    */
    public function addNewPage($title,$slug)
    {

       try
       {
           
           $page_url = $_SERVER['SERVER_NAME']."/".$slug;
           $stmt = $this->db->prepare("INSERT INTO letters.pages (page_title, page_slug, page_url,  date_added) 
                                                       VALUES(:title, :slug, :page_url, NOW() )");
              
           $stmt->bindparam(":title", $title);
           $stmt->bindparam(":slug", $slug); 
           $stmt->bindparam(":page_url", $page_url);         
           $stmt->execute(); 
   
           return true; 
       }
       catch(PDOException $e)
       {
           echo $e->getMessage();
       }    
    }
    
    /**
      Delete Category
      @param int
      @return bool $results
    */

    public function deletePage($id)
    {
       try
       { 
        $stmt = $this->db->prepare("DELETE FROM letters.pages WHERE id = ".$id );
        $stmt->execute();
        return true;
       }
       catch(PDOException $e)
       {
           echo $e->getMessage();
       }   
    }
     
     /**********************************************COMMENTS/**********************************************/
            
    /**
      Get All Comments
      @param NA
      @return Array $results
    */

    public function getComments()
    {
       try
       { 
        $stmt = $this->db->prepare("SELECT * FROM  letters.comments" );
        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if($stmt->rowCount() > 0){
          return $results;
        }
       }
       catch(PDOException $e)
       {
           echo $e->getMessage();
       }   
    }
    
       /**
      Delete Comment
      @param int
      @return bool $results
    */

    public function deleteComment($id)
    {
       try
       { 
        $stmt = $this->db->prepare("DELETE FROM letters.comments WHERE id = ".$id );
        $stmt->execute();
        return true;
       }
       catch(PDOException $e)
       {
           echo $e->getMessage();
       }   
    }
    
          /**
      Delete Comment
      @param int
      @return bool $results
    */
public function viewCommentPost($c_id)
    {
       try
       { 
        $stmt = $this->db->prepare("SELECT * FROM  letters.comments WHERE id =".$c_id );
        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if($stmt->rowCount() > 0){
          //return $results;
            $p_id=$results[0]['p_id'];
                        //get post id from comment id
                        $stmt = $this->db->prepare("SELECT id FROM letters.letters WHERE id =".$p_id );
                        $stmt->execute();
                        $result = $stmt->fetch();
                        return $result;
            
        }
       }
       catch(PDOException $e)
       {
           echo $e->getMessage();
       }   
    }
    
        
    /**********************************************ACCOUNT/**********************************************/
        
    /**
      Get All Categories
      @param NA
      @return Array $results
    */

    public function getRoles()
    {
     $roles = array("Administrator","Editor","Journalist","Author","Subscriber");
    return $roles;
    }
    
    
    
              
    /**
      Add New Comment COUNT
      @param int
      @return bool
    */
    public function updateAccount($role)
    {

       try
       {
           $stmt = $this->db->prepare("UPDATE letters.users SET role = '$role' WHERE (id = 1);");
           $stmt->execute(); 
           return true; 
       }
       catch(PDOException $e)
       {
           echo $e->getMessage();
       }    
    }
    
    
    
       /**
      Add New Comment COUNT
      @param int
      @return bool
    */
    public function getAccount()
    {
       try
       { 
        $stmt = $this->db->prepare("SELECT * FROM  letters.users WHERE id =1" );
        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if($stmt->rowCount() > 0){
          //return $results;
        return $results;
            
        }
       }
       catch(PDOException $e)
       {
           echo $e->getMessage();
       }   
    }
     
    
    
}