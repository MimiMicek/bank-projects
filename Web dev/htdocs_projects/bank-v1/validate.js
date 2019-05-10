$('form').submit(function(){
  $(this).find('input[data-validate=yes]').each(function(){
    $(this).removeClass('invalid')//remove the class so it doesnt stay red all the time
/*     console.log($(this).attr('data-type'))*/
    /* let bErrors = false */
    let sDataType =  $(this).attr('data-type')
    let iMin = $(this).attr('data-min')
    let iMax = $(this).attr('data-max')
    switch( sDataType ){
      case "string":
        if(     $(this).val().length < iMin || 
                $(this).val().length > iMax    ){
                $(this).addClass('invalid')
               /*  bErrors = true  */ 
        } 
      break

      case "integer":
       if(  Number($(this).val()) < iMin || 
            Number($(this).val()) > iMax    ){
            $(this).addClass('invalid')
            /* bErrors = true  */  
        }
      break
        //create a new case email and put inside reg ex and make the form submit and check email against the regular expression
      case "email":
          var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
          if($(this).val().length < iMin || $(this).val().length > iMax || 
             re.test(String($(this).val()).toLowerCase()) == false){
              $(this).addClass('invalid')
            /*  bErrors = true  */ 
} 

      break

      default:
        console.log('sorry, dont know how to validate that')
      break
    }
  })
  
 /*  if(bErrors == false){
    return true
  }
   */
  if($(this).children().hasClass('invalid')){
    return false
  }
  
})//select by form tag

