<!--------------------form login---------------->
<link href="../assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
<?php
session_start();
$server = "localhost";
$user = "root";
$pass = "";
$db = "task_manager_tech";

@$connection = new mysqli($server, $user, $pass, $db);
if (!$connection) {
  die(mysqli_errno($connection));
}
@$dbconfig = mysqli_select_db($connection, $db);
if ($dbconfig) {
  //conected
} else {
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


if (isset($_POST['sub_btnlogin'])) {
  unset($_SESSION['email']);
  @$email_2 = $_POST['email_u'];
  @$password_u = $_POST['password_u'];
  $query = " SELECT * FROM login WHERE email='$email_2' AND password='$password_u' ";
  $query2 = " SELECT * FROM login l,equipe e WHERE l.email='$email_2' AND e.Email=l.email";
  $resry = $connection->query($query);
  $resry2 = $connection->query($query2);
  $row = mysqli_fetch_assoc($resry2);
  $remail = $row['email'];
  if (mysqli_num_rows($resry) > 0) {
    $query74 = "UPDATE login SET active='online' Where email='".$row['email']."'";
    $result_qury74 = $connection->query($query74);
    $_SESSION['user'] = $row['email'];
    $_SESSION['nom'] = $row['Nom'] . ' ' . $row['Prenom'];
    $_SESSION['img'] = $row['photo'];
    $_SESSION['id'] = $row['ID'];

    echo "<meta http-equiv=\"refresh\" content=\"0;URL=../index.php\">";
  } else {
    if ($remail == $email_2) {

      $_SESSION['email'] = $email_2;
      $_SESSION['status'] = "Mot de passe Incorecct !";
      // echo "<meta http-equiv=\"refresh\" content=\"0;URL=../auth-login.php\">";
      header('Location: ../auth-login.php');
      exit();
    } else {
      $_SESSION['status'] = "Email ou le mot de passe Incorecct !";
      // echo "<meta http-equiv=\"refresh\" content=\"0;URL=../auth-login.php\">";
      echo "<meta http-equiv=\"refresh\" content=\"0;URL=../auth-login.php\">";
    }
  }
  $last_date = "UPDATE login SET 	last_seen= NOW() WHERE email='$remail'";
  $res = $connection->query($last_date);
}
?>
<!-----------For Add Project--------->
<?php

// @$checkedmember=implode(',',$_POST['langs']);
if (isset($_POST['sub_addproject'])) {
  @$nom_p = $_POST['title_p'];
  @$client_p = $_POST['clientselect'];
  @$startdate_p = $_POST['date_start'];
  @$enddate_p = $_POST['date_end'];
  @$status_p = $_POST['statuselect'];
  $members2 = '';
  if (!empty($_POST['langs'])) {
    foreach ($_POST['langs'] as $members) {
      $members2 .= $members . ',';
    }
  } else {
  }
  $query2 = " INSERT INTO projet (members,title_projet,date_debut,statut,deadline,id_client) VALUES ('$members2','$nom_p','$startdate_p','$status_p','$enddate_p',$client_p) ";
  $resquery2 = $connection->query($query2);
  echo  '
  <script src="../assets/libs/jquery/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
         <script type="text/javascript">   
  
                    $(document).ready(function(){
                    swal({
                        icon: "success",
                        title: "Bien ",
                      text: "Projet Bien Ajouté !",
                    })
                  });
                </script>
  ';
  echo "<meta http-equiv=\"refresh\" content=\"1;URL=../project.php\">";
}
// header('Location: ../project.php');
?>
<!-----------For Add Client--------->
<?php

if (isset($_POST['sub_addclient'])) {
  @$nom_cl = $_POST['nom_c'];
  @$nom_company = $_POST['nom_company'];
  @$email_cl = $_POST['email_c'];
  @$tel_cl = $_POST['tel_c'];
  @$check_act = $_POST['checkact'];
  $query2 = " INSERT INTO client (Nom,company,email,active,phone) VALUES ('$nom_cl','$nom_company','$email_cl','$check_act','$tel_cl') ";
  $resquery2 = $connection->query($query2);
  echo  '
  <script src="../assets/libs/jquery/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
         <script type="text/javascript">   
  
                    $(document).ready(function(){
                    swal({
                        icon: "success",
                        title: "Bien ",
                      text: "Client Bien Ajouté !",
                    })
                  });
                </script>
  ';
  echo "<meta http-equiv=\"refresh\" content=\"0;URL=../client.php\">";
}

// header('Location: ../project.php');

?>
<!-----------For Add taches--------->
<?php

if (isset($_POST['sub_addtache'])) {
  @$msg_area = $_POST['txt_desc'];
  @$projet = $_POST['projet_select'];
  @$member = $_POST['member_select'];
  @$start_date = $_POST['date_start'];
  @$end_date = $_POST['date_end'];
  @$status = $_POST['status_select'];
  @$property = $_POST['prop_select'];
  $query2 = " INSERT INTO task (desc_task,status,date_start,date_end,property,ID_equipe,ID_projet) VALUES ('$msg_area','$status','$start_date','$end_date','$property',$member,'$projet')";
  $resquery2 = $connection->query($query2);
  echo  '
  <script src="../assets/libs/jquery/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
         <script type="text/javascript">   
  
                    $(document).ready(function(){
                    swal({
                        icon: "success",
                        title: "Bien ",
                      text: "Tache Bien Ajouté !",
                    })
                  });
                </script>
  ';
  echo "<meta http-equiv=\"refresh\" content=\"0;URL=../taches.php\">";
}

// header('Location: ../project.php');


?>

<?php
//-------------------------------------------ADD MESSAGE ----------------------------------------
//hna remplace msg
$simple_string = "Mehdi\n";
$ciphering = "AES-128-CTR";
$iv_length = openssl_cipher_iv_length($ciphering);
$options   = 0;
$encryption_iv = '1234567891011121';
$encryption_key = "W3docs";
// hada dyal insert
$encryption = openssl_encrypt($simple_string, $ciphering, $encryption_key, $options, $encryption_iv);

// Non-NULL Initialization Vector for decryption 
$decryption_iv = '1234567891011121';
$decryption_key = "W3docs";

// hada an3ayto lih
$decryption = openssl_decrypt($encryption, $ciphering, $decryption_key, $options, $decryption_iv);

//--------------------------------------------------------------------------------------------------
if (isset($_POST['sub_message'])) {

  $message = $_POST['messagef'];
  $email_recept = $_POST['email_recept'];
  $id_recept = $_POST['id_recept'];
  $sender = $_SESSION['user'];
  $dtz = new DateTimeZone("Europe/Madrid"); //Your timezone
  $now = new DateTime(date("Y-m-d"), $dtz);
  $simple_string = $message;
  $ciphering = "AES-128-CTR";
  $iv_length = openssl_cipher_iv_length($ciphering);
  $options   = 0;
  $encryption_iv = '1234567891011121';
  $encryption_key = "W3docs";
  // hada dyal insert
  $encryption = openssl_encrypt($simple_string, $ciphering, $encryption_key, $options, $encryption_iv);
  $query50 = "INSERT INTO chat_contact(Sender_email,Destination_email,Message,send_date) VALUES('$sender','$email_recept','$encryption',SYSDATE())";
  $result_qury = $connection->query($query50);


  $query20 = "SELECT MAX(Id_chat)  as azc FROM chat_contact";
  $result_qury20 = $connection->query($query20);
  $row80 = mysqli_fetch_assoc($result_qury20);

  $query5 = "UPDATE chat_contact SET last_msg='$encryption' WHERE  Id_chat=" . $row80['azc'] . " AND((Sender_email='$sender' and Destination_email='$email_recept') or (Destination_email='$email_recept' and Sender_email='$sender'))";
  $result_qury5 = $connection->query($query5);

  $query200 = "SELECT MAX(Id_chat)  as azkc,MAX(send_date) as date_nw FROM chat_contact";
  $result_qury200 = $connection->query($query200);
  $row800 = mysqli_fetch_assoc($result_qury200);

  $query74 = "UPDATE chat_contact SET last_msg='' WHERE send_date<'" . $row800['date_nw'] . "' AND Id_chat !=" . $row800['azkc'] . " AND (last_msg=Message OR last_msg != Message) AND ((Sender_email='$sender' and Destination_email='$email_recept') or (Destination_email='$sender' and Sender_email='$email_recept')) ";
  $result_qury74 = $connection->query($query74);
  echo "<meta http-equiv=\"refresh\" content=\"0;URL=../chat_contact.php?ID_equipe=$id_recept\">";
}

////! add article to db

if (isset($_POST['sub_addarticle'])) {
  @$designation = $_POST['designation_item'];
  @$descreption_article = $_POST['desc_article'];
  @$qte_article = $_POST['qte_article'];
  @$price_article = $_POST['price_item'];
  @$category_article = $_POST['category'];
  $query80 = " INSERT INTO order_item (title_order,desc_order,price_order,qte_enStock,categorie,date_add) VALUES ('$designation','$descreption_article','$price_article','$qte_article','$category_article',sysdate())";
  $connection->query($query80);
  echo  '
  <script src="../assets/libs/jquery/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
         <script type="text/javascript">   
  
                    $(document).ready(function(){
                    swal({
                        icon: "success",
                        title: "Bien ",
                      text: "Article Bien Ajouté !",
                    })
                  });
                </script>
  ';
  echo "<meta http-equiv=\"refresh\" content=\"1;URL=../taches.php\">";
}

?>