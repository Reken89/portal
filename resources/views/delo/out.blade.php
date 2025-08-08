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
            let user_id_ = [];
            
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
                } else if (item.name === 'user_id') {
                    user_id_.push(value);
                }   
            }
            
            let author = author_[0];
            let variant = variant_[0];
            let npa = npa_[0];
            let corr = corr_[0];
            let content = content_[0];
            let user_id = user_id_[0];
            
            if (content === "") {
                content = "Текст отсутствует...";
            }
            
            $.ajax({
                url:"/portal/public/delo/doc/add",  
                method:"post",
                data:{
                    author, variant, npa, corr, content, user_id,
                    "_token": "{{ csrf_token() }}",
                },
                dataType:"text",  
                success:function(data){  
                    //alert(data);
                    fetch_data();  
                } 
            })               
        })
        
        //Выполняем действие, показываем уведомление
        $(document).on('click', '#access', function(){           
            $.ajax({
                success:function(data){  
                    alert('Правка доступна только автору письма!');
                    fetch_data();  
                } 
            })               
        })
        
        //Выполняем действие, обновляем статус письма
        $(document).on('click', '#status', function(){
            var tr = this.closest('tr');
            var id = $('.id', tr).val();
            
            $.ajax({
                url:"/portal/public/delo/doc/updatestatus",  
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
            let npa_ = [];
            let corr_ = [];
            let content_ = [];
            let date_ = [];
            
            for (const item of info) {
                const value = item.value;
                if (item.name === 'id') {
                    id_.push(value);
                }  else if (item.name === 'npa') {
                    npa_.push(value);
                } else if (item.name === 'corr') {
                    corr_.push(value);
                } else if (item.name === 'content') {
                    content_.push(value);
                } else if (item.name === 'date') {
                    date_.push(value);
                }
            }
            
            let id = id_[0];
            let npa = npa_[0];
            let corr = corr_[0];
            let content = content_[0];
            let date = date_[0];
            
            if (content === "") {
                content = "Текст отсутствует...";
            }
            
            $.ajax({
                url:"/portal/public/delo/doc/update",  
                method:"post",
                data:{
                    id, npa, corr, content, date,
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



