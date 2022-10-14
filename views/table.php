
<?php

if ($_SESSION['id'] !== '1') {

    echo <<<HTML
    <head>          
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>            
    </head>
    
    <div id="live_data"></div>
    
          <script>  
       $(document).ready(function(){
           
           
           
           
                  function setKeydownmyForm() {
	    $('input').keydown(function(e) {
	        if (e.keyCode === 13) {

           var tr = this.closest('tr');
           var id = $('.id', tr).val();    
           
           var tr = this.closest('tr');
           var volume1 = $('.volume1', tr).val();

           var tr = this.closest('tr');
           var sum1 = $('.sum1', tr).val();

           var tr = this.closest('tr');
           var volume2 = $('.volume2', tr).val();

           var tr = this.closest('tr');
           var sum2 = $('.sum2', tr).val();

           var tr = this.closest('tr');
           var volume3 = $('.volume3', tr).val();

           var tr = this.closest('tr');
           var sum3 = $('.sum3', tr).val();  

           var tr = this.closest('tr');
           var volume4 = $('.volume4', tr).val();

           var tr = this.closest('tr');
           var sum4 = $('.sum4', tr).val(); 

           var tr = this.closest('tr');
           var volume5 = $('.volume5', tr).val();

           var tr = this.closest('tr');
           var sum5 = $('.sum5', tr).val(); 

           var tr = this.closest('tr');
           var volume6 = $('.volume6', tr).val();

           var tr = this.closest('tr');
           var sum6 = $('.sum6', tr).val(); 

           var tr = this.closest('tr');
           var volume7 = $('.volume7', tr).val();

           var tr = this.closest('tr');
           var sum7 = $('.sum7', tr).val(); 

           var variant = 10;

           $.ajax({  
                url:"/portal/table/update_info",  
                method:"POST",  
                data:{ id:id, volume1:volume1, sum1:sum1, volume2:volume2, sum2:sum2, volume3:volume3, sum3:sum3, volume4:volume4, sum4:sum4, volume5:volume5, sum5:sum5, volume6:volume6, sum6:sum6, volume7:volume7, sum7:sum7, variant:variant },
                dataType:"text",  
                success:function(data)  
                {  
         //                     alert(data);
                     fetch_data();  
                }  


           })  
      } 

      })  

     }
           
           
           
           
           
           
           
           
           
           
           
           
           
           
                 function fetch_data()  
      {  
           $.ajax({  
                url:"/portal/table/back",  
                method:"POST",  
                success:function(data){  
                     $('#live_data').html(data);  
                     setKeydownmyForm()
                }   
           });  
      } 
     fetch_data(); 
     
     
     
     
     
     $(document).on('click', '#btn_1', function(){

           var tr = this.closest('tr');
           var id = $('.id', tr).val();
    
           var tr = this.closest('tr');
           var variant = $('.variant', tr).val();

           var tr = this.closest('tr');
           var mounth = $('.mounth', tr).val();
             

       $.ajax({  
                url:"/portal/table/update_status",  
                method:"POST",  
                data:{ id:id, variant:variant, mounth:mounth },
                dataType:"text",  
                success:function(data)  
                {  
                     alert(data);
                     fetch_data();  
                }  


           })

        })
     
     
     
     
     
     
     
     
             $(document).on('click', '#btn_2', function(){

           var tr = this.closest('tr');
           var id = $('.id', tr).val();

           var variant = 30;

       $.ajax({  
                url:"/portal/table/update_status",  
                method:"POST",  
                data:{ id:id, variant:variant },
                dataType:"text",  
                success:function(data)  
                {  
                     alert(data);
                     fetch_data();  
                }  


           })

        })
     
     
     
     
     
     
     
     
     
           
       }); 
       
       </script>
       
HTML;
} else {

    echo <<<HTML
    <head>          
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>            
    </head>
    
    <div id="live_data"></div>
    
          <script>  
       $(document).ready(function(){
    
    
    
    
                     function fetch_data()  
      {  
           $.ajax({  
                url:"/portal/table/back",  
                method:"POST",  
                success:function(data){  
                     $('#live_data').html(data);  
                     setKeydownmyForm()
                }   
           });  
      } 
     fetch_data(); 
    
    
    
    
  
    
    
   
    
                 $(document).on('click', '#btn3', function(){



       $.ajax({  
                url:"/portal/table/back",  
                method:"POST",  
               
                data: $('#my-form').serialize(),
                dataType:"text",  
                success:function(data)  
                {  
                   //  alert(data);
                   //  fetch_data();  
                  $('#live_data').html(data);
                }  


           })

        })
    
    
    
    
    
    
         $(document).on('click', '#btn_4', function(){

           var tr = this.closest('tr');
           var id = $('.id', tr).val();
    
           var tr = this.closest('tr');
           var variant = $('.variant', tr).val();

           var mounth = 12;
             

       $.ajax({  
                url:"/portal/table/update_status",  
                method:"POST",  
                data:{ id:id, variant:variant, mounth:mounth },
                dataType:"text",  
                success:function(data)  
                {  
                     alert(data);
                     fetch_data();  
                }  


           })

        })
    
    
    
    
    
    
    
    
             $(document).on('click', '#email', function(){

       $.ajax({  
                url:"/portal/table/email",   
                success:function(data)  
                {  
                     alert(data);
                     fetch_data();  
                }  


           })

        })
    
    
    
    
    

    
           }); 
       
       </script>
    
    HTML;
}