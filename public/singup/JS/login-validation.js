$(document).ready(function(){
    $('#usercheckL').hide();   
    let usernameError = true;
    $('#username').keyup(function () {
        validateUsername();
    });
    function validateUsername() {
        let usernameValue = $('#username').val();

        if (usernameValue.length == '') {
        $('#usercheckL').show();
            usernameError = false;
            return false;
        } else if ((usernameValue.length < 3)||(usernameValue.length > 10)) {
            $('#usercheckL').show();
            $('#usercheckL').html("**Length of username must be between 3 and 10");
            usernameError = false;
            return false;
        } else {
            $('#usercheckL').hide();
            return true;
        }
    }



$('#login-btn').click(function(){
        
    
        

        var datos=$('#sign-in-form').serialize();
    
        $.ajax({
            type:"POST",
            url:"../../app/controller/loginpost.php",
            data:datos,
            success: function (reponse){
                if(reponse){
                    window.location.href= "./home.php";
                }
                else{
                    alert("Password or username not match")
                }
                
            }
        });
       
        return false;
        
    
    
}); 

});