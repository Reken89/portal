@include('layouts.version')
<div id="live_data"></div>

<script>
    $(document).ready(function(){
   
        //Подгружаем BACK шаблон отрисовки       
        function fetch_data(){
            $.ajax({                
                url:"/portal/public/delo/npa/table", 
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
        
        //Выполняем действие, показываем уведомление
        $(document).on('click', '#plug', function(){           
            $.ajax({
                success:function(data){  
                    alert('Только начальник отдела может добавлять справочники!');
                    fetch_data();  
                } 
            })               
        })
        
        
        //Выполняем действие, добавляем корреспондента
        $(document).on('click', '#btn_add', function(){
            let info = $('#npa').serializeArray();
            let title_ = [];
            
            for (const item of info) {
                const value = item.value;
                if (item.name === 'title') {
                    title_.push(value);
                }    
            }
            
            let title = title_[0];
            
            if (title === "") {
                title = "Неизвестный справочник...";
            }
            
            $.ajax({
                url:"/portal/public/delo/npa/add",  
                method:"post",
                data:{
                    title, 
                    "_token": "{{ csrf_token() }}",
                },
                dataType:"text",  
                success:function(data){  
                    //alert(data);
                    fetch_data();  
                } 
            })               
        })
                    
    });
</script>







