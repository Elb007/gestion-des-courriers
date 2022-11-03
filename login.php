<?php
require 'header.php';
if (isset($_SESSION['id'])) {
    header('location: header.php');
}
?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login</title>
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet"
              id="bootstrap-css">
           
        <style>
            .rounded {
                border: 2px;
                outline: none;
                box-shadow: white;
                 }
            .login {
                    background: #1690A7;
                    display: flex;
                    justify-content: center;
                    align-items: center;
                    height: 100vh;
                    flex-direction: column;
                    font-family: monospace;
                   box-sizing: border-box;
                }
             label
             { color: black; }
             

             form {
                width: 500px;
                border: 2px solid #ccc;
                padding: 30px;
                background: #dbcbcb;
                border-radius: 15px;
            }

        </style>
    </head>
    <body style="background : url('images/bg-login.jpg') no-repeat center / cover">
  
    <div class="container" id="login">
        <div class="img" >
     
        <div class="row">
            <div class="col-md-12 min-vh-100 d-flex flex-column justify-content-center">
                <div class="row">
                    <div class="col-lg-6 col-md-8 mx-auto">
                        <!-- form card login --> <br> <br><br> <br>
                        <div class="card rounded shadow">
                            <div class="card-header bg-info text-light">
                                <h3 class="mb-0 text-center">S'Identifier</h3>
                            </div>
                            <!--Alert-->
                            <?php
                            if (isset($_SESSION['error-message'])) {
                                echo '
                                <div class="alert alert-danger text-center alert-dismissible show errorAlert" role="alert">
                                    ' . $_SESSION['error-message'] . '
                                </div>';
                                unset($_SESSION['error-message']);
                            }
                            ?>

                            <div class="card-body">
                                <form class="form" autocomplete="off" action="includes/login-code.php" id="formLogin"
                                      role="form" method="POST">
                                    <div class="form-group">
                                        <label for="username">User Name : </label>
                                        <input type="text" class="form-control form-control-lg rounded-0"
                                               name="username" id="username"
                                               value='<?php echo isset($_GET['username']) ? $_GET['username'] : ""; ?>'>
                                        <div class="text-danger" id="userEmpty" style="display:none;">Veuillez remplir ce champs!
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="pwd">Password : </label>
                                        <input type="password" class="form-control form-control-lg rounded-0" name="pwd"
                                               id="pwd" autocomplete="new-password">
                                        <div class="text-danger" id="pwdEmpty" style="display:none;">Veuillez remplir ce
                                            champs!
                                        </div>
                                    </div>
                                    <button type="submit" class="btn float-right bg-danger text-light" name="login"
                                            id="btnLogin"><i class="fa fa-sign-in"></i> Se connecter
                                    </button>
                                    <a href="signup.php" class="ca" >Créer un compte</a>
                                </form>
                            </div>
                            <!--/card-block-->
                        </div>
                        <!-- /form card login -->
                    </div>
                </div>
                <!--/row-->
            </div>
            <!--/col-->
        </div>
        <!--/row-->
    </div>


    <!--/container-->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="javascript/formValidation.js"></script>

    </body>
    </html>


<?php
require_once 'footer.php';
?>