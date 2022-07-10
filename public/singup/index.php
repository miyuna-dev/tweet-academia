<?php
require_once ('../../app/controller/register_login_controller.php');
require_once ('../../app/controller/sessionstart.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- Font awesome -->
    <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>

    <!-- STYLES -->
    <link rel="stylesheet" href="./CSS/style.css" />

    <!-- jQuery -->
    <script src="http://code.jquery.com/jquery-1.12.0.min.js"></script>
    <script src="http://cdn.jsdelivr.net/jquery.validation/1.14.0/jquery.validate.min.js"></script>

    <!-- BOOTSTRAP -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>

    <!-- Latest compiled and minified CSS -->
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"> -->
    <!-- jQuery library -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!-- Popper JS -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

    <title>Tweet Fox</title>
</head>

<body>
    <div class="container">
        <div class="forms-container">
            <div class="signin-signup">
                <!-- SIGN IN -->
                <form method="post" action="" class="sign-in-form" id="sign-in-form">
                    <h2 class="title">Sign in</h2>
                    <div class="input-field">
                        <i class="fas fa-user"></i>
                        <input name="username" type="text" placeholder="Username" />
                    </div>
                    <h5 id="usercheckL" style="color: red;">
                        Error : Username is missing
                    </h5>
                    <div class="input-field">
                        <i class="fas fa-lock"></i>
                        <input name="password" type="password" placeholder="Password" />
                    </div>
                    <input name="login" type="submit" value="login" id="login-btn" class="btn solid" />
                    <p class="social-text">Or Sign in with social platforms</p>
                    <div class="social-media">
                        <a href="#" class="social-icon">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#" class="social-icon">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#" class="social-icon">
                            <i class="fab fa-google"></i>
                        </a>
                        <a href="#" class="social-icon">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                    </div>
                </form>

                <!-- SIGN UP -->
                <form method="post" action="" class="sign-up-form" id="sign-up-form">
                    <h2 class="title">Sign up</h2>
                    <!-- USERNAME -->
                    <div class="input-field">
                        <i class="fas fa-user"></i>
                        <input name="username" type="text" id="username" autocomplete="off" placeholder="Username" />
                    </div>
                    <h5 id="usercheck" style="color: red;">
                        Error : Username is missing
                    </h5>

                    <!-- FIRSTNAME -->
                    <div class="input-field">
                        <i class="fas fa-user"></i>
                        <input name="firstname" type="text" id="firstname" autocomplete="off" placeholder="Firstname" />
                    </div>
                    <h5 id="firstnamecheck" style="color: red;">
                        Error : Firstname is missing
                    </h5>

                    <!-- LASTNAME -->
                    <div class="input-field">
                        <i class="fas fa-user"></i>
                        <input name="lastname" type="text" id="lastname" autocomplete="off" placeholder="Lastname" />
                    </div>
                    <h5 id="lastnamecheck" style="color: red;">
                        Error : Lastname is missing
                    </h5>

                    <!-- DATE -->
                    <!-- ! AJOUTER UN MSG D'ERREUR ? -->
                    <div class="input-field">
                        <i class=" fas fa-thin fa-calendar"></i>
                        <input name="date" type="date" id="date" placeholder="date" id="user_date" />
                    </div>

                    <!-- EMAIL -->
                    <div class="input-field">
                        <i class="fas fa-envelope"></i>
                        <input name="email" type="email" autocomplete="off" placeholder="Email" id="email" />
                    </div>
                    <h5 id="emailcheck" class="form-text text-muted invalid-feedback">
                        Your email must be a valid email
                    </h5>

                    <!-- PASSWORD -->
                    <div class="input-field">
                        <i class="fas fa-lock"></i>
                        <input name="password" type="password" id="signup-pw" autocomplete="off"
                            placeholder="Password" />
                    </div>
                    <h5 id="passcheck" style="color: red;">
                        Error : Please Fill the password
                    </h5>

                    <!-- COMFIRM PASSWORD -->
                    <div class="input-field">
                        <i class="fas fa-lock"></i>
                        <input name="comfirmpassword" type="password" id="signup-comfirmpassword" autocomplete="off"
                            placeholder="Confirm Password" />
                    </div>
                    <h5 id="conpasscheck" style="color: red;">
                        Error : Password didn't match
                    </h5>

                    <!-- SUMBIT BUTTON -->
                    <input name="regiter" type="submit" class="btn" id="register-btn" value="sign up" />

                    <!-- SOCIAL MEDIA -->
                    <p class="social-text">Or Sign up with social platforms</p>
                    <div class="social-media">
                        <a href="#" class="social-icon">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#" class="social-icon">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#" class="social-icon">
                            <i class="fab fa-google"></i>
                        </a>
                        <a href="#" class="social-icon">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                    </div>

                </form>
            </div>
        </div>

        <div class="panels-container">
            <div class="panel left-panel">
                <div class="content">
                    <h3>New here ?</h3>
                    <p>
                        You are new here you can create an account in a couple of clicks what are you waiting for?
                    </p>
                    <button class="btn transparent" id="sign-up-btn">
                        Sign up
                    </button>
                </div>
                <img src="./img/whitehehe.png" class="image" alt="" />
            </div>
            <div class="panel right-panel">
                <div class="content">
                    <h3>One of us ?</h3>
                    <p>
                        You are one of us, connect, they are waiting for you to read your tweets !!
                        <button class="btn transparent" id="sign-in-btn">
                            Sign in
                        </button>
                </div>
                <img src="./img/foxxx.png" class="image" alt="" />
            </div>
        </div>
    </div>

    <!-- JS -->
    <script src="./JS/app.js"></script>
    <script src="./JS/signupvalidation.js"></script>
    <script src="./JS/login-validation.js"></script>

</body>

</html>