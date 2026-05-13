<head>
    <title>Бюджет 2027-2029</title>
    <link rel="stylesheet" href="{{ asset('assets/plugins/table/table2.css') }}">
</head>

<div class="container_fix4">
    <div id="table"></div>  
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
                    let user_id = td.data('user-id'); // Берем ID из data-атрибута
                    let id = tr.data('id');
                    let year = tr.data('year');

                    //Получаем значения, меняем запятую на точку и убираем пробелы в числе                   
                    function structure(title){
                        var volume = $(title, td).text();
                        //Меняем запятую на точку
                        //Убираем лишние пробелы
                        //Выполняем арифметические действия в строке
                        var volume = volume.replace(/\,/g,'.');
                        var volume = volume.replace(/ /g,'');
                        var volume = eval(volume);
                        return volume;
                    }

                    let sum = structure(el);

                    $.ajax({ 
                        url:"/portal/public/budget/user/update",  
                        method:"patch",  
                        data:{
                            "_token": "{{ csrf_token() }}",
                            id, user_id, sum, year
                        },
                        dataType: "json", // Ждем JSON, а не просто текст
                        success: function(response) {  
                            fetch_data();  
                        },
                        error: function(xhr) {
                            // Если сервер вернул ошибку (400, 422, 500), попадем сюда
                            let errorMessage = xhr.responseJSON ? xhr.responseJSON.message : 'Ошибка сервера';
                        }
                    })              
                }               
            })
        }
        
        //Подгружаем BACK шаблон отрисовки
        function fetch_data(){ 
            let form = <?=json_encode($info)?>;
            let table = form['table'];
            let year = form['year'];

            $.ajax({  
                url:"/portal/public/budget/user/table",  
                method:"GET",
                data:{
                    table, year
                },
                dataType:"text",
                success:function(data){  
                    $('#table').html(data);  
                    setKeydownmyForm()
                }   
            });  
        } 
        fetch_data();

    });
</script>
