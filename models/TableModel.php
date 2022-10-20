<?php

class TableModel extends Model
{   
    public function back($svod, $quantity, $year) 
    {    
        if($_SESSION['id'] == '1'){                      
            if($quantity == '1'){             
                $sql = "SELECT id, volume1, sum1, volume2, sum2, volume3, "
                        . "sum3, volume4, sum4, volume5, sum5, volume6, "
                        . "sum6, volume7, sum7, total, `status`, full_name "
                        . "FROM `portal_ku` WHERE `year` = '$year' AND `mounth` = '$svod[0]'";
            }else{
                $list = implode(",",$svod);                              
                $sql = "SELECT id, SUM(volume1), SUM(sum1), SUM(volume2), "
                        . "SUM(sum2), SUM(volume3), SUM(sum3), SUM(volume4), "
                        . "SUM(sum4), SUM(volume5), SUM(sum5), SUM(volume6), "
                        . "SUM(sum6), SUM(volume7), SUM(sum7), SUM(total), "
                        . "`status`, full_name FROM `portal_ku` WHERE `year` = '$year' "
                        . "AND `mounth` IN($list) GROUP BY `full_name` order by `id` ASC";                
            }         
            $res = [];
            $stmt = $this->db->prepare($sql);
            $stmt->execute();           
            while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {                
                if($quantity >= '2'){                  
                    $row['status'] = 10;              
                    #Разделяем число на блоки
                    $block = [
                        'SUM(volume1)', 'SUM(sum1)', 'SUM(volume2)',
                        'SUM(sum2)', 'SUM(volume3)', 'SUM(sum3)',
                        'SUM(volume4)', 'SUM(sum4)', 'SUM(volume5)',
                        'SUM(sum5)', 'SUM(volume6)', 'SUM(sum6)',
                        'SUM(volume7)', 'SUM(sum7)', 'SUM(total)'
                        ];
                    for ($num = 0 ; $num <= 14 ; ++$num){                      
                        $row[$block[$num]] = number_format($row[$block[$num]], 2, ',', ' ');
                    }
               
                } else {                  
                    # Разделяем число на блоки
                    $block = [
                        'volume1', 'sum1', 'volume2', 
                        'sum2', 'volume3', 'sum3', 'volume4', 
                        'sum4', 'volume5', 'sum5', 'volume6', 
                        'sum6', 'volume7', 'sum7', 'total'
                        ];
                    for ($num = 0 ; $num <= 14 ; ++$num){                       
                        $row[$block[$num]] = number_format($row[$block[$num]], 2, ',', ' ');
                    }
                }
   
                $res[$row['id']] = $row;
               
            }
            return $res;

        } else {
        $name = $_SESSION['user'];
            
        $sql = "SELECT id, mounth, volume1, sum1, volume2, sum2, volume3, sum3, "
                . "volume4, sum4, volume5, sum5, volume6, sum6, volume7, sum7, "
                . "total, `status` FROM `portal_ku` WHERE name = '$name' AND `year` = '$year'";       
        $res = [];
        $stmt = $this->db->prepare($sql);
        $stmt->execute();          
        while($row = $stmt->fetch(PDO::FETCH_ASSOC)){               
            # Разделяем число на блоки
            $block = [
                'volume1', 'sum1', 'volume2', 
                'sum2', 'volume3', 'sum3', 'volume4', 
                'sum4', 'volume5', 'sum5', 'volume6', 
                'sum6', 'volume7', 'sum7', 'total'
                ];
            for ($num = 0 ; $num <= 14 ; ++$num){               
                if ($num == 0 || $num == 2 || $num == 4 || $num == 6 || $num == 8 || $num == 10 || $num == 12){
                    $row[$block[$num]] = number_format($row[$block[$num]], 3, ',', ' ');
                } else {
                    $row[$block[$num]] = number_format($row[$block[$num]], 2, ',', ' ');
                }
            }              
            $res[$row['id']] = $row;
        }                        
        return $res;                                 
        }       
    }
    
    public function year()
    {
        
    }
    
    public function update_status($id, $variant, $mounth, $year) 
    {       
        if($variant == 10){       
            $sql = "UPDATE portal_ku SET status = '3' WHERE id = '$id'";
            $stmt = $this->db->prepare($sql);
            $stmt->execute();
            
            $name = $_SESSION['user'];
            mail("portal@kostamail.ru", "Запрос на редактирование от '$name' за '$mounth'", "Request","FROM: portal@kostamail.ru \r\n");
            echo "Информация отправленна";
        }
            
        if($variant == 20){           
            $sql = "UPDATE portal_ku SET status = '2' WHERE id = '$id'";
            $stmt = $this->db->prepare($sql);
            $stmt->execute();          
        }
       
        if($variant == 30){           
            //Получаем тарифы
            $sql = "SELECT * FROM tariffs WHERE year = '$year' AND mounth = '$mounth'";       
            $tarifs = [];
            $stmt = $this->db->prepare($sql);
            $stmt->execute();
            while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $tarifs = $row;
            }
            
            //Получаем значения из таблицы коммуналка portal_ku
            $sql = "SELECT * FROM portal_ku WHERE id = '$id'";
            $values = [];
            $stmt = $this->db->prepare($sql);
            $stmt->execute();
            while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $values = $row;
            }
            
            //Выполняем проверку
            function examination($sum, $volume, $tarif_one, $tarif_two) 
            {
                if($sum == 0 && $volume == 0){                   
                    $tarif = "NO";
                } else {
                if($volume == 0){
                    $tarif = "";
                } else {
                    $tarif = $sum / $volume;
                    $tarif = number_format($tarif, 3, '.', ''); 
                }
                }
                
                if($tarif >= $tarif_one && $tarif <= $tarif_two || $tarif == "NO"){
                    $status = "YES";
                } else {
                    $status = "NO";
                }
                return $status;    
            }
            
            $status_teplo = examination($values['sum1'], $values['volume1'], $tarifs['heat_one'], $tarifs['heat_two']);
            $status_stok = examination($values['sum2'], $values['volume2'], $tarifs['drainage_one'], $tarifs['drainage_two']);
            $status_negative = examination($values['sum3'], $values['volume3'], $tarifs['negative_one'], $tarifs['negative_two']);
            $status_water = examination($values['sum4'], $values['volume4'], $tarifs['water_one'], $tarifs['water_two']);
            $status_electro = examination($values['sum5'], $values['volume5'], $tarifs['electro_one'], $tarifs['electro_two']);
            $status_trash = examination($values['sum6'], $values['volume6'], $tarifs['trash_one'], $tarifs['trash_two']);
            
            if($status_teplo == "YES" && $status_stok == "YES" && $status_negative == "YES" && $status_water == "YES" && $status_electro == "YES" && $status_trash == "YES"){
                $sql = "UPDATE portal_ku SET status = '1' WHERE id = '$id'";
                $stmt = $this->db->prepare($sql);
                $stmt->execute();
                
                echo "Информация отправлена в Финуправление";
            } else {
                echo "Обнаружена ошибка в расчете тарифа. Отправка в Финуправление невозможна!";
            }
        }        
    }
       
    public function update_info($id, $volume1, $sum1, $volume2, $sum2, $volume3, $sum3, $volume4, $sum4, $volume5, $sum5, $volume6, $sum6, $volume7, $sum7, $total) 
    {        
        $sql = "UPDATE portal_ku SET volume1 = :volume1, volume2 = :volume2, "
                . "volume3 = :volume3, volume4 = :volume4, volume5 = :volume5,"
                . " volume6 = :volume6, volume7 = :volume7, sum1 = :sum1,"
                . " sum2 = :sum2, sum3 = :sum3, sum4 = :sum4, sum5 = :sum5,"
                . " sum6 = :sum6, sum7 = :sum7, total = :total WHERE id = '$id'";       
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(":volume1", $volume1, PDO::PARAM_STR);
        $stmt->bindValue(":volume2", $volume2, PDO::PARAM_STR);
        $stmt->bindValue(":volume3", $volume3, PDO::PARAM_STR);
        $stmt->bindValue(":volume4", $volume4, PDO::PARAM_STR);
        $stmt->bindValue(":volume5", $volume5, PDO::PARAM_STR);
        $stmt->bindValue(":volume6", $volume6, PDO::PARAM_STR);
        $stmt->bindValue(":volume7", $volume7, PDO::PARAM_STR);
        $stmt->bindValue(":sum1", $sum1, PDO::PARAM_STR);
        $stmt->bindValue(":sum2", $sum2, PDO::PARAM_STR);
        $stmt->bindValue(":sum3", $sum3, PDO::PARAM_STR);
        $stmt->bindValue(":sum4", $sum4, PDO::PARAM_STR);
        $stmt->bindValue(":sum5", $sum5, PDO::PARAM_STR);
        $stmt->bindValue(":sum6", $sum6, PDO::PARAM_STR);
        $stmt->bindValue(":sum7", $sum7, PDO::PARAM_STR);
        $stmt->bindValue(":total", $total, PDO::PARAM_STR);
        $stmt->execute();                       
    }
          
    public function excel()
    {
        
    }
    
    public function total($svod, $quantity, $year)
    {       
        if($quantity == '1'){             
            $sql = "SELECT SUM(volume1), SUM(sum1), SUM(volume2), SUM(sum2), "
                    . "SUM(volume3), SUM(sum3), SUM(volume4), SUM(sum4), SUM(volume5), "
                    . "SUM(sum5), SUM(volume6), SUM(sum6), SUM(volume7), SUM(sum7), "
                    . "SUM(total) FROM `portal_ku` WHERE `year` = '$year' AND `mounth` = '$svod[0]'";
        }else{
            $list = implode(",",$svod);                                                       
            $sql = "SELECT SUM(volume1), SUM(sum1), SUM(volume2), SUM(sum2), SUM(volume3), "
                    . "SUM(sum3), SUM(volume4), SUM(sum4), SUM(volume5), SUM(sum5), SUM(volume6), "
                    . "SUM(sum6), SUM(volume7), SUM(sum7), SUM(total) FROM `portal_ku` WHERE `year` = '$year' AND `mounth` IN($list)";                
        }          
        $res = [];
        $stmt = $this->db->prepare($sql);
        $stmt->execute();           
        while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            # Разделяем число на блоки
            $block = [
                'SUM(volume1)', 'SUM(sum1)', 'SUM(volume2)', 
                'SUM(sum2)', 'SUM(volume3)', 'SUM(sum3)', 
                'SUM(volume4)', 'SUM(sum4)', 'SUM(volume5)', 
                'SUM(sum5)', 'SUM(volume6)', 'SUM(sum6)', 
                'SUM(volume7)', 'SUM(sum7)', 'SUM(total)'
                ];
            for ($num = 0 ; $num <= 14 ; ++$num){               
                $row[$block[$num]] = number_format($row[$block[$num]], 2, ',', ' ');
            }                           
            $res[$row['SUM(volume1)']] = $row;
               
        }        
        return $res;       
    }
    
    public function email($year, $svod)
    {       
        $quantity = count($svod);        
        if($quantity == '1'){                     
            $sql = "SELECT `t1`. id, mail FROM `users_ku` as `t1` INNER JOIN `portal_ku` as `t2` "
                    . "WHERE `t2`.`status` = '2' AND year = '$year' AND mounth = '$svod[0]' AND `t1`.`name` = `t2`.`name`";            
            $res = []; 
            $stmt = $this->db->prepare($sql);
            $stmt->execute();          
            while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
               $res[$row['id']] = $row;
            }
                              
            $email = [];
            foreach ($res as $key => $value) {
               $email[] = $value['mail'];
            }
          
            foreach ($email as $address){
               #echo "Вы отправили письмо на адрес $address";
               mail("$address", "Портал коммунальные услуги", "Вы не заполнили информацию на портале коммунальные услуги","FROM: portal@kostamail.ru \r\n");              
            }
            echo "Вы успешно отправили уведомления";
           
        } else {
            echo "Для рассылки писем, нужно выбрать только один месяц";
        }
        
    }
    
        public function total2($user, $year)
        {       
            $sql = "SELECT SUM(volume1), SUM(sum1), SUM(volume2), SUM(sum2), "
                    . "SUM(volume3), SUM(sum3), SUM(volume4), SUM(sum4), SUM(volume5), "
                    . "SUM(sum5), SUM(volume6), SUM(sum6), SUM(volume7), SUM(sum7), "
                    . "SUM(total) FROM `portal_ku` WHERE `year` = '$year' AND `name` = '$user'";                
            $res = [];
            $stmt = $this->db->prepare($sql);
            $stmt->execute();          
            while($row = $stmt->fetch(PDO::FETCH_ASSOC)){                
                # Разделяем число на блоки
                $block = [
                    'SUM(volume1)', 'SUM(sum1)', 'SUM(volume2)', 
                    'SUM(sum2)', 'SUM(volume3)', 'SUM(sum3)', 
                    'SUM(volume4)', 'SUM(sum4)', 'SUM(volume5)', 
                    'SUM(sum5)', 'SUM(volume6)', 'SUM(sum6)', 
                    'SUM(volume7)', 'SUM(sum7)', 'SUM(total)'
                    ];
                for ($num = 0 ; $num <= 14 ; ++$num) {
                    if($num == 0 || $num == 2 || $num == 4 || $num == 6 || $num == 8 || $num == 10 || $num == 12){
                        $row[$block[$num]] = number_format($row[$block[$num]], 3, ',', ' ');
                    } else {
                        $row[$block[$num]] = number_format($row[$block[$num]], 2, ',', ' ');
                    }
                    // $row[$block[$num]] = number_format($row[$block[$num]], 2, ',', ' ');
                }                             
                $res[$row['SUM(volume1)']] = $row;              
            }        
            return $res;        
        }
        
    public function tarif($year)
    {
        $sql = "SELECT * FROM tariffs WHERE year = '$year'";
        $res = [];
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $block = [
                   'heat_one', 'heat_two',
                   'drainage_one', 'drainage_two',
                   'negative_one', 'negative_two',
                   'water_one', 'water_two',
                   'electro_one', 'electro_two',
                   'trash_one', 'trash_two'
                   ];
            for ($num = 0 ; $num <= 11 ; ++$num){
                $row[$block[$num]] = number_format($row[$block[$num]], 3, ',', ' ');
            } 
            $res[$row['id']] = $row;
        }
        
        return $res;
    }
}