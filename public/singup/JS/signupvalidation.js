var form = document.getElementById("sign-up-form");
$(document).ready(function(){
    // Validate Username
    $('#usercheck').hide();   
    let usernameError = true;
    $('#username').keyup(function () {
        validateUsername();
    });

    // Validate Firstname
    $('#firstnamecheck').hide();   
    let firstnameError = true;
    $('#firstname').keyup(function () {
        validateFirstname();
    });

    // Validate Lastname
    $('#lastnamecheck').hide();   
    let lastnameError = true;
    $('#lastname').keyup(function () {
        validateLastname();
    });

    $('#emailcheck').hide();   
    let emailError = true;
    $('#email').keyup(function () {
        ValidateEmail();
    });

    // Validate Email
    function ValidateEmail(){
    const email = document.getElementById('email');
    email.addEventListener('blur', ()=>{
        let regex = /^([_\-\.0-9a-zA-Z]+)@([_\-\.0-9a-zA-Z]+)\.([a-zA-Z]){2,7}$/;
        let s = email.value;
        if(regex.test(s)){
            email.classList.remove('is-invalid');
            emailError = true;
        }
        else{
            email.classList.add('is-invalid');
            emailError = false;
        }
    })  }

    // Validate Password
    $('#passcheck').hide();
    let passwordError = true;
    $('#signup-pw').keyup(function () {
        validatePassword();
    });
    
    // Validate Confirm Password
    $('#conpasscheck').hide();
    let confirmPasswordError = true;
    $('#conpassword').keyup(function () {
        validateConfirmPassword();
    });

/* =========== EVENTS ========== */
    $('#sign-up-form').submit(function(e){
        // console.log('Im entering');
        
        if (validateUsername() && validateFirstname() && validateLastname() && validatePassword() && validateConfirmPassword()){
            sendData();
            // console.log('processing');
        } else {
            e.preventDefault();  
            // console.log("utilisateur non inscrit");
        }
    })


/* =========== FUNCTIONS ========== */
    // VALIDATE USERNAME
    function validateUsername() {
        let usernameValue = $('#username').val();

        if (usernameValue.length == '') {
        $('#usercheck').show();
            usernameError = false;
            return false;
        } else if ((usernameValue.length < 3)||(usernameValue.length > 10)) {
            $('#usercheck').show();
            $('#usercheck').html("**Length of username must be between 3 and 10");
            usernameError = false;
            return false;
        } else {
            $('#usercheck').hide();
            return true;
        }
    }

    // VALIDATE FIRSTNAME
    function validateFirstname() {
        let firstnameValue = $('#firstname').val();

        if (firstnameValue.length == '') {
            $('#firstnamecheck').show();
            firstnameError = false;
            return false;
        } else if (firstnameValue.length <= 2) {
            $('#firstnamecheck').show();
            $('#firstnamecheck').html("**Length of firstname must have at least 2 caracters");
            firstnameError = false;
            return firstnameError;
        } else {
            $('#firstnamecheck').hide();
            return true;
        }
    }

    // VALIDATE LASTNAME
    function validateLastname() {
        let lastnameValue = $('#lastname').val();

        if (lastnameValue.length == '') {
            $('#lastnamecheck').show();
            lastnameError = false;
            return lastnameError;
        } else {
            $('#lastnamecheck').hide();
            return true;
        }
    }

    // VALIDATE PASSWORD
    function validatePassword() {
        let passwordValue = $('#signup-pw').val();

        if (passwordValue.length == '') {
            $('#passcheck').show();
            passwordError = false;
            return passwordError;
        }

        if ((passwordValue.length < 3)||
            (passwordValue.length > 10)) {
            $('#passcheck').show();
            $('#passcheck').html("**Length of your password must be between 3 and 10");
            $('#passcheck').css("color", "red");
            passwordError = false;
            return passwordError;
        } else {
            $('#passcheck').hide();
            return true;
        }
    }

    // VALIDATE CONFIRMPASSWORD
    function validateConfirmPassword() {
        let confirmPasswordValue = $('#signup-comfirmpassword').val();
        let passwordValue = $('#signup-pw').val();

        if (passwordValue != confirmPasswordValue) {
            $('#conpasscheck').show();
            $('#conpasscheck').html("Error : Password didn't Match");
            $('#conpasscheck').css("color", "red");
            confirmPasswordError = false;
            return confirmPasswordError;
        } else {
            $('#conpasscheck').hide();
            return true;
        }
    }

    $('#register-btn').click(function(){
        console.log('test');

        if(validateUsername() && validateFirstname() && validateLastname() && validatePassword() && validateConfirmPassword()){
            var datos=$('#sign-up-form').serialize();

            $.ajax({
                type:"POST",
                url:"../../app/controller/register_login_controller.php",
                data:datos,
                success:function(r){
                    if(r==1){
                        alert("Server Failed");
                    }else{
                        alert("Register successful");
                    }
                }
            });
            return false;
        } else {
            alert("Error to send register not complete ");
        }
        
    }); 
});

