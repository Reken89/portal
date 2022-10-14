<?php


/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


?>

           <head>
             <meta charset="utf-8">
              <title>Личный кабинет</title>
              </head>
              <body>

              <style>
               body { background: url(images/bg.png); }
              </style>

            <link rel="stylesheet" href="css/styles.css">


            <p style="background: #C0C0C0; border:3px #808080  ridge; width: 250px; padding: 10px 0 10px 15px;  margin:20px; float: right;" ><strong>Личный кабинет:</strong><br />Учреждение: <u><?php echo $_SESSION['user']; ?></u></p>

            <p style="background: #C0C0C0; border:3px #808080  ridge; width: 300px; padding: 10px 0 10px 15px;  margin:20px;" ><strong>Главная страница портала</strong></p>


                    <form action="/portal/table/year" method="post">
            <input type='hidden' name='year' value='2018'>
        <input type='hidden' name='info' value='2'>
            <button type="submit" style="width:400px;height:25px" class="btn">Коммунальные услуги за 2018 год</button>
            </form>
              
                    <form action="/portal/table/year" method="post">
            <input type='hidden' name='year' value='2019'>
        <input type='hidden' name='info' value='2'>
            <button type="submit" style="width:400px;height:25px" class="btn">Коммунальные услуги за 2019 год</button>
            </form>
        
            <form action="/portal/table/year" method="post">
            <input type='hidden' name='year' value='2020'>
        <input type='hidden' name='info' value='2'>
            <button type="submit" style="width:400px;height:25px" class="btn">Коммунальные услуги за 2020 год</button>
            </form>
        
            <form action="/portal/table/year" method="post">
            <input type='hidden' name='year' value='2021'>
        <input type='hidden' name='info' value='2'>
            <button type="submit" style="width:400px;height:25px" class="btn">Коммунальные услуги за 2021 год</button>
            </form>

            <form action="/portal/table/year" method="post">
            <input type='hidden' name='year' value='2022'>
        <input type='hidden' name='info' value='2'>
            <button type="submit" style="width:400px;height:25px" class="btn">Коммунальные услуги за 2022 год</button>
            </form>


