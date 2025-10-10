@include('layouts.version')
<div id="live_data"></div>

<script>
    $(document).ready(function(){  
        //Подгружаем BACK шаблон отрисовки       
        function fetch_data(){
            $.ajax({                
                url:"/portal/public/ofs/admin/table", 
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
        
        //Выполняем действие, обновляем правила
        $(document).on('click', '#btn_filter', function(){
            let info = $('#filters').serializeArray();
            let finish_ = [];
            let old_ = [];
            
            for (const item of info) {
                const value = item.value;
                if (item.name === 'finish') {
                    finish_.push(value);
                }else if(item.name === 'old') {
                    old_.push(value);
                } 
            }
            
            let finish = finish_[0];
            let old = old_[0];
            if(old === undefined){
                old = "no";
            }
            
            $.ajax({
                url:"/portal/public/ofs/admin/rules/update",  
                method:"patch",
                data:{
                    finish, old,
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






