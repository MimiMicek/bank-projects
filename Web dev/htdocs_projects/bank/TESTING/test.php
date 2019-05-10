<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>AJAX</title>
</head>
<body>
  <div>
    The stock name is: <span id="lblStockName"></span>
    The stock price is: <span id="lblStockPrice"></span>
  </div>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>




  <script>
    //runs one time x amount of seconds
    //runs every x amount of seconds
    setInterval(function() {
        $.ajax({
        //passing a JSON object
        method:'GET',//uses the method GET by default
        url: 'apis/api-get-stock-price.php',
        datatype: 'JSON'
      }).done(function(jData){
        //callback
       /*  let jData = JSON.parse(sData) */
        
          if(jData.status == 1){
            $('#lblStockName').text(jData.name)
            $('#lblStockPrice').text(jData.price)
          }else{
            console.log("wrong...")
          }
        
        /* $('#lblData').text(sStockPrice)//use text instead of html protects you against the script injections */
      }).fail(function(){
        //callback
        console.log('ERROR');
      })
    }, 1000);
 

    
  </script>

</body>
</html>