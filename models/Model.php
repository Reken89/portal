<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Model {
    protected $db = null;
    
    public function __construct() {
       $this->db = DB::connToDB();
    }
}