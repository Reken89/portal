<?php

class TableController extends Controller 
{
    private $pageTpl = "/views/table.php";
    private $pageTpl_back = "/views/table_back.php";
    private $pageExcel = "/views/excel.php";
    private $test;

    public function __construct() 
    {       
        $this->model = new TableModel();
        $this->view = new View();
    }

    public function index() 
    {
        if (!$_SESSION['user']){
            header("Location: /portal");
        }
        
        $this->pageData['title'] = "Таблица";
        $this->view->render($this->pageTpl, $this->pageData);
    }

    public function back() 
    {
        if (!$_SESSION['user']) {
            header("Location: /portal");
        }

        $year = $_SESSION['year'];
        if (!empty($_POST['svod'])){               
            $svod = $_POST['svod'];
            $_SESSION['svod'] = $svod;
            $quantity = count($svod);                             
        } else {
            #$svod = ['1'];
            $svod = $_SESSION['svod'];
            $quantity = count($svod);
        }

        $a = $this->model->back($svod, $quantity, $year);
        $this->pageData['info'] = $a;

        $_SESSION['for_excel'] = $a;

        $b = $this->model->total($svod, $quantity, $year);
        $this->pageData['total'] = $b;

        $_SESSION['for_excel'] = $a;
        $_SESSION['for_excel_total'] = $b;

        $user = $_SESSION['user'];
        $this->pageData['total2'] = $this->model->total2($user, $year);
        
        $this->view->render($this->pageTpl_back, $this->pageData);
    }

    public function year() 
    {
        if (!$_SESSION['user']) {
            header("Location: /portal");
        }

        $_SESSION['year'] = $_POST['year'];

        $this->view->render($this->pageTpl, $this->pageData);
    }

    public function update_status()
    {
        if (!$_SESSION['user']) {
            header("Location: /portal");
        }

        $variant = $_POST['variant'];
        $id = $_POST['id'];
        $mounth = $_POST['mounth'];
        $year = $_SESSION['year'];

        $this->model->update_status($id, $variant, $mounth, $year);
        //echo "Информация отправленна";
    }

    public function update_info() 
    {
        if (!$_SESSION['user']) {
            header("Location: /portal");
        }

        $id = $_POST['id'];

        $volume1 = $_POST["volume1"];
        $volume1 = str_replace(" ", "", $volume1);
        $volume1 = str_replace(",", ".", $volume1);

        $volume2 = $_POST["volume2"];
        $volume2 = str_replace(" ", "", $volume2);
        $volume2 = str_replace(",", ".", $volume2);

        $volume3 = $_POST["volume3"];
        $volume3 = str_replace(" ", "", $volume3);
        $volume3 = str_replace(",", ".", $volume3);

        $volume4 = $_POST["volume4"];
        $volume4 = str_replace(" ", "", $volume4);
        $volume4 = str_replace(",", ".", $volume4);

        $volume5 = $_POST["volume5"];
        $volume5 = str_replace(" ", "", $volume5);
        $volume5 = str_replace(",", ".", $volume5);

        $volume6 = $_POST["volume6"];
        $volume6 = str_replace(" ", "", $volume6);
        $volume6 = str_replace(",", ".", $volume6);

        $volume7 = $_POST["volume7"];
        $volume7 = str_replace(" ", "", $volume7);
        $volume7 = str_replace(",", ".", $volume7);

        $sum1 = $_POST["sum1"];
        $sum2 = $_POST["sum2"];
        $sum3 = $_POST["sum3"];
        $sum4 = $_POST["sum4"];
        $sum5 = $_POST["sum5"];
        $sum6 = $_POST["sum6"];
        $sum7 = $_POST["sum7"];

        $sum1 = str_replace(" ", "", $sum1);
        $sum1 = str_replace(",", ".", $sum1);

        $sum2 = str_replace(" ", "", $sum2);
        $sum2 = str_replace(",", ".", $sum2);

        $sum3 = str_replace(" ", "", $sum3);
        $sum3 = str_replace(",", ".", $sum3);

        $sum4 = str_replace(" ", "", $sum4);
        $sum4 = str_replace(",", ".", $sum4);

        $sum5 = str_replace(" ", "", $sum5);
        $sum5 = str_replace(",", ".", $sum5);

        $sum6 = str_replace(" ", "", $sum6);
        $sum6 = str_replace(",", ".", $sum6);

        $sum7 = str_replace(" ", "", $sum7);
        $sum7 = str_replace(",", ".", $sum7);
        
        $total = $sum1 + $sum2 + $sum3 + $sum4 + $sum5 + $sum6 + $sum7;
        $total = str_replace(" ", "", $total);
        $total = str_replace(",", ".", $total);

        $this->model->update_info($id, $volume1, $sum1, $volume2, $sum2, $volume3, $sum3, $volume4, $sum4, $volume5, $sum5, $volume6, $sum6, $volume7, $sum7, $total);
        echo "Данные обновлены";
    }

    public function excel() 
    {
        if (!$_SESSION['user']) {
            header("Location: /portal");
        }

        $this->view->render($this->pageExcel, $this->pageData);
    }
   
    public function email() 
    {        
        if (!$_SESSION['user']) {
            header("Location: /portal");
        }
        
        $year = $_SESSION['year'];
        $svod = $_SESSION['svod'];
        
        $this->model->email($year, $svod);              
    } 
}
