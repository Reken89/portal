<head>
    <title>ОФС</title>
    <link rel="stylesheet" href="{{ asset('assets/plugins/table/table2.css') }}">
</head>

<div class="container_fix4">
    <div id="content"></div>  
</div>

@include('layouts.version')
<script>
    $(document).ready(function(){ 
        //Выполняем запись в БД при нажатии на клавишу ENTER
        function setKeydownmyForm() {
            $('.sum-editable').keydown(function(e) {
                if (e.keyCode === 13) {
                    e.preventDefault();
                    let el = $(this);
                    let td = el.closest('td');
                    let tr = el.closest('tr');
                    let id = tr.data('id');
                    let ekr_id = tr.data('ekr');
                    let number = tr.data('number');
                    let mounth = tr.data('mounth');
                    let chapter = tr.data('chapter');
                    let user_id = tr.data('user');

                    //Получаем значения, меняем запятую на точку и убираем пробелы в числе                   
                    function structure(title){
                        var volume = $(title, tr).text();
                        //Меняем запятую на точку
                        //Убираем лишние пробелы
                        //Выполняем арифметические действия в строке
                        var volume = volume.replace(/\,/g,'.');
                        var volume = volume.replace(/ /g,'');
                        var volume = eval(volume);
                        return volume;
                    }

                    let lbo = structure('.lbo span');
                    let prepaid = structure('.prepaid span');
                    let credit_year_all = structure('.credit_year_all span');
                    let credit_year_term = structure('.credit_year_term span');
                    let debit_year_all = structure('.debit_year_all span');
                    let debit_year_term = structure('.debit_year_term span');
                    let fact_mounth = structure('.fact_mounth span');
                    let kassa_mounth = structure('.kassa_mounth span');
                    let credit_end_all = structure('.credit_end_all span');
                    let credit_end_term = structure('.credit_end_term span');
                    let debit_end_all = structure('.debit_end_all span');
                    let debit_end_term = structure('.debit_end_term span');
                    let return_old_year = structure('.return_old_year span');

                    $.ajax({ 
                        url:"/portal/public/ofs26/user/update",  
                        method:"patch",  
                        data:{
                            "_token": "{{ csrf_token() }}",
                            ekr_id, number, lbo, prepaid, credit_year_all,
                            credit_year_term, debit_year_all, debit_year_term,
                            fact_mounth, kassa_mounth, credit_end_all, credit_end_term,
                            debit_end_all, debit_end_term, return_old_year,
                            mounth, chapter, user_id, id,
                        },
                        dataType:"text",  
                        success:function(data){  
                            fetch_data(); 
                            //alert(data);
                        } 
                    })                   
                }               
            })
        }
        
        //Подгружаем BACK шаблон отрисовки
        function fetch_data(){ 
            let form = <?=json_encode($info)?>;
            let user = form['user'];
            let chapter = form['chapter'];
            let mounth = form['mounth'];

            $.ajax({  
                url:"/portal/public/ofs26/user/table",  
                method:"GET",
                data:{
                    user, chapter, mounth
                },
                dataType:"text",
                success:function(data){  
                    $('#content').html(data);  
                    setKeydownmyForm()
                }   
            });  
        } 
        fetch_data(); 
        
        //Выполняем действие (сбрасываем значения) при нажатии на кнопку reset
        $(document).on('click', '#reset', function(){          
            let el = $(this);
            let tr = el.closest('tr');
            let id = tr.data('id');
            let ekr_id = tr.data('ekr');
            let number = tr.data('number');
            let mounth = tr.data('mounth');
            let chapter = tr.data('chapter');
            let user_id = tr.data('user');

            $.ajax({
                url:"/portal/public/ofs26/user/reset",  
                method:"patch",
                data:{
                    "_token": "{{ csrf_token() }}",
                    id, mounth, chapter,
                    user_id, ekr_id, number
                },
                dataType:"text",  
                success:function(data){
                    fetch_data();
                    //alert(data);
                } 
            })               
        })
    });
</script>