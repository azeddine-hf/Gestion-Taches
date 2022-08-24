<!-------------------Code Edit Member in popup -------------------------->
<?php
include "./include/connect.php";
if (isset($_POST['sub_editmember'])) {
  @$id_member = $_POST['idm'];
  @$nom = $_POST['nom2'];
  @$prenom = $_POST['prenom2'];
  @$poste = $_POST['poste2'];
  @$email = $_POST['email2'];
  @$tel = $_POST['tel2'];
  @$pass = $_POST['pass2'];
  @$photo = $_FILES['file2']['name'];
  $fileDestination1 = './assets/images/users/' . $photo;
    $qury = "UPDATE equipe SET Nom	='" . $nom . "' , Prenom ='" . $prenom . "' ,
    jobe='" . $poste . "' , photo='" . $fileDestination1 . "' , Mobile='" . $tel . "' , Email='". $email ."' WHERE ID=" . $id_member . "";
    $resultq = $connection->query($qury);
    if($resultq){        
        echo  '
        <script src="./assets/libs/jquery/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
               <script type="text/javascript">   
        
                          $(document).ready(function(){
                          swal({
                              icon: "success",
                              title: "Bien ",
                            text: "Member Bien Modifié !",
                          })
                        });
                      </script>
        ';
        move_uploaded_file($_FILES['file2']['tmp_name'],"./assets/images/users/".$_FILES['file2']['name']);
        echo "<meta http-equiv=\"refresh\" content=\"0;URL=./equipe-list.php\">";

        // header("Refresh:2; ./equipe-list.php", true, 303);
    }
    
}
?>
<!-------------------Code delete Member in popup -------------------------->
<?php
if (isset($_POST['sub_deletemember'])) {
  @$id_member = $_POST['id_supp'];

    $qury = "UPDATE equipe SET  is_delete='1' WHERE ID=" . $id_member . "";
    $resultq = $connection->query($qury);
    if($resultq){        
        echo  '
        <script src="./assets/libs/jquery/jquery.min.js"></script>
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
        echo "<meta http-equiv=\"refresh\" content=\"0;URL=./equipe-list.php\">";
        // header("Refresh:2; ./equipe-list.php", true, 303);
    }
    
}
?>