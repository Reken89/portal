@include('layouts.version')
<div id="live_data"></div>

<script>
    $(document).ready(function(){
   
        //Подгружаем BACK шаблон отрисовки
        function fetch_data(){
            var variant = <?=json_encode($variant)?>;
            $.ajax({                
                url:"/portal/public/delo/table", 
                method:"GET",
                data:{
                    variant
                },
                dataType:"text",
                success:function(data){  
                    $('#live_data').html(data); 
                }   
            });  
        } 
        fetch_data();
                     
    });
</script>



