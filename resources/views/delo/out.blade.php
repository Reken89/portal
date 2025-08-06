@include('layouts.version')
<div id="live_data"></div>

<script>
    $(document).ready(function(){
   
        //Подгружаем BACK шаблон отрисовки
        function fetch_data(){
            $.ajax({                
                url:"/portal/public/delo/out/table", 
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
        
        //Выполняем действие, добавляем документ
        $(document).on('click', '#btn_add', function(){
            let info = $('#document').serializeArray();
            let author_ = [];
            let variant_ = [];
            let npa_ = [];
            let corr_ = [];
            let content_ = [];
            
            for (const item of info) {
                const value = item.value;
                if (item.name === 'author') {
                    author_.push(value);
                } else if (item.name === 'variant') {
                    variant_.push(value);
                } else if (item.name === 'npa') {
                    npa_.push(value);
                } else if (item.name === 'corr') {
                    corr_.push(value);
                } else if (item.name === 'content') {
                    content_.push(value);
                }   
            }
            
            let author = author_[0];
            let variant = variant_[0];
            let npa = npa_[0];
            let corr = corr_[0];
            let content = content_[0];
            
            $.ajax({
                url:"/portal/public/delo/doc/add",  
                method:"post",
                data:{
                    author, variant, npa, corr, content,
                    "_token": "{{ csrf_token() }}",
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



