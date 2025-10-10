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
            $('input').keydown(function(e) {
                if (e.keyCode === 13) {
                    let tr = this.closest('tr');
                    let ekr_id = $('.ekr_id', tr).val(); 
                    let number = $('.number', tr).val();
                    let mounth = $('.mounth', tr).val();
                    let chapter = $('.chapter', tr).val();
                    let user_id = $('.user_id', tr).val();
                    let shared_id = $('.shared_id', tr).val();
                    let main_id = $('.main_id', tr).val();
                    let id = $('.id', tr).val();
                    let lbo_old = $('.lbo_old', tr).val();
                    let prepaid_old = $('.prepaid_old', tr).val();
                    let credit_year_all_old = $('.credit_year_all_old', tr).val();
                    let credit_year_term_old = $('.credit_year_term_old', tr).val();
                    let debit_year_all_old = $('.debit_year_all_old', tr).val();
                    let debit_year_term_old = $('.debit_year_term_old', tr).val();
                    let fact_mounth_old = $('.fact_mounth_old', tr).val();
                    let kassa_mounth_old = $('.kassa_mounth_old', tr).val();
                    let credit_end_all_old = $('.credit_end_all_old', tr).val();
                    let credit_end_term_old = $('.credit_end_term_old', tr).val();
                    let debit_end_all_old = $('.debit_end_all_old', tr).val();
                    let debit_end_term_old = $('.debit_end_term_old', tr).val();
                    let return_old_year_old = $('.return_old_year_old', tr).val();

                    //Получаем значения, меняем запятую на точку и убираем пробелы в числе                   
                    function structure(title){
                        var volume = $(title, tr).val();
                        //Меняем запятую на точку
                        //Убираем лишние пробелы
                        //Выполняем арифметические действия в строке
                        var volume = volume.replace(/\,/g,'.');
                        var volume = volume.replace(/ /g,'');
                        var volume = eval(volume);
                        return volume;
                    }

                    let lbo = structure('.lbo');
                    let prepaid = structure('.prepaid');
                    let credit_year_all = structure('.credit_year_all');
                    let credit_year_term = structure('.credit_year_term');
                    let debit_year_all = structure('.debit_year_all');
                    let debit_year_term = structure('.debit_year_term');
                    let fact_mounth = structure('.fact_mounth');
                    let kassa_mounth = structure('.kassa_mounth');
                    let credit_end_all = structure('.credit_end_all');
                    let credit_end_term = structure('.credit_end_term');
                    let debit_end_all = structure('.debit_end_all');
                    let debit_end_term = structure('.debit_end_term');
                    let return_old_year = structure('.return_old_year');

                    $.ajax({ 
                        url:"/portal/public/ofs/user/update",  
                        method:"patch",  
                        data:{
                            "_token": "{{ csrf_token() }}",
                            ekr_id, number, lbo, prepaid, credit_year_all,
                            credit_year_term, debit_year_all, debit_year_term,
                            fact_mounth, kassa_mounth, credit_end_all, credit_end_term,
                            debit_end_all, debit_end_term, return_old_year,
                            mounth, chapter, user_id, shared_id, main_id, id,
                            lbo_old, prepaid_old, credit_year_all_old,
                            credit_year_term_old, debit_year_all_old, debit_year_term_old,
                            fact_mounth_old, kassa_mounth_old, credit_end_all_old, credit_end_term_old,
                            debit_end_all_old, debit_end_term_old, return_old_year_old,
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

            $.ajax({  
                url:"/portal/public/ofs/user/table",  
                method:"GET",
                data:{
                    user, chapter
                },
                dataType:"text",
                success:function(data){  
                    $('#content').html(data);  
                    setKeydownmyForm()
                }   
            });  
        } 
        fetch_data();       
    });
</script>
