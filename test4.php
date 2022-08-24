<?php 
include('include/connect.php');
include('include/security.php');

$count = "SELECT COUNT(*) as 'nbr_msg' FROM chat_contact Where status_msg is  NULL AND last_msg=Message  AND Destination_email='" . $_SESSION['user'] . "' ";
                    $res_nutif2 = $connection->query($count);
                    $row30 = mysqli_fetch_assoc($res_nutif2); ?>
<span class="badge bg-danger rounded-pill"><?php echo $row30['nbr_msg'] ?></span>