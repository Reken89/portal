@include('layouts.version')
<div id="live_data"></div>

<script>
    $(document).ready(function(){
   
        //Подгружаем BACK шаблон отрисовки       
        function fetch_data(){          
            $.ajax({                
                url:"/portal/public/communal/user/table", 
                method:"GET",
                data:{
                },
                dataType:"text",
                success:function(data){  
                    $('#live_data').html(data); 
                }   
            });  
        } 
        fetch_data();
        
        //Выполняем действие (формируем таблицу) при нажатии на кнопку
        $(document).on('click', '#btn_parameters', function(){
            let info = $('#parameters').serializeArray();
            let year = [];
                    
            for (const item of info) {
                const value = item.value;
                if (item.name === 'year') {
                    year.push(value);
                } 
            }            
                
            $.ajax({
                url:"/portal/public/communal/user/table",  
                method:"get",
                data:{
                    year, 
                },
                dataType:"text",  
                success:function(data){ 
                    $('#live_data').html(data);  
                } 
            })               
        })
                                  
    });
</script>




