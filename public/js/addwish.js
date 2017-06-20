
$(document).ready(function(){

    console.log('sdad');
     $('#aaa').click(function(){
     
       
    var prod_id = $(this).val().
    var user_id =document.getElementById("iss").value;
    console.log(prod_id);
    console.log(user_id);


         //console.log(supplier1,shipper1,customer1);
            $.ajax({
               type:'GET',
                url:'/addwishlist',
                data:{'prod_id':prod_id, 'user_id': user_id},
                dataType:'json',//return data will be json
                success:function(data){
                    //console.log("price");
                    //console.log(data.);
                   //  $.myFunctionName(); 
                     console.log(data);

                },
                error:function(){
  console.log("gjhjhg");
                } 
            });


         });
 });
