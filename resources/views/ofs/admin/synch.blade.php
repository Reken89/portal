@include('layouts.version')
<div id="live_data"></div>

<script>
    $(document).ready(function(){  
        //Подгружаем BACK шаблон отрисовки       
        function fetch_data(){
            $.ajax({                
                url:"/portal/public/ofs/admin/synch/table", 
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
        
        //Выполняем действие, добавляем запрос
        $(document).on('click', '#synch', function(){
            let info = $('#parameters').serializeArray();
            let mounth_ = [];
            let user_id_ = [];
            
            for (const item of info) {
                const value = item.value;
                if (item.name === 'mounth') {
                    mounth_.push(value);
                } else if (item.name === 'user') {
                    user_id_.push(value);
                }   
            }

            let mounth = mounth_[0];
            let user_id = user_id_[0];
            
            $("#block").css("display", "none");//Скрываем кнопку 
            $.ajax({
                url:"/portal/public/ofs/admin/copy",  
                method:"patch",
                data:{
                    "_token": "{{ csrf_token() }}",
                    user_id, mounth,
                },
                dataType:"text",  
                success:function(data){ 
                    alert(data); 
                    fetch_data();  
                } 
            })                                  
        })
        
    });
</script>
