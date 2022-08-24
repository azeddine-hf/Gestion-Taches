<?php
include('include/connect.php');
include('include/security.php');
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

                              $nutif = "SELECT e.*,c.* from chat_contact c ,equipe e where status_msg is  NULL AND last_msg=Message AND Destination_email='" . $_SESSION['user'] . "' AND c.Sender_email=e.Email GROUP by Id_chat";
                              $res_nutif = $connection->query($nutif);
                              if(mysqli_num_rows($res_nutif) > 0){
                            while ($row_nutif = mysqli_fetch_assoc($res_nutif)) {
                                $decryption_iv = '1234567891011121';
                                $decryption_key = "W3docs";
                                $options   = 0;
                                $ciphering = "AES-128-CTR";
                                $last_msg = openssl_decrypt($row_nutif['last_msg'], $ciphering, $decryption_key, $options, $decryption_iv);
                            ?>
                                <a href="chat_contact.php?ID_equipe=<?php echo $row_nutif['ID'] ?>" class="text-reset notification-item">
                                    <div class="d-flex align-items-start">
                                        <div class="flex-shrink-0 me-3">
                                            <div class="avatar-xs">
                                                <img src="<?php echo $row_nutif['photo'] ?>" class="avatar-xs rounded-circle me-2">
                                            </div>
                                        </div>
                                        <div class="flex-grow-1">
                                            <h6 class="mb-1"><?php echo $row_nutif['Nom'] . ' ' . $row_nutif['Prenom'] ?></h6>
                                            <div class="font-size-12">
                                                <p class="mb-1 fw-bold text-black-50"><?php echo $last_msg ?><span class="badge bg-danger float-end">nouveau message</span></p>
                                                <p class="mb-0"><i class="mdi mdi-clock-outline"></i>
                                                    <?php
                                                    date_default_timezone_set('Europe/Madrid');
                                                    echo facebook_time_ago($row_nutif['send_date']);

                                                    ?>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </a><?php } }else echo '<b class="badge bg-danger w-100">Aucune notification</b>'?>