<link href="../assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
<?php 

session_start();
include("connect.php");
if($dbconfig){
    //conected
    }else{
    echo '
    <div class="my-5 pt-sm-5">
                <div class="container">
    
                    <div class="row">
                        <div class="col-md-12">
                            <div class="text-center">
                                <div>
                                    <div class="row justify-content-center">
                                        <div class="col-sm-4">
                                            <div class="error-img">
                                                <img src="../assets/images/404-error.png" alt="" class="img-fluid mx-auto d-block">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <h4 class="text-uppercase mt-4">DÉSOLÉ, PAGE INTROUVABLE</h4>
                                <p class="text-muted">problème dans la base de données</p>
                                <div class="mt-5">
                                    <a class="btn btn-primary waves-effect waves-light" href="../index.php">Retour</a>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
    ';
    }
    if(!$_SESSION['user']){
        $query7 = "UPDATE login SET active='offline' ";
        $connection->query($query7);
        header('Location:auth-login.php');
        // echo "<meta http-equiv=\"refresh\" content=\"0;URL= auth-login.php\">";


    }
    

?>