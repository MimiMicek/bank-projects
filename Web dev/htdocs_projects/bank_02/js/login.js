

$('#frmLogin').submit( function(){

    $.ajax({
      method:"POST",
      url:"apis/api-login",
      data:$('#frmLogin').serialize(),
      dataType:'JSON'
    }).
    done(function(jData){
      if(jData.status == 0){
        console.log(jData)
        return
      }
        
      // SUCCESS
      location.href = 'profile'
      
    }).
    fail(function(){
      console.log('error')
    })
    
    swal({
      title:"SORRY", text:"try again", icon: "warning",
    });
    return false
  
  })


  // $('#frmLogin').submit(function(){

//     $.ajax({
//         method: "POST",
//         url: "apis/api-login",
//         data: $('#frmLogin').serialize(),
//         dataType: "JSON"
//     }).
//     done(function(jData){
//         console.log(jData)

//         if(jData.status == 0){
//             // swal({
//             //     // title:"CONGRATS", text:"You have logged in", icon: "success",
//             //   });
//             console.log(jData)
//               return 
//             }

//             //SUCCESS - go to profile
//             location.href = 'profile'
//     }).
//     fail(function(){
//         console.log('error')
        
//         swal({
//             title:"SORRY", text:"try again", icon: "warning",
//         });
//     })

//     return false

// })