@include('layouts.version')
<div id="live_data"></div>

<script>
    $(document).ready(function(){
        //Выполняем запись в БД при нажатии на клавишу ENTER
        function setKeydownmyForm() {
            $('input').keydown(function(e) {
                if (e.keyCode === 13) {
                    var tr = this.closest('tr');
                    var id = $('.id', tr).val(); 
                    var name = $('.name', tr).val();
                    var email = $('.email', tr).val();
                    var role = $('.role', tr).val();
                                        
                    $.ajax({
                        url:"/portal/public/administrator/updateinfo",  
                        method:"patch",  
                        data:{
                            "_token": "{{ csrf_token() }}",
                            id, name, email, role
                        },
                        dataType:"text",  
                        success:function(data){  
                            fetch_data(); 
                            //alert(data);
                        } 
                    })                   
                }               
            })
        }

        //Подгружаем BACK шаблон отрисовки       
        function fetch_data(){
            $.ajax({                
                url:"/portal/public/administrator/menu", 
                method:"GET",
                data:{
                },
                dataType:"text",
                success:function(data){  
                    $('#live_data').html(data); 
                    setKeydownmyForm()
                }   
            });  
        } 
        fetch_data();
        
        //Выполняем действие, добавляем пользователя
        $(document).on('click', '#btn_add', function(){
            let info = $('#info').serializeArray();
            let name_ = [];
            let email_ = [];
            let role_ = [];
            let password_ = [];
            
            for (const item of info) {
                const value = item.value;
                if (item.name === 'name') {
                    name_.push(value);
                }else if (item.name === 'email') {
                    email_.push(value);
                }else if (item.name === 'role') {
                    role_.push(value);
                }else if (item.name === 'password') {
                    password_.push(value);
                }       
            }
            
            let name = name_[0];
            let email = email_[0];
            let role = role_[0];
            let password = password_[0];
                                    
            $.ajax({
                url:"/portal/public/administrator/adduser",  
                method:"post",
                data:{                   
                    "_token": "{{ csrf_token() }}",
                    name, email, role, password
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




