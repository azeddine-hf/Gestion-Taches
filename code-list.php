<!-----------------For Add Memeber------------------------>
<?php
include "./include/connect.php";
if (isset($_POST['sub_addmember'])) {
  @$nom = $_POST['nom'];
  @$prenom = $_POST['prenom'];
  @$email = $_POST['email'];
  @$poste = $_POST['poste'];
  @$tel = $_POST['tel'];
  @$password = $_POST['password'];
  @$fullname .= $nom .' '. $prenom;
  //code img file
  $file = $_FILES['file'];
  $fileName = $_FILES['file']['name'];
  $fileTmpName = $_FILES['file']['tmp_name'];
  $fileSize = $_FILES['file']['size'];
  $fileError = $_FILES['file']['error'];
  $fileType = $_FILES['file']['type'];


  $fileExt = explode('.', $fileName);
  $fileActualExt = strtolower(end($fileExt));


  $allowed = array('png', 'jpg', 'jpeg', 'webp', 'gif');

  //Tu fais les vérifications nécéssaires
  if (in_array($fileActualExt, $allowed))
  //Si l'extension n'est pas dans le tableau
  {
      if ($fileError === 0) {

          if ($fileSize < 5000000) {

              $fileNameNew = uniqid('', true) . "." . $fileActualExt;
              $fileDestination = './assets/images/users/' . $fileNameNew;
              move_uploaded_file($fileTmpName, $fileDestination);

              $fileDestination1 = './assets/images/users/' . $fileNameNew;
        

  //code insert into equipe
  $query2 = " INSERT INTO equipe (Nom,Prenom,jobe,photo,Mobile,Email,password) VALUES ('$nom','$prenom','$poste','$fileDestination1','$tel','$email','$password') ";
  $resquery1 = $connection->query($query2);
  //code insert into login
  $query3 = " INSERT INTO login (full_name,email,password) VALUES ('$fullname','$email','$password') ";
  $resquery2 = $connection->query($query3);
  echo  '
  <script src="./assets/libs/jquery/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
        <script type="text/javascript">   
  
                    $(document).ready(function(){
                    swal({
                        icon: "success",
                        title: "Bien ",
                      text: "Member Bien Ajouté !",
                    })
                  });
                </script>
  ';
  echo "<meta http-equiv=\"refresh\" content=\"0;URL=./equipe-list.php\">";
  // header("Refresh:2; ./equipe-list.php", true, 303);
}  }
}
}
