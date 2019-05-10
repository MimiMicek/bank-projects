<?php

//APIS MOST OF THE TIME DONT HAVE A LAYOUT
//ALWAYS FIRST test the API file then you test it with JS
/* echo '<script>$("body").fadeOut(5000)</script>'; */

//you can only echo 1 time

/* echo rand(0, 1000000); */
$iStockPrice = rand(0, 100);
echo '{"status":1,"price":'.$iStockPrice.', "name": "ABC"}';