<?php

$server = "localhost";
$user = "root";
$pass = "";
$db = "task_manager_tech";

@$connection = new mysqli($server, $user, $pass, $db);
if (!$connection) {
    die(mysqli_errno($connection));
}
include('./auth/code.php');

?>

<?php
function facebook_time_ago($timestamp)
{
    $time_ago = strtotime($timestamp);
    $current_time = time();
    $time_difference = $current_time - $time_ago;
    $seconds = $time_difference;
    $minutes      = round($seconds / 60);           // value 60 is seconds  
    $hours           = round($seconds / 3600);           //value 3600 is 60 minutes * 60 sec  
    $days          = round($seconds / 86400);          //86400 = 24 * 60 * 60;  
    $weeks          = round($seconds / 604800);          // 7*24*60*60;  
    $months          = round($seconds / 2629440);     //((365+365+365+365+366)/5/12)*24*60*60  
    $years          = round($seconds / 31553280);     //(365+365+365+365+366)/5 * 24 * 60 * 60  
    if ($seconds <= 60) {
        return "Juste maintenant";
    } else if ($minutes <= 60) {
        if ($minutes == 1) {
            return "il y a une minute";
        } else {
            return "il y a $minutes minutes";
        }
    } else if ($hours <= 24) {
        if ($hours == 1) {
            return "il y a une heure";
        } else {
            return "il y a $hours heure";
        }
    } else if ($days <= 7) {
        if ($days == 1) {
            return "hier";
        } else {
            return "il y a $days jours";
        }
    } else if ($weeks <= 4.3) //4.3 == 52/12  
    {
        if ($weeks == 1) {
            return "il y a une semaine";
        } else {
            return "il y a $weeks semaines";
        }
    } else if ($months <= 12) {
        if ($months == 1) {
            return "il y a un mois";
        } else {
            return "il y a $months mois";
        }
    } else {
        if ($years == 1) {
            return "il y a un an";
        } else {
            return "il y a $years années";
        }
    }
}
@$email2 = $_SESSION["user"];
$ide = $_GET['ID_equipe'];


@$qury2 = "select * from equipe where ID='" . $ide . "'";
$result2 = $connection->query($qury2);
@$row2 = mysqli_fetch_array($result2);
$qury4 = "SELECT c.* from chat_contact c where c.is_deleted=0 AND(Sender_email='$email2' AND Destination_email='" . $row2['Email'] . "') OR (Sender_email='" . $row2['Email'] . "' AND Destination_email='$email2') ";
$resqury41 = $connection->query($qury4);
$query5 = "UPDATE chat_contact SET status_msg='vu' WHERE Destination_email='$email2' AND last_msg=Message AND((Sender_email='$email2' AND Destination_email='" . $row2['Email'] . "') OR (Sender_email='" . $row2['Email'] . "' AND Destination_email='$email2'))";
$connection->query($query5);

?>
<input type="hidden" name="id_recept" value="<?php echo $_GET['ID_equipe'] ?>">
<input type="hidden" name="email_recept" value="<?php echo $row2['Email'] ?>">
<?php
while ($row10 = mysqli_fetch_assoc($resqury41)) {
    $msg = openssl_decrypt($row10['Message'], $ciphering, $decryption_key, $options, $decryption_iv);
    $last_msg = openssl_decrypt($row10['last_msg'], $ciphering, $decryption_key, $options, $decryption_iv);
?>
    <li id="results" <?php if ($row10['Sender_email'] == $email2) {
        ?>class="right" <?php
                    } else ?>>

        <div class="conversation-list ">
            <div class="ctext-wrap">

                <div class="ctext-wrap-content">
                    <p class="mb-0">
                        <?php
                        echo $msg ?>
                    </p><i class="badge bg-secondary bg-opacity-75"><?php date_default_timezone_set('Europe/Madrid');
                            echo facebook_time_ago($row10['send_date']); ?> </i>
                </div>
        
    <!-- <div class="dropdown align-self-start">
                    <a class="dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="uil uil-ellipsis-v"></i>
                    </a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="#">Copie</a>
                        <a  data-bs-toggle="modal" data-bs-target="#delete_popup" class="btn text-danger delete-btn passingID" data-id="<?php echo $row10['Id_chat'] ?>"><i class="uil uil-trash-alt font-size-18"></i><span class="fw-bold"> Supprimer</span></a>
                    </div>
                </div> -->
    </div>
    


    </div>


    </li>
    <!-- <script>
        //   $('.openModal').click(function(){
        //       var id = $(this).attr('data-id');
        //       $('#delete_popup').modal('show');

        //   });

        $(".passingID").click(function() {
            var ids = $(this).attr('data-id');
            $("#idsupp").val(ids);
            $('#delete_popup').modal('show');
        });
    </script> -->

<?php } ?>