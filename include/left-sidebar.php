           <!-- ========== Left Sidebar Start ========== -->
           <div class="vertical-menu">

<!-- LOGO -->
<div class="navbar-brand-box">
    <a href="index.php" class="logo logo-dark">
        <span class="logo-sm">
            <img src="assets/images/logo-sm1.png" alt="" height="40">
        </span>
        <span class="logo-lg">
            <img src="assets/images/logo-dark1.png" alt="" height="35">
        </span>
    </a>

    <a href="index.php" class="logo logo-light">
        <span class="logo-sm">
            <img src="assets/images/logo-sm1.png" alt="" height="40">
        </span>
        <span class="logo-lg">
            <img src="assets/images/logo-light1.png" alt="" height="35">
        </span>
    </a>
</div>

<button type="button" class="btn btn-sm px-3 font-size-16 header-item waves-effect vertical-menu-btn">
    <i class="fa fa-fw fa-bars"></i>
</button>

<div data-simplebar class="sidebar-menu-scroll">

    <!--- Sidemenu -->
    <div id="sidebar-menu">
        <!-- Left Menu Start -->
        <ul class="metismenu list-unstyled" id="side-menu">
            <li class="menu-title">Menu</li>
            <?php 
            $email=$_SESSION['user'];
            $query = " SELECT * FROM login WHERE type='admin' AND email='$email'";
            $resry = $connection->query($query);
            if (mysqli_num_rows($resry)>0) {
                ?>
                
               

            <li>
                <a href="index.php">
                    <i class="uil-home-alt"></i><span class="badge rounded-pill bg-primary float-end">01</span>
                    <span>Dashboard</span>
                </a>
            </li>

            <li>
                <a href="javascript: void(0);" class="has-arrow waves-effect">
                    <i class="uil-users-alt"></i>
                    <span>Equipes</span>
                </a>
                <ul class="sub-menu" aria-expanded="false">
                    <li><a href="contacts-grid.php">Equipe Grid</a></li>
                    <li><a href="equipe-list.php">Equipe List</a></li>
                </ul>
            </li>
            <li>
                <a href="client.php" class="waves-effect">
                    <i class="uil-user-md"></i>
                    <span>Client</span>
                </a>
            </li>
            <li>
                <a href="project.php" class="waves-effect">
                    <i class="uil-briefcase"></i>
                    <span>Projet</span>
                </a>
            </li>
            <li>
                <a href="taches.php" class="waves-effect">
                    <i class="uil-crosshair-alt"></i>
                    <span>Les Tȃches</span>
                </a>
            </li>
            
            <li>
                <a href="calendar.php" class="waves-effect">
                    <i class="uil-calendar-alt"></i>
                    <span>Calendar</span>
                </a>
            </li>

            <li>
                <a href="chat.php" class=" waves-effect">
                    <i class="uil-comments-alt"></i>
                    <span class="badge rounded-pill bg-success float-end">direct</span>
                    <span>Chat</span>
                </a>
            </li>

            

            <li>
                <a href="javascript: void(0);" class="has-arrow waves-effect">
                    <i class="uil-invoice"></i>
                    <span>Invoices</span>
                </a>
                <ul class="sub-menu" aria-expanded="false">
                    <li><a href="invoices-list.php">Invoice List</a></li>
                    <li><a href="invoices-detail.php">Invoice Detail</a></li>
                </ul>
            </li>

           

           

            <?php
            }else{
                ?>
                <li>
                <a href="index.php">
                    <i class="uil-home-alt"></i><span class="badge rounded-pill bg-primary float-end">01</span>
                    <span>Dashboard</span>
                </a>
            </li>
 <li>
                <a href="client.php" class="waves-effect">
                    <i class="uil-user-md"></i>
                    <span>Client</span>
                </a>
            </li>
            <li>
                <a href="project.php" class="waves-effect">
                    <i class="uil-briefcase"></i>
                    <span>Projet</span>
                </a>
            </li>
            <li>
                <a href="taches.php" class="waves-effect">
                    <i class="uil-crosshair-alt"></i>
                    <span>Les Tȃches</span>
                </a>
            </li>
 <li>
                <a href="calendar.php" class="waves-effect">
                    <i class="uil-calendar-alt"></i>
                    <span>Calendar</span>
                </a>
            </li>

            <li>
                <a href="chat.php" class=" waves-effect">
                    <i class="uil-comments-alt"></i>
                    <span class="badge rounded-pill bg-success float-end">direct</span>
                    <span>Chat</span>
                </a>
            </li>
                <?php
            }
            
            ?>

          

        </ul>
    </div>
    <!-- Sidebar -->
</div>
</div>
<!-- Left Sidebar End -->