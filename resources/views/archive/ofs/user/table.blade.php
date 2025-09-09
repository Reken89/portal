@include('layouts.version')
<div id="live_data"></div>

<script>
    $(document).ready(function(){
   
        //Подгружаем BACK шаблон отрисовки       
        function fetch_data(){          
            $.ajax({                
                url:"/portal/public/archive/user/table", 
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
        $(document).on('click', '#btn_add', function(){
            let info = $('#parameters').serializeArray();
            let chapter_ = [];
            let year_ = [];
            let mounth_ = [];
            let user_ = [];
            
            for (const item of info) {
                const value = item.value;
                if (item.name === 'chapter') {
                    chapter_.push(value);
                } else if (item.name === 'year') {
                    year_.push(value);
                } else if (item.name === 'mounth') {
                    mounth_.push(value);
                } else if (item.name === 'user') {
                    user_.push(value);
                }    
            }
            
            let chapter = chapter_[0];
            let year = year_[0];
            let mounth = mounth_[0];
            let user = user_[0];
            
            alert(chapter);                                    
        })
                                  
    });
</script>





