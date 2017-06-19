<!DOCTYPE html>
<html>
<head>
<style>
table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width:73%;
}

td, th {
    border: 3px solid #dddddd;
    text-align: left;
    padding: 5px;
}

tr:nth-child(even) {
    background-color: #dddddd;
}
</style>
	<title></title>
</head>
<body>
<center>

  <table id='tablee' class="tablee">
  <tr>
    <th>Number</th>
    <th>Product_ID</th>
    <th>User_ID</th>
  </tr>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

<script type="text/javascript">
     $(document).ready(function(){
                      $.ajax({
                type:'get',
                url:'{!!URL::to('wishlisttable')!!}',
                dataType:'json',//return data will be json
                success:function(data){
                    //console.log("price");
                    console.log(data);
                      for(var i=0;i<data.length;i++){
                    
                    $('<tr>').html("<td>" + data[i].id + "</td><td>" + data[i].product_id + "</td><td>" + data[i].user_id + "</td><td>" + "</td>").appendTo('#tablee');
                      }
                },
                error:function(){

                }
            });



        });
</script>
</table>
</center>
</body>
</html>

