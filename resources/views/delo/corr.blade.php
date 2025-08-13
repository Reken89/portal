@include('layouts.version')
<div id="live_data"></div>

<script>
    $(document).ready(function(){
   
        //Подгружаем BACK шаблон отрисовки       
        function fetch_data(){
            $.ajax({                
                url:"/portal/public/delo/corr/table", 
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
                    alert('Только начальник отдела может добавлять и редактировать корреспондентов!');
                    fetch_data();  
                } 
            })               
        })
        
        //Выполняем действие, обновляем статус письма
        $(document).on('click', '#status', function(){
            var tr = this.closest('tr');
            var id = $('.id', tr).val();
            
            $.ajax({
                url:"/portal/public/delo/corr/updatestatus",  
                method:"post",
                data:{
                    id, "_token": "{{ csrf_token() }}"
                },
                dataType:"text",  
                success:function(data){  
                    //alert(data);
                    fetch_data();  
                } 
            })               
        })
        
        //Выполняем действие, обновляем информацию в письме
        $(document).on('click', '#btn_save', function(){
            let info = $('#update').serializeArray();
            let id_ = [];
            let title_ = [];
            
            for (const item of info) {
                const value = item.value;
                if (item.name === 'id') {
                    id_.push(value);
                }  else if (item.name === 'title') {
                    title_.push(value);
                } 
            }
            
            let id = id_[0];
            let title = title_[0];
            
            if (title === "") {
                title = "Неизвестный корреспондент...";
            }
            
            $.ajax({
                url:"/portal/public/delo/corr/update",  
                method:"post",
                data:{
                    id, title,
                    "_token": "{{ csrf_token() }}",
                },
                dataType:"text",  
                success:function(data){  
                    //alert(data);
                    fetch_data();  
                } 
            })               
        })
        
        //Выполняем действие, добавляем корреспондента
        $(document).on('click', '#btn_add', function(){
            let info = $('#correspondent').serializeArray();
            let title_ = [];
            
            for (const item of info) {
                const value = item.value;
                if (item.name === 'title') {
                    title_.push(value);
                }    
            }
            
            let title = title_[0];
            
            if (title === "") {
                title = "Неизвестный корреспондент...";
            }
            
            $.ajax({
                url:"/portal/public/delo/corr/add",  
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






