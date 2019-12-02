<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class LETTERS{
    
    private $db;
    
    //BUILD
    function __construct($db_con)
    {
      $this->db = $db_con;
      $this->table = 'letters';
    }
    
    // REDIRECT PAGE
    public function redirect($url)
    {
        header("Location: $url");
    } 
    
     /********************************************************** LETTERS  /**********************************************************/
    
    /**
      Get All Letters
      @param NA
      @return Array $results
    */
    public function getLetters()
    {
       try
       { 
        $stmt = $this->db->prepare("SELECT * FROM  letters.letters" );
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
      Get Letters by Letter ID
      @param int ID
      @return Single Row Array $results
    */
    public function getLetterByID($id)
    {
       try
       { 
        $stmt = $this->db->prepare("SELECT * FROM  letters.letters WHERE id=".$id );
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
    
     /********************************************************** PAGES  /**********************************************************/
    
    
    /**
      Get Pages for Navigation
      @param none
      @return Array $results
    */
    public function getPages()
    {
       try
       { 
        $stmt = $this->db->prepare("SELECT * FROM  letters.pages ");
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
    
    
    
   /********************************************************** COMMENTS  /**********************************************************/
        
    /**
      Get All Comments
      @param NA
      @return Array $results
    */
    public function getCommentsByPost($id)
    {
       try
       { 
        $stmt = $this->db->prepare("SELECT * FROM  letters.comments WHERE p_id = ".$id );
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
      Add New Comment
      @param entry form string,string,string,int
      @return bool
    */
    public function addNewComment($name,$email,$comment,$pid)
    {

       try
       {
           $stmt = $this->db->prepare("INSERT INTO letters.comments (p_id, name, email, comment, date_added) 
                                                       VALUES(:id, :name, :email, :comment, NOW() )");
              
           $stmt->bindparam(":id", $pid);
           $stmt->bindparam(":name", $name);
           $stmt->bindparam(":email", $email);            
           $stmt->bindparam(":comment", $comment);               
           $stmt->execute(); 
   
           return true; 
       }
       catch(PDOException $e)
       {
           echo $e->getMessage();
       }    
    }
    
    
    
    
     
   /********************************************************** VIEWS/COUNTS  /**********************************************************/
   
    
          
    /**
      Add VIEW
      @param int
      @return bool
    */
    public function addView($id)
    {

       try
       {
           $stmt = $this->db->prepare("UPDATE letters.letters SET views = views+1 WHERE (id = ".$id.");");
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
    public function addCommentCount($id)
    {

       try
       {
           $stmt = $this->db->prepare("UPDATE letters.letters SET comment_count = comment_count+1 WHERE (id = ".$id.");");
           $stmt->execute(); 
           return true; 
       }
       catch(PDOException $e)
       {
           echo $e->getMessage();
       }    
    }
    
    
    
    
}