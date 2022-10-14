<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class CabinetController extends Controller {
    
    private $pageTpl = "/views/cabinet.php";
    
    public function __construct() {
        
        $this->model = new CabinetModel();
        $this->view = new View();
        
    }
    
    public function index() {
        
        if(!$_SESSION['user']) {
             header("Location: /portal");
        }
        
        $this->pageData['title'] = "Кабинет";
        
        # Для корректного отображения таблицы администратора
        $_SESSION['svod'] = ['1'];
        
        $this->view->render($this->pageTpl, $this->pageData);
        
    }
    
}