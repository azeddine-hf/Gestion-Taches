<?php
$pageTitle = 'Chat';

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
$email2 = $_SESSION['user'];
$qury = "SELECT  l.active,c.*, e.* from equipe e , chat_contact c,login l where is_deleted=0 and e.Email != '$email2' and ((c.Sender_email='$email2' and c.Destination_email=e.Email) or (c.Destination_email='$email2' and c.Sender_email=e.Email)) AND c.last_msg=c.Message AND l.email=e.Email order by c.send_date desc,c.Message,c.last_msg";
$resq = $connection->query($qury);

while ($row = mysqli_fetch_assoc($resq)) {
    $decryption_iv = '1234567891011121';
    $decryption_key = "W3docs";

    // hada an3ayto lih
    $msg = openssl_decrypt($row['Message'], $ciphering, $decryption_key, $options, $decryption_iv);
    $last_msg = openssl_decrypt($row['last_msg'], $ciphering, $decryption_key, $options, $decryption_iv);
?>
    <input type="hidden" value="<?php echo $row['Id_chat'] ?>" name="idchat">
    <li class="unread w-100 waves-effect status_msg" id="equipe_one">
        <input type="hidden" name="id_e8" id='idjdid'>
        <button class="col-12 text-start border-0 bg-white" onclick="clickMe()">
            <a href="chat_contact.php?ID_equipe=<?php echo $row['ID'] ?>">
                <?php if ((isset($_GET['ID_equipe']))) {
                    $query5 = "UPDATE chat_contact SET status_msg='vu' WHERE Destination_email='$email2' AND last_msg=Message AND Id_chat=" . $row['Id_chat'] . "";
                    $connection->query($query5);
                } ?>

                <div class="d-flex align-items-start">
                    <div class="flex-shrink-0 me-3 align-self-center">
                        <div class="user-img online">
                            <div class="flex-shrink-0 me-3 align-self-center">
                                <img src="<?php echo $row['photo'] ?>" class="avatar-xs rounded-circle" alt="">
                            </div>
                            <?php
                            if ($row['active'] == 'online') {
                            ?>
                                <i class="badge bg-success">en ligne</i>
                            <?php }else{
                                ?><i class="badge bg-danger">hors ligne</i><?php
                            } ?>
                        </div>
                    </div>
                    <div class="flex-grow-1 overflow-hidden">

                        <h5 class="text-truncate font-size-14 mb-1"><?php echo $row['Prenom'] . ' ' . $row['Nom'] ?><?php
                        if ($row['active'] == 'online') {
                            ?>
                        <i class="mdi mdi-circle text-success align-middle font-size-10 ms-1"></i><?php
                    }else{
                                ?><i class="mdi mdi-circle text-danger align-middle font-size-10 ms-1"><?php
                            } ?></i>
                    </h5>

                        <p <?php
                            if ($row['Destination_email'] == $email2  && $row['status_msg'] == 'vu' && $row['Message'] == $row['last_msg']) {
                                echo 'class="text-muted uil uil-check "';
                            ?><?php } else if ($row['Sender_email'] == $email2  && $row['Message'] == $row['last_msg']) {
                                echo 'class="text-muted uil uil-check "';
                            } else {
                                echo 'class="font-weight-bold"';
                            } ?>><?php echo '  ' . $last_msg ?></p>
                    </div>
                    <?php
                    if ($row['Destination_email'] == $email2  && $row['status_msg'] == null && $row['Sender_email'] != $email2) {
                    ?>
                        <div class="flex-shrink-0">
                            <div class="font-size-11"></div>
                            <div class="unread-message">
                                <i class="badge bg-danger rounded-pill" id="idval">Message No Lu</i>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </a>
        </button>
    </li>
<?php }

?>