<head>
    <meta charset="utf-8">
    <title>Таблица</title>
</head>
<style>
    body { background: url(../images/bg.png); }
 </style>
<link rel="stylesheet" href="../css/table2.css">
<style>
    #user {
    width: 80px; /* Ширина заполняемого поля */
     } 
 </style>

<?php

if($_SESSION['id'] !== '1'){
    $mounth = [
        '0', 'январь', 'февраль', 
        'март', 'апрель', 'май', 
        'июнь', 'июль', 'август', 
        'сентябрь', 'октябрь', 
        'ноябрь', 'декабрь'
        ];
?>

<table class="freeze-table" width="700px">
    <thead>
        <tr>
            <th style="min-width: 100px; width: 100px;" rowspan="2">Месяц</th>
            <th style="min-width: 200px; width: 200px;" colspan="2">Теплоснабжение</th>
            <th style="min-width: 200px; width: 200px;" colspan="2">Водоотведение</th>
            <th style="min-width: 200px; width: 200px;" colspan="2">Негативка</th>
            <th style="min-width: 200px; width: 200px;" colspan="2">Водоснабжение</th>
            <th style="min-width: 200px; width: 200px;" colspan="2">Электроснабжение</th>
            <th style="min-width: 200px; width: 200px;" colspan="2">Вывоз мусора</th>
            <th style="min-width: 200px; width: 200px;" colspan="2">Утилизация ТБО</th>
            <th style="min-width: 200px; width: 200px;" rowspan="2">ИТОГ</th>
            <th style="min-width: 100px; width: 100px;" rowspan="2"></th>
        </tr>
    </thead>
    
    <tbody>
        <tr>
            <td></td>
            <td>Объем</td><td>Сумма</td>
            <td>Объем</td><td>Сумма</td>
            <td>Объем</td><td>Сумма</td>
            <td>Объем</td><td>Сумма</td>
            <td>Объем</td><td>Сумма</td>
            <td>Объем</td><td>Сумма</td>
            <td>Объем</td><td>Сумма</td>
            <td></td>
            <td></td>
        </tr>
        
<?php 
foreach ($pageData['info'] as $key => $value) {
    if ($value['status'] == 1) {               
        echo "<tr>";
        echo "<input type=hidden class='id' value=" . $value['id'] . ">";
        echo "<input type=hidden class='mounth' value=" . $mounth[$value['mounth']] . ">";
        echo "<input type=hidden class='variant' value='10'>";
        echo "<td>" . $mounth[$value['mounth']] . "</td>";
        echo "<td>" . $value['volume1'] . "</td>";
        echo "<td>" . $value['sum1'] . "</td>";
        echo "<td>" . $value['volume2'] . "</td>";
        echo "<td>" . $value['sum2'] . "</td>";
        echo "<td>" . $value['volume3'] . "</td>";
        echo "<td>" . $value['sum3'] . "</td>";
        echo "<td>" . $value['volume4'] . "</td>";
        echo "<td>" . $value['sum4'] . "</td>";
        echo "<td>" . $value['volume5'] . "</td>";
        echo "<td>" . $value['sum5'] . "</td>";
        echo "<td>" . $value['volume6'] . "</td>";
        echo "<td>" . $value['sum6'] . "</td>";
        echo "<td>" . $value['volume7'] . "</td>";
        echo "<td>" . $value['sum7'] . "</td>";
        echo "<td>" . $value['total'] . "</td>";
        echo "<td><input type=button id='btn_1' value='Изменить'></td>";
        echo "</tr>";               
    }
    
    if ($value['status'] == 2) {
        echo "<tr>";
        echo "<input type=hidden class='id' value=" . $value['id'] . ">";
        echo "<input type=hidden class='mounth' value=" . $value['mounth'] . ">";
        echo "<td>" . $mounth[$value['mounth']] . "</td>";
        echo <<<HTML
            <td><input type=text id='user' class='volume1' value="$value[volume1]"></td>
            <td><input type=text id='user' class='sum1' value="$value[sum1]"></td>
            <td><input type=text id='user' class='volume2' value="$value[volume2]"></td>
            <td><input type=text id='user' class='sum2' value="$value[sum2]"></td> 
            <td><input type=text id='user' class='volume3' value="$value[volume3]"></td> 
            <td><input type=text id='user' class='sum3' value="$value[sum3]"></td> 
            <td><input type=text id='user' class='volume4' value="$value[volume4]"></td>   
            <td><input type=text id='user' class='sum4' value="$value[sum4]"></td>    
            <td><input type=text id='user' class='volume5' value="$value[volume5]"></td> 
            <td><input type=text id='user' class='sum5' value="$value[sum5]"></td>  
            <td><input type=text id='user' class='volume6' value="$value[volume6]"></td>    
            <td><input type=text id='user' class='sum6' value="$value[sum6]"></td> 
            <td><input type=text id='user' class='volume7' value="$value[volume7]"></td>
            <td><input type=text id='user' class='sum7' value="$value[sum7]"></td>     
        HTML;
        echo "<td>" . $value['total'] . "</td>";
        echo "<td><input type=button id='btn_2' value='Отправить'></td>";
        echo "</tr>";                                                 
    }
    
    if ($value['status'] == 3) {
        echo "<tr>";
        echo "<td>" . $mounth[$value['mounth']] . "</td>";
        echo "<td>" . $value['volume1'] . "</td>";
        echo "<td>" . $value['sum1'] . "</td>";
        echo "<td>" . $value['volume2'] . "</td>";
        echo "<td>" . $value['sum2'] . "</td>";
        echo "<td>" . $value['volume3'] . "</td>";
        echo "<td>" . $value['sum3'] . "</td>";
        echo "<td>" . $value['volume4'] . "</td>";
        echo "<td>" . $value['sum4'] . "</td>";
        echo "<td>" . $value['volume5'] . "</td>";
        echo "<td>" . $value['sum5'] . "</td>";
        echo "<td>" . $value['volume6'] . "</td>";
        echo "<td>" . $value['sum6'] . "</td>";
        echo "<td>" . $value['volume7'] . "</td>";
        echo "<td>" . $value['sum7'] . "</td>";
        echo "<td>" . $value['total'] . "</td>";
        echo "<td></td>";
        echo "</tr>";                               
    }                 
}
        
foreach ($pageData['total2'] as $key => $total_v) {
    echo "<tr>";
    echo "<td>ИТОГ</td>";
    echo "<td>" . $total_v['SUM(volume1)'] . "</td>";
    echo "<td>" . $total_v['SUM(sum1)'] . "</td>";
    echo "<td>" . $total_v['SUM(volume2)'] . "</td>";
    echo "<td>" . $total_v['SUM(sum2)'] . "</td>";
    echo "<td>" . $total_v['SUM(volume3)'] . "</td>";
    echo "<td>" . $total_v['SUM(sum3)'] . "</td>";
    echo "<td>" . $total_v['SUM(volume4)'] . "</td>";
    echo "<td>" . $total_v['SUM(sum4)'] . "</td>";
    echo "<td>" . $total_v['SUM(volume5)'] . "</td>";
    echo "<td>" . $total_v['SUM(sum5)'] . "</td>";
    echo "<td>" . $total_v['SUM(volume6)'] . "</td>";
    echo "<td>" . $total_v['SUM(sum6)'] . "</td>";
    echo "<td>" . $total_v['SUM(volume7)'] . "</td>";
    echo "<td>" . $total_v['SUM(sum7)'] . "</td>";
    echo "<td>" . $total_v['SUM(total)'] . "</td>";
    echo "<td></td>";       
}
    echo "</tbody>";
    echo "</table>";
        
    ?>    
   
    </br>    
    <div class="div">
        <p>Таблица с тарифами</p>
        <p>Тарифы содержат значения "От" и "До"</p>
        <p>Значение при делении суммы на объем, должно соответствовать диапазону тарифа</p>
    </div> 
 
    </br>
    <table class="freeze-table" width="700px">
    <thead>
        <tr>
            <th style="min-width: 100px; width: 100px;" rowspan="2">Месяц</th>
            <th style="min-width: 200px; width: 200px;" colspan="2">Теплоснабжение</th>
            <th style="min-width: 200px; width: 200px;" colspan="2">Водоотведение</th>
            <th style="min-width: 200px; width: 200px;" colspan="2">Негативка</th>
            <th style="min-width: 200px; width: 200px;" colspan="2">Водоснабжение</th>
            <th style="min-width: 200px; width: 200px;" colspan="2">Электроснабжение</th>
            <th style="min-width: 200px; width: 200px;" colspan="2">Вывоз мусора</th>
        </tr>
    </thead>
    
    <tbody>
        <tr>
            <td></td>
            <td>От</td><td>До</td>
            <td>От</td><td>До</td>
            <td>От</td><td>До</td>
            <td>От</td><td>До</td>
            <td>От</td><td>До</td>
            <td>От</td><td>До</td>
        </tr>
        
    <?php
    foreach ($pageData['tarif'] as $key => $tarif) {
        echo "<tr>";
        echo "<td>" . $mounth[$tarif['mounth']] . "</td>";
        echo "<td>" . $tarif['heat_one'] . "</td>";
        echo "<td>" . $tarif['heat_two'] . "</td>";
        echo "<td>" . $tarif['drainage_one'] . "</td>";
        echo "<td>" . $tarif['drainage_two'] . "</td>";
        echo "<td>" . $tarif['negative_one'] . "</td>";
        echo "<td>" . $tarif['negative_two'] . "</td>";
        echo "<td>" . $tarif['water_one'] . "</td>";
        echo "<td>" . $tarif['water_two'] . "</td>";
        echo "<td>" . $tarif['electro_one'] . "</td>";
        echo "<td>" . $tarif['electro_two'] . "</td>";
        echo "<td>" . $tarif['trash_one'] . "</td>";
        echo "<td>" . $tarif['trash_two'] . "</td>";
        echo "</tr>";
    }

    ?>
    </tbody>  
    </table>
    
    <?php    
    
} 
else{   
?>
     
<form id="my-form" method="post">
    <label class="container">| Январь
        <input type="checkbox" name="svod[]" value="1">
        <span class="checkmark"></span>
    </label>
    <label class="container">| Февраль
        <input type="checkbox" name="svod[]" value="2">
        <span class="checkmark"></span>
    </label>
    <label class="container">| Март
        <input type="checkbox" name="svod[]" value="3">
        <span class="checkmark"></span>
    </label>
    <label class="container">| Апрель
        <input type="checkbox" name="svod[]" value="4">
        <span class="checkmark"></span>
    </label>
    <label class="container">| Май
        <input type="checkbox" name="svod[]" value="5">
        <span class="checkmark"></span>
    </label>
    <label class="container">| Июнь
        <input type="checkbox" name="svod[]" value="6">
        <span class="checkmark"></span>
    </label>
    <label class="container">| Июль
        <input type="checkbox" name="svod[]" value="7">
        <span class="checkmark"></span>
    </label>
    <label class="container">| Август
        <input type="checkbox" name="svod[]" value="8">
        <span class="checkmark"></span>
    </label>
    <label class="container">| Сентябрь
        <input type="checkbox" name="svod[]" value="9">
        <span class="checkmark"></span>
    </label>
    <label class="container">| Октябрь
        <input type="checkbox" name="svod[]" value="10">
        <span class="checkmark"></span>
    </label>
    <label class="container">| Ноябрь
        <input type="checkbox" name="svod[]" value="11">
        <span class="checkmark"></span>
    </label>
    <label class="container">| Декабрь
        <input type="checkbox" name="svod[]" value="12">
        <span class="checkmark"></span>
    </label>
    <p><input type="button" name="formSubmit" id="btn3" class="btn" value="Таблица"></p>
</form> 
        
<form method="post">
    <input type="button" id="email" value="EMAIL">
</form>
        
<form action="/portal/table/excel" method="post">
    <input type='hidden' name='info' value='2'>
    <button type="submit" class="btn">EXCEL</button>
    </form>
        
<?php
$moun = [
    '0', 'январь', 'февраль', 
    'март', 'апрель', 'май', 
    'июнь', 'июль', 'август', 
    'сентябрь', 'октябрь', 
    'ноябрь', 'декабрь'
];
        
$mounth = count($_SESSION['svod']); 
        
if ($mounth == '1'){
    $m = $_SESSION['svod'];
    $m = $m[0];
    echo "месяц: $moun[$m]";
} 
else {
    echo "месяца:";
    for ($R = 0 ; $R < $mounth ; ++$R){
        $m = $_SESSION['svod']; 
        $m = $m[$R];
        echo "$moun[$m],"; 
    }
}              
?>
               
<table class='table_budget'>
    <tr><td rowspan="2">Учреждение</td><td rowspan="2">Статус</td><td colspan="2">Теплоснабжение</td><td colspan="2">Водоотведение</td><td colspan="2">Негативка</td><td colspan="2">Водоснабжение</td><td colspan="2">Электроснабжение</td><td colspan="2">Вывоз мусора</td><td colspan="2">Утилизация ТБО</td><td  rowspan="2">ИТОГ_(руб.)</td></tr>
    <tr><td><pre>Объем   </pre></td><td><pre>Сумма (руб.)</pre></td><td><pre>Объем   </pre></td><td><pre>Сумма (руб.)</pre></td><td><pre>Объем   </pre></td><td><pre>Сумма (руб.)</pre></td><td><pre>Объем   </pre></td><td><pre>Сумма (руб.)</pre></td><td><pre>Объем   </pre></td><td><pre>Сумма (руб.)</pre></td><td><pre>Объем   </pre></td><td><pre>Сумма (руб.)</pre></td><td><pre>Объем   </pre></td><td><pre>Сумма (руб.)</pre></td></tr>
    
<?php    
foreach ($pageData['info'] as $key => $value) {                    
    if ($value['status'] == 1) {            
        echo "<tr>";
        echo "<input type=hidden class='id' value=" . $value['id'] . ">";
        echo "<td bgcolor='#2E8B57'>" . $value['full_name'] . "</td>";
        echo "<td></td>";
        echo "<td>" . $value['volume1'] . "</td>";
        echo "<td>" . $value['sum1'] . "</td>";
        echo "<td>" . $value['volume2'] . "</td>";
        echo "<td>" . $value['sum2'] . "</td>";
        echo "<td>" . $value['volume3'] . "</td>";
        echo "<td>" . $value['sum3'] . "</td>";
        echo "<td>" . $value['volume4'] . "</td>";
        echo "<td>" . $value['sum4'] . "</td>";
        echo "<td>" . $value['volume5'] . "</td>";
        echo "<td>" . $value['sum5'] . "</td>";
        echo "<td>" . $value['volume6'] . "</td>";
        echo "<td>" . $value['sum6'] . "</td>";
        echo "<td>" . $value['volume7'] . "</td>";
        echo "<td>" . $value['sum7'] . "</td>";
        echo "<td>" . $value['total'] . "</td>";                                           
    }
        
    if ($value['status'] == 2){           
        echo "<tr>";
        echo "<input type=hidden class='id' value=" . $value['id'] . ">";
        echo "<td bgcolor='#B22222'>" . $value['full_name'] . "</td>";
        echo "<td></td>";
        echo "<td>" . $value['volume1'] . "</td>";
        echo "<td>" . $value['sum1'] . "</td>";
        echo "<td>" . $value['volume2'] . "</td>";
        echo "<td>" . $value['sum2'] . "</td>";
        echo "<td>" . $value['volume3'] . "</td>";
        echo "<td>" . $value['sum3'] . "</td>";
        echo "<td>" . $value['volume4'] . "</td>";
        echo "<td>" . $value['sum4'] . "</td>";
        echo "<td>" . $value['volume5'] . "</td>";
        echo "<td>" . $value['sum5'] . "</td>";
        echo "<td>" . $value['volume6'] . "</td>";
        echo "<td>" . $value['sum6'] . "</td>";
        echo "<td>" . $value['volume7'] . "</td>";
        echo "<td>" . $value['sum7'] . "</td>";
        echo "<td>" . $value['total'] . "</td>";            
    }
               
    if ($value['status'] == 3){           
        echo "<tr>";
        echo "<input type=hidden class='id' value=" . $value['id'] . ">";
        echo "<input type=hidden class='variant' value='20'>";
        echo "<td bgcolor='#FF8C00'>" . $value['full_name'] . "</td>";
        echo "<td><input type=button id='btn_4' value='Доработка'></td>";
        echo "<td>" . $value['volume1'] . "</td>";
        echo "<td>" . $value['sum1'] . "</td>";
        echo "<td>" . $value['volume2'] . "</td>";
        echo "<td>" . $value['sum2'] . "</td>";
        echo "<td>" . $value['volume3'] . "</td>";
        echo "<td>" . $value['sum3'] . "</td>";
        echo "<td>" . $value['volume4'] . "</td>";
        echo "<td>" . $value['sum4'] . "</td>";
        echo "<td>" . $value['volume5'] . "</td>";
        echo "<td>" . $value['sum5'] . "</td>";
        echo "<td>" . $value['volume6'] . "</td>";
        echo "<td>" . $value['sum6'] . "</td>";
        echo "<td>" . $value['volume7'] . "</td>";
        echo "<td>" . $value['sum7'] . "</td>";
        echo "<td>" . $value['total'] . "</td>";            
    }
              
    if ($value['status'] == 10){            
        echo "<tr>";
        echo "<td>" . $value['full_name'] . "</td>";
        echo "<td></td>";
        echo "<td>" . $value['SUM(volume1)'] . "</td>";
        echo "<td>" . $value['SUM(sum1)'] . "</td>";
        echo "<td>" . $value['SUM(volume2)'] . "</td>";
        echo "<td>" . $value['SUM(sum2)'] . "</td>";
        echo "<td>" . $value['SUM(volume3)'] . "</td>";
        echo "<td>" . $value['SUM(sum3)'] . "</td>";
        echo "<td>" . $value['SUM(volume4)'] . "</td>";
        echo "<td>" . $value['SUM(sum4)'] . "</td>";
        echo "<td>" . $value['SUM(volume5)'] . "</td>";
        echo "<td>" . $value['SUM(sum5)'] . "</td>";
        echo "<td>" . $value['SUM(volume6)'] . "</td>";
        echo "<td>" . $value['SUM(sum6)'] . "</td>";
        echo "<td>" . $value['SUM(volume7)'] . "</td>";
        echo "<td>" . $value['SUM(sum7)'] . "</td>";
        echo "<td>" . $value['SUM(total)'] . "</td>";           
    }                                       
}
    
foreach ($pageData['total'] as $key => $total_v){
    echo "<tr>";
    echo "<td>ИТОГ</td>";
    echo "<td></td>";
    echo "<td>" . $total_v['SUM(volume1)'] . "</td>";
    echo "<td>" . $total_v['SUM(sum1)'] . "</td>";
    echo "<td>" . $total_v['SUM(volume2)'] . "</td>";
    echo "<td>" . $total_v['SUM(sum2)'] . "</td>";
    echo "<td>" . $total_v['SUM(volume3)'] . "</td>";
    echo "<td>" . $total_v['SUM(sum3)'] . "</td>";
    echo "<td>" . $total_v['SUM(volume4)'] . "</td>";
    echo "<td>" . $total_v['SUM(sum4)'] . "</td>";
    echo "<td>" . $total_v['SUM(volume5)'] . "</td>";
    echo "<td>" . $total_v['SUM(sum5)'] . "</td>";
    echo "<td>" . $total_v['SUM(volume6)'] . "</td>";
    echo "<td>" . $total_v['SUM(sum6)'] . "</td>";
    echo "<td>" . $total_v['SUM(volume7)'] . "</td>";
    echo "<td>" . $total_v['SUM(sum7)'] . "</td>";
    echo "<td>" . $total_v['SUM(total)'] . "</td>";        
}
    echo "</table>";          
}


