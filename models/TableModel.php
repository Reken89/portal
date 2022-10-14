<?php



class TableModel extends Model {
    
    public function back($svod, $quantity, $year) {
        
        if($_SESSION['id'] == '1'){
            
          if($quantity == '1'){
              
                    $sql = "SELECT id, volume1, sum1, volume2, sum2, volume3, sum3, volume4, sum4, volume5, sum5, volume6, sum6, volume7, sum7, total, `status`, full_name FROM `portal_ku` WHERE `year` = '$year' AND `mounth` = '$svod[0]'";
          }else{
                    $list = implode(",",$svod);
             
                   
              $sql = "SELECT id, SUM(volume1), SUM(sum1), SUM(volume2), SUM(sum2), SUM(volume3), SUM(sum3), SUM(volume4), SUM(sum4), SUM(volume5), SUM(sum5), SUM(volume6), SUM(sum6), SUM(volume7), SUM(sum7), SUM(total), `status`, full_name FROM `portal_ku` WHERE `year` = '$year' AND `mounth` IN($list) GROUP BY `full_name` order by `id` ASC";
                 
          }
          
                   $res = [];
                   $stmt = $this->db->prepare($sql);
                   $stmt->execute();
           
           while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

               if($quantity >= '2'){
               $row['status'] = 10;
               
               # Разделяем число на блоки
               $block = ['SUM(volume1)', 'SUM(sum1)', 'SUM(volume2)', 'SUM(sum2)', 'SUM(volume3)', 'SUM(sum3)', 'SUM(volume4)', 'SUM(sum4)', 'SUM(volume5)', 'SUM(sum5)', 'SUM(volume6)', 'SUM(sum6)', 'SUM(volume7)', 'SUM(sum7)', 'SUM(total)'];
               for ($num = 0 ; $num <= 14 ; ++$num) {
               $row[$block[$num]] = number_format($row[$block[$num]], 2, ',', ' ');
               }
               
               } else {
                   
                   # Разделяем число на блоки
                   $block = ['volume1', 'sum1', 'volume2', 'sum2', 'volume3', 'sum3', 'volume4', 'sum4', 'volume5', 'sum5', 'volume6', 'sum6', 'volume7', 'sum7', 'total'];
                   for ($num = 0 ; $num <= 14 ; ++$num) {
                   $row[$block[$num]] = number_format($row[$block[$num]], 2, ',', ' ');
                   }
               }
   
               $res[$row['id']] = $row;
               
           }


           return $res;

        } else {

                        $name = $_SESSION['user'];
            
           $sql = "SELECT id, mounth, volume1, sum1, volume2, sum2, volume3, sum3, volume4, sum4, volume5, sum5, volume6, sum6, volume7, sum7, total, `status` FROM `portal_ku` WHERE name = '$name' AND `year` = '$year'";
        
           $res = [];
           $stmt = $this->db->prepare($sql);
           $stmt->execute();
           
           while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
               
                   # Разделяем число на блоки
                   $block = ['volume1', 'sum1', 'volume2', 'sum2', 'volume3', 'sum3', 'volume4', 'sum4', 'volume5', 'sum5', 'volume6', 'sum6', 'volume7', 'sum7', 'total'];
                   for ($num = 0 ; $num <= 14 ; ++$num) {
                   $row[$block[$num]] = number_format($row[$block[$num]], 2, ',', ' ');
                   }
               
               $res[$row['id']] = $row;
           }
               
           
return $res;
            
            
            
        }
        
    }
    
    public function year() {
        
    }
    
    public function update_status($id, $variant, $mounth) {
        
        if($variant == 10){
        
            $sql = "UPDATE portal_ku SET status = '3' WHERE id = '$id'";
            $stmt = $this->db->prepare($sql);
            $stmt->execute();
            
            $name = $_SESSION['user'];
            mail("portal@kostamail.ru", "Запрос на редактирование от '$name' за '$mounth'", "Request","FROM: portal@kostamail.ru \r\n");
            
        }
            
       if($variant == 20){
           
            $sql = "UPDATE portal_ku SET status = '2' WHERE id = '$id'";
            $stmt = $this->db->prepare($sql);
            $stmt->execute();
           
       }
       
              if($variant == 30){
           
            $sql = "UPDATE portal_ku SET status = '1' WHERE id = '$id'";
            $stmt = $this->db->prepare($sql);
            $stmt->execute();
           
       }
        
    }
    
    
    public function update_info($id, $volume1, $sum1, $volume2, $sum2, $volume3, $sum3, $volume4, $sum4, $volume5, $sum5, $volume6, $sum6, $volume7, $sum7, $total) {
        
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
    
    
    
    public function excel(){
        
    }
    
    public function total($svod, $quantity, $year){
        
                  if($quantity == '1'){
              
                    $sql = "SELECT SUM(volume1), SUM(sum1), SUM(volume2), SUM(sum2), SUM(volume3), SUM(sum3), SUM(volume4), SUM(sum4), SUM(volume5), SUM(sum5), SUM(volume6), SUM(sum6), SUM(volume7), SUM(sum7), SUM(total) FROM `portal_ku` WHERE `year` = '$year' AND `mounth` = '$svod[0]'";
          }else{
                    $list = implode(",",$svod);
                   
                    
                   
              $sql = "SELECT SUM(volume1), SUM(sum1), SUM(volume2), SUM(sum2), SUM(volume3), SUM(sum3), SUM(volume4), SUM(sum4), SUM(volume5), SUM(sum5), SUM(volume6), SUM(sum6), SUM(volume7), SUM(sum7), SUM(total) FROM `portal_ku` WHERE `year` = '$year' AND `mounth` IN($list)";
                 
          }
          
                             $res = [];
           $stmt = $this->db->prepare($sql);
           $stmt->execute();
           
           while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

               # Разделяем число на блоки
               $block = ['SUM(volume1)', 'SUM(sum1)', 'SUM(volume2)', 'SUM(sum2)', 'SUM(volume3)', 'SUM(sum3)', 'SUM(volume4)', 'SUM(sum4)', 'SUM(volume5)', 'SUM(sum5)', 'SUM(volume6)', 'SUM(sum6)', 'SUM(volume7)', 'SUM(sum7)', 'SUM(total)'];
               for ($num = 0 ; $num <= 14 ; ++$num) {
               $row[$block[$num]] = number_format($row[$block[$num]], 2, ',', ' ');
               }
               
               
               $res[$row['SUM(volume1)']] = $row;
               
           }
        

           return $res;
        
    }
    
    public function email($year, $svod){
        
        $quantity = count($svod);
        
        if($quantity == '1'){
            
            $sql = "SELECT `t1`. id, mail FROM `users_ku` as `t1` INNER JOIN `portal_ku` as `t2` WHERE `t2`.`status` = '2' AND year = '$year' AND mounth = '$svod[0]' AND `t1`.`name` = `t2`.`name`";
            
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
    
        public function total2($user, $year){
        
        $sql = "SELECT SUM(volume1), SUM(sum1), SUM(volume2), SUM(sum2), SUM(volume3), SUM(sum3), SUM(volume4), SUM(sum4), SUM(volume5), SUM(sum5), SUM(volume6), SUM(sum6), SUM(volume7), SUM(sum7), SUM(total) FROM `portal_ku` WHERE `year` = '$year' AND `name` = '$user'";
                 
                                     $res = [];
           $stmt = $this->db->prepare($sql);
           $stmt->execute();
           
           while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

               # Разделяем число на блоки
               $block = ['SUM(volume1)', 'SUM(sum1)', 'SUM(volume2)', 'SUM(sum2)', 'SUM(volume3)', 'SUM(sum3)', 'SUM(volume4)', 'SUM(sum4)', 'SUM(volume5)', 'SUM(sum5)', 'SUM(volume6)', 'SUM(sum6)', 'SUM(volume7)', 'SUM(sum7)', 'SUM(total)'];
               for ($num = 0 ; $num <= 14 ; ++$num) {
               $row[$block[$num]] = number_format($row[$block[$num]], 2, ',', ' ');
               }
               
               
               $res[$row['SUM(volume1)']] = $row;
               
           }
        
           return $res;
        
    }

}