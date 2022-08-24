<!-------------------Code Edit Projet -------------------------->
<?php
include('../include/connect.php');
if (isset($_POST['sub_editproject'])) {
  $id2 = $_REQUEST['Id'];
  $titlep = $_POST['title_p'];
  $statusp = $_POST['statuselect'];
  $startdate = $_POST['date_start'];
  $enddate = $_POST['date_end'];
  $client = $_POST['clientselect'];
  $members2 = '';
    if (!empty($_POST['langs'])) {
      foreach ($_POST['langs'] as $members) {
        $members2 .= $members . ',';
      }
    }
    $qury = "UPDATE projet SET title_projet	='" . $titlep . "' , members ='" . $members2 . "' ,
        date_debut='" . $startdate . "' , deadline='" . $enddate . "' , statut='" . $statusp . "' , 
        id_client=$client WHERE Id=" . $id2 . "";
    $resultq = $connection->query($qury);
    echo  '
  <script src="../assets/libs/jquery/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
         <script type="text/javascript">   
  
                    $(document).ready(function(){
                    swal({
                        icon: "success",
                        title: "Bien ",
                      text: "Projet Bien Modifié !",
                    })
                  });
                </script>
  ';
  echo "<meta http-equiv=\"refresh\" content=\"0;URL=../project.php\">";

  // header("Refresh:2; ../project.php", true, 303);
}
?>
<!-------------------Code Edit Client -------------------------->
<?php
if (isset($_POST['sub_editclient'])) {
  $id_cl2 = $_REQUEST['ID'];
  @$nom_cl = $_POST['nom_c'];
  @$nom_company = $_POST['nom_company'];
  @$email_cl = $_POST['email_c'];
  @$tel_cl = $_POST['tel_c'];
  @$check_act = $_POST['checkact'];
    $qury = "UPDATE client SET Nom	='" . $nom_cl . "' , company ='" . $nom_company . "' ,
    email='" . $email_cl . "' , active='" . $check_act . "' , phone='" . $tel_cl . "' WHERE ID=" . $id_cl2 . "";
    $resultq = $connection->query($qury);
    echo  '
  <script src="../assets/libs/jquery/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
         <script type="text/javascript">   
  
                    $(document).ready(function(){
                    swal({
                        icon: "success",
                        title: "Bien ",
                      text: "Client Bien Modifié !",
                    })
                  });
                </script>
  ';
  echo "<meta http-equiv=\"refresh\" content=\"0;URL=../client.php\">";
  // header("Refresh:2; ../client.php", true, 303);
}
?>
<!-------------------Code Edit Tache -------------------------->
<?php
if (isset($_POST['sub_edittache'])) {
  $id_task = $_POST['id_tsk2'];
  @$message = $_POST['txt_desc3'];
  @$projet_s = $_POST['projet_select2'];
  @$member_s = $_POST['member_select2'];
  @$start_date = $_POST['date_start'];
  @$end_date = $_POST['date_end'];
  @$status_s2 = $_POST['status_select2'];
  @$prorty22 = $_POST['prop_select2'];
    $qury = "UPDATE task SET desc_task	='" . $message . "' , status ='" . $status_s2 . "' ,
    date_start='" . $start_date . "' , date_end='" . $end_date . "' , property='" . $prorty22 . "', ID_equipe =" . $member_s . "
    , ID_projet='" . $projet_s . "' WHERE ID_task =" . $id_task . "";
    $resultq = $connection->query($qury);
    echo  '
  <script src="../assets/libs/jquery/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
         <script type="text/javascript">   
  
                    $(document).ready(function(){
                    swal({
                        icon: "success",
                        title: "Bien ",
                      text: "Client Bien Modifié !",
                    })
                  });
                </script>
  ';
  echo "<meta http-equiv=\"refresh\" content=\"0;URL=../taches.php\">";

  // header("Refresh:2; ../taches.php", true, 303);
}
?>
<!-------------------Code delete tache in popup -------------------------->
<?php
if (isset($_POST['sub_deletetaches'])) {
  @$id_member = $_POST['id_supp'];

    $qury = "UPDATE task SET  is_delete='1' WHERE 	ID_task=" . $id_member . "";
    $resultq = $connection->query($qury);
    if($resultq){        
        echo  '
        <script src="../assets/libs/jquery/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
                <script type="text/javascript">   
        
                            $(document).ready(function(){
                            swal({
                                icon: "success",
                                title: "Bien ",
                            text: "Member Bien Supprimer !",
                            })
                        });
                        </script>
        ';
        echo "<meta http-equiv=\"refresh\" content=\"0;URL=../taches.php\">";
        // header("Refresh:2; ../taches.php", true, 303);
    }
    
}
?>
