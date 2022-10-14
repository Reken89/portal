<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class IndexModel extends Model {
    
    public function checkUser() {
        
        $name = $_POST['name'];
        $password = md5($_POST['password']);
        
        $sql = "SELECT * FROM users_ku WHERE name = :name AND password = :password";
        
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(":name", $name, PDO::PARAM_STR);
        $stmt->bindValue(":password", $password, PDO::PARAM_STR);
        $stmt->execute();
        
        
        $res = $stmt->fetch(PDO::FETCH_ASSOC);
       
    
        
       if (!empty($res)) {
   
            $_SESSION['user'] = $_POST['name'];
            $_SESSION['id'] = $res['id'];
            
            header("Location: /portal/cabinet");
        } else {

          
            return false;
            
        }
        
    }
    
}