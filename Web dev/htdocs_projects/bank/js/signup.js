//what happens when you submit the form
$('#frmSignup').submit(function(){
  //how can i check with ajax
  $.ajax({
      method: "POST",
      url: "apis/api-signup",
      //key: whatever is in the form - convert the form to code that php will understand
      data: $('#frmSignup').serialize(),
      //return what? as json
      dataType: "JSON"
  }).
  done(function(jData){
      // console.log(jData)
      // check for data status
      if(jData.status == 1){
          //use sweetalert library to display frontend validation
          swal({
              title:"CONGRATS", text:"You have signed up", icon: "success",
            });
      }else{
          swal({
              // title:"SYSTEM UPDATE", text:"System is under maintenance", icon: "error",
              title:"SYSTEM UPDATE", text:"System is under maintenance" +jData.code, icon: "warning",
            });
      }
  }).
  fail(function(){
      console.log('error')
  })

  return false
})
