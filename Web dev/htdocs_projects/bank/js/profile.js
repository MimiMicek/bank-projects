
  //**************************************************  
  //check balance of my account
  //talk to the server and get the balance of the logged user
  //check the balance every second with playing a function (setInterval)
  // self invoking function ()(), instead of calling the function at the end
  
  function fnvGetBalance(){
    var money = new Audio('money.mp3')
    setInterval(function(){
      $.ajax({
        method: "GET",
        url: 'apis/api-get-balance',
        cache: false
      })//get a string, not json
      .done(function( sBalance ){
        // console.log(sBalance)
        // console.log($('#lblBalance').text() )
        //play sound if the balance changes
        if( sBalance != $('#lblBalance').text() ){
            $('#lblBalance').text(sBalance)
            money.play()
            //try to change the balance in clients.json
        }
      }).fail(function(){})


      $.ajax({
        method : "GET",
        url : 'apis/api-get-transactions-not-read',
        cache : false,
        dataType : "JSON"
      }).done(function( jTransactions ){

        for( let jTransactionKey in jTransactions ){
          console.log(jTransactionKey)
          let jTransaction = jTransactions[jTransactionKey] // get object from key
          let date = jTransaction.date
          let amount = jTransaction.amount
          let name = jTransaction.name
          let lastName = jTransaction.lastName
          let fromPhone = jTransaction.fromPhone
          let message = jTransaction.message
          
          // string literals
          let sTransactionTr = 
                 
          `<tr>
          <td>${jTransactionKey}</td>
          <td>${date}</td>
          <td>${amount}</td>
          <td>${name}</td>
          <td>${lastName}</td>
          <td>${fromPhone}</td>
          <td>${message}</td>
        </tr>  `
          
          $('#lblTransactions').prepend(sTransactionTr)
          // Maybe display them slower
          swal({
            title:"TRANSFER", text:"You have received "+amount+ ' from: ' +name+' '+lastName+ ' ' +' with phone number: ' +fromPhone+ ' and message: ' +message, icon: "success",
          });
        
        }

      }).fail(function(){})
  
    }, 10000 )
  }
  
fnvGetBalance()



$('#frmTransfer').submit( function(){

    $.ajax({
      method : "GET",
      url : 'apis/api-transfer',
      data :  {
                "phone": $('#txtTransferToPhone').val(),
                "amount": $('#txtTransferAmount').val(),
                "message": $('#txtTransferMessage').val()
              },
      cache: false,
      dataType:"JSON"
    }).
    done( function(jData){
      if(jData.status == -1){
        console.log('*************')
        console.log(jData)
      }
  
      //if the phone does not exit in my systemm, but still is valid - get list of banks 
      if(jData.status == 0){
        console.log('*************')
      } // end of 0 case
  
      if(jData.status == 1){
        console.log('*************')
        console.log(jData)
        // TODO: Continue with a local transfer
        swal({
          title:"TRANSFER", text:"You have sent this amount: "+$('#txtTransferAmount').val()+" to this phone: "+$('#txtTransferToPhone').val(), icon: "success",
        });
      }
    }).
    fail( function(){
      console.log('FATAL ERROR')
    })
  
    return false
  })









