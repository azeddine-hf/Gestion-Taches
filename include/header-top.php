    <header id="page-topbar">
        <div class="navbar-header">
            <div class="d-flex">
                <!-- LOGO
            <div class="navbar-brand-box">
                <a href="index.html" class="logo logo-dark">
                    <span class="logo-sm">
                        <img src="assets/images/logo-sm1.png" alt="" height="40">
                    </span>
                    <span class="logo-lg">
                        <img src="assets/images/logo-dark1.png" alt="" height="35">
                    </span>
                </a>

                <a href="index.html" class="logo logo-light">
                    <span class="-sm">
                        <img src="assets/images/logo-sm1.png" alt="" height="40">
                    </span>
                    <span class="logo-lg">
                        <img src="assets/images/logo-light1.png" alt="" height="35">
                    </span>
                </a>
            </div> -->

                <button type="button" class="btn btn-sm px-3 font-size-16 header-item waves-effect vertical-menu-btn">
                    <i class="fa fa-fw fa-bars"></i>
                </button>

                <!-- App Search-->
                <form class="app-search d-none d-lg-block">
                    <div class="position-relative">
                        <input type="text" class="form-control" placeholder="Search...">
                        <span class="uil-search"></span>
                    </div>
                </form>
            </div>
            <div class="d-flex">

                <div class="dropdown d-inline-block d-lg-none ms-2">
                    <button type="button" class="btn header-item noti-icon waves-effect" id="page-header-search-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="uil-search"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0" aria-labelledby="page-header-search-dropdown">

                        <form class="p-3">
                            <div class="m-0">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Search ..." aria-label="Recipient's username">
                                    <div class="input-group-append">
                                        <button class="btn btn-primary" type="submit"><i class="mdi mdi-magnify"></i></button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="dropdown d-none d-lg-inline-block ms-1">
                    <button type="button" class="btn header-item noti-icon waves-effect" data-bs-toggle="fullscreen">
                        <i class="uil-minus-path"></i>
                    </button>
                </div>

                <div class="dropdown d-inline-block">
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



                  
                    $count = "SELECT COUNT(*) as 'nbr_msg' FROM chat_contact Where status_msg is  NULL AND last_msg=Message  AND Destination_email='" . $_SESSION['user'] . "' ";
                    $res_nutif2 = $connection->query($count);
                    $row30 = mysqli_fetch_assoc($res_nutif2);
                    ?>
                    <button type="button" class="btn header-item noti-icon waves-effect" id="page-header-notifications-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="uil-bell"></i>
                        <div id="loadnewnumber">

                        </div>
                        
                    </button>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0" aria-labelledby="page-header-notifications-dropdown">
                        <div class="p-3">
                            <div class="row align-items-center">
                                <div class="col">
                                    <h5 class="m-0 font-size-16"> Notifications </h5>
                                </div>

                            </div>
                        </div>
                        <div id="load2aab" data-simplebar style="max-height: 230px;">
                            

                        </div>

                    </div>
                </div>

                <div class="dropdown d-inline-block">
                    <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img class="rounded-circle header-profile-user" src="<?php echo $_SESSION['img'] ?>" alt="Header Avatar">
                        <span class="d-none d-xl-inline-block ms-1 fw-medium font-size-15"><?php echo $_SESSION['nom']; ?></span>
                        <i class="uil-angle-down d-none d-xl-inline-block font-size-15"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-end">
                        <!-- item-->
                        <a class="dropdown-item" href="contacts-profile.php?id=<?php echo $_SESSION['id'] ?>" class="btn btn-outline-light text-truncate"><i class="uil uil-user-circle font-size-18 align-middle text-muted me-1"></i> <span class="align-middle">Voir le profil</span></a>
                        <a class="dropdown-item d-block btn  noti-icon right-bar-toggle waves-effect"><i class="uil uil-cog font-size-18 align-middle me-1 text-muted"></i> <span class="align-middle">Réglages</span></a>

                        <form action="include/logout.php" method="POST">
                            <button class="dropdown-item text-danger" name="logout_btn"><i class="uil uil-sign-out-alt font-size-18 align-middle me-1 text-danger  "></i> <span class="align-middle">Déconnecté</span></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </header>
   