<?php
include "includes/dbConnect.php"; // Database connection.

// Check Cookies for the "remember me" functionality.
if(isset($_COOKIE["account_login"]) && isset($_COOKIE["account_token"]))
{
  $checkEmail = $_COOKIE["account_login"] ;
  $checkToken = $_COOKIE["account_token"] ;

  $rem = $db_conn->query("SELECT email from tbl_account where email = '$checkEmail' and remember_hash = '$checkToken' ") ;
  $rem = $rem->fetch_assoc() ;
}

?>

<!DOCTYPE html>

<html lang="en">
    <!--<![endif]-->
    <!-- BEGIN HEAD -->

    <head>
        <meta charset="utf-8" />
        <title>Inventaries | Login</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta content="Preview page of Metronic Admin Theme #3 for " name="description" />
        <meta content="" name="author" />

        <!-- LOTS OF CSS -->
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
        <link href="assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/global/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/global/plugins/select2/css/select2-bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/global/plugins/ladda/ladda-themeless.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/global/css/components.min.css" rel="stylesheet" id="style_components" type="text/css" />
        <link href="assets/global/css/plugins.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/pages/css/login-5.min.css" rel="stylesheet" type="text/css" />
        <link rel="shortcut icon" href="favicon.ico" /> </head>
    <!-- END HEAD -->

    <body class=" login">

        <div class="user-login-5">
            <div class="row bs-reset">
                <div class="col-md-6 login-container bs-reset">
                    <img class="login-logo login-6" src="logo-inventaries.png" />
                    <div class="login-content">
                        <h1>Inventaries Admin Login</h1>
                        <p> </p>
                        <div class="login-form">

                            <div class="alert alert-danger display-hide" id='alert'>
                                <button class="close" data-close="alert"></button>
                                <span>Enter any username and password. </span>
                            </div>
                            <div class="row">
                                <div class="col-xs-6">
                                  <?php
                                    if(isset($checkEmail))
                                    {
                                      if($rem['email'] == $checkEmail)
                                      {
                                        echo "<input class='form-control form-control-solid placeholder-no-fix form-group' type='text' value=$checkEmail autocomplete='off' placeholder='Email' name='email' required/>";
                                      }

                                      else
                                      {
                                        echo "<input class='form-control form-control-solid placeholder-no-fix form-group' type='text' autocomplete='off' placeholder='Email' name='email' required/>";
                                      }
                                    }

                                    else
                                    {
                                      echo "<input class='form-control form-control-solid placeholder-no-fix form-group' type='text' autocomplete='off' placeholder='Email' name='email' required/>";
                                    }

                                  ?>
                                  </div>
                                <div class="col-xs-6">
                                    <input class="form-control form-control-solid placeholder-no-fix form-group" type="password" autocomplete="off" placeholder="Password" name="password" required/>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4">
                                    <label class="rememberme mt-checkbox mt-checkbox-outline">
                                      <?php
                                        if(isset($checkEmail))
                                        {
                                          echo "<input type='checkbox' name='remember' checked/> Remember me" ;
                                        }

                                        else
                                        {
                                          echo "<input type='checkbox' name='remember'/> Remember me" ;
                                        }

                                      ?>
                                        <span></span>
                                    </label>
                                </div>
                                <div class="col-sm-8 text-right">
                                    <div class="forgot-password">
                                        <a href="javascript:;" id="forget-password" class="forget-password">Forgot Password?</a>
                                    </div>
                                    <button type="submit" id="login_btn" class="btn blue">Login</button>
                                </div>
                            </div>
                          </div>
                        <!-- BEGIN FORGOT PASSWORD FORM -->
                        <form class="forget-form" action="javascript:;" method="post" id="forgot_pass">
                            <h3>Forgot Password ?</h3>
                            <p> Enter your e-mail address below to reset your password. </p>
                            <div class="form-group">
                                <input class="form-control placeholder-no-fix" type="text" autocomplete="off" placeholder="Email" name="email" id='forgot_email' /> </div>
                            <div class="form-actions">
                                <button type="button" id="back-btn" class="btn blue btn-outline">Back</button>

                                <a type="submit" class="btn blue btn-lg ladda-button" data-style="slide-up" data-size="l" id='forgot-submit'>
                                  <span class="ladda-label">Submit</span>
                                </a>
                            </div>
                        </form>
                        <!-- END FORGOT PASSWORD FORM -->
                    </div>

                </div>
                <div class="col-md-6 bs-reset">
                    <div class="login-bg"></div>
            </div>
        </div>
        <!-- END : LOGIN PAGE 5-2 -->
        <!--[if lt IE 9]>
<script src="assets/global/plugins/respond.min.js"></script>
<script src="assets/global/plugins/excanvas.min.js"></script>
<script src="assets/global/plugins/ie8.fix.min.js"></script>
<![endif]-->

        <!-- PLUGIN SCRIPTS -->
        <script src="assets/global/plugins/jquery.min.js" type="text/javascript"></script>
        <script src="assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="assets/global/plugins/js.cookie.min.js" type="text/javascript"></script>
        <script src="assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
        <script src="assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
        <script src="assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
        <script src="assets/global/plugins/jquery-validation/js/jquery.validate.js" type="text/javascript"></script>
        <script src="assets/global/plugins/jquery-validation/js/additional-methods.js" type="text/javascript"></script>
        <script src="assets/global/plugins/select2/js/select2.full.min.js" type="text/javascript"></script>
        <script src="assets/global/plugins/backstretch/jquery.backstretch.js" type="text/javascript"></script>
        <script src="assets/global/plugins/ladda/spin.min.js" type="text/javascript"></script>
        <script src="assets/global/plugins/ladda/ladda.min.js" type="text/javascript"></script>
        <script src="assets/global/scripts/app.min.js" type="text/javascript"></script>
        <script src="assets/pages/scripts/ui-buttons-spinners.min.js" type="text/javascript"></script>
        <script src="assets/pages/scripts/login-5.js" type="text/javascript"></script>
        <script src="assets/pages/scripts/form-validation.js" type="text/javascript"></script>



        <script>
        // Ladda.bind('#forgot-submit'); IGNORE

        $(document).on("click","#login_btn",function(event){
          event.preventDefault();
          event.stopPropagation();

          var email = $("input[name='email']")[0].value ;
          var password = $("input[name='password']")[0].value ;

          if($("input[name='remember']")[0].checked)
          {
            var remember = 1 ;
          }

          else
          {
            var remember = 0 ;
          }



          console.log(remember);

          $.ajax({
            url: "includes/loginCheck.php",
            method: "post",
            data: {email:email,password:password,remember:remember},
            success:function(data){
              if(data)
              {
                if(data == "Success")
                {
                  window.location.replace("inv-users/dashboard.php");
                }

                else
                {
                  $("#alert")[0].innerHTML = data ;
                  $("#alert").css("display","block") ;
                }
              }
            }

          });


        });


        $(document).on("keypress",function(event){

          if(event.which == 13)  // the enter key code
          {
            event.preventDefault();

            var email = $("input[name='email']")[0].value ;
            var password = $("input[name='password']")[0].value ;

            if($("input[name='remember']")[0].checked)
            {
              var remember = 1 ;
            }

            else
            {
              var remember = 0 ;
            }



            console.log(remember);

            $.ajax({
              url: "includes/loginCheck.php",
              method: "post",
              data: {email:email,password:password,remember:remember},
              success:function(data){
                if(data)
                {
                  if(data == "Success")
                  {
                    window.location.replace("inv-users/dashboard.php");
                  }

                  else
                  {
                    $("#alert")[0].innerHTML = data ;
                    $("#alert").css("display","block") ;
                  }
                }
              }

            });
          }

        });



        </script>


</body>


</html>
