<!doctype html>
<html lang="en">
<?php
$pageTitle = 'Authentification';
session_start();
include "include/connect.php";
include "include/head-link.php";

 ?>

<body class="authentication-bg">
    <div class="account-pages my-5 pt-sm-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="text-center">
                        <a href="index.html" class="mb-5 d-block auth-logo">
                            <img src="assets/images/logo-dark1.png" alt="" height="22" class="logo logo-dark">
                            <img src="assets/images/logo-light.png" alt="" height="22" class="logo logo-light">
                        </a>
                    </div>
                </div>
            </div>
            <div class="row align-items-center justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-5">
                    <div class="card">

                        <div class="card-body p-4">
                            <div class="text-center mt-2">
                                <h1 class="text-primary">Bienvenu !</h1>
                                <p class="text-muted">Connectez-vous pour continuer à Tech Digital APP</p>
                            </div>
                            <div class="p-2 mt-4">
                                <form action="./auth/code.php" method="POST">
                                    <div class="mb-3">
                                        <label class="form-label" for="username">Email</label>
                                        <?php
                                    if (isset($_SESSION['email']) && $_SESSION['email'] != '') {
                                        ?><input type="email" class="form-control" name="email_u" placeholder="Enter Email " value="<?php echo $_SESSION['email']?>">
                                        <?php
                                        // unset($_SESSION['email']);
                                    }else{
                                        ?><input type="email" class="form-control" name="email_u" placeholder="Enter Email "><?php
                                    }
                                    ?>
                                    </div>
                                    <div class="mb-3">
                                        <!-- <div class="float-end">
                                                <a href="auth-recoverpw.html" class="text-muted">Forgot password?</a>
                                            </div> -->
                                        <label class="form-label" for="userpassword">Mot de passe</label>
                                        <input type="password" class="form-control" name="password_u" placeholder="Enter Mot de passe">
                                    </div>

                                    <!-- <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="auth-remember-check">
                                            <label class="form-check-label" for="auth-remember-check">Remember me</label>
                                        </div> -->
                                    <?php
                                    if (isset($_SESSION['status']) && $_SESSION['status'] != '') {
                                        echo '<h4 class="text-danger">' . $_SESSION['status'] . '</h4>';
                                        unset($_SESSION['status']);
                                    }
                                    ?>
                                    <div class="mt-3 text-end">
                                        <button class="btn btn-primary w-sm waves-effect waves-light" type="submit" name="sub_btnlogin">Se Connecter</button>


                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                    
                </div>
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </div>
<!--footer-->
<?php include "include/footer.inc.php" ?>
    <!-- JAVASCRIPT -->
    <?php include "include/scripts.inc.php" ?>

</body>

<!-- Mirrored from themesbrand.com/minible/layouts/auth-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 31 May 2022 13:16:31 GMT -->

</html>