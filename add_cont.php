<!doctype html>
<html lang="en">
<?php include('./include/security.php');
$pageTitle = 'Chat';
include './include/head-link.php';
include('./include/connect.php');
?>

<body>

    <!-- <body data-layout="horizontal" data-topbar="colored"> -->

    <!-- Begin page -->
    <div id="layout-wrapper">
        <?php include "./include/header-top.php" ?>
        <!-- end header-top-->
        <!--left sidebar-->
        <?php include "./include/left-sidebar.php" ?>

        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">

            <div class="page-content">
                <div class="container-fluid">

                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box d-flex align-items-center justify-content-between">
                                <h4 class="mb-0">Choisi Un Contact</h4>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                    <div class="col-12">
                        <div class="chat-leftsidebar card">
                            <div class="pb-3 statumain">
                                <div data-simplebar>
                                    <div class="p-4 border-top statumain1 ">
                                        <div>
                                            <h5 class="font-size-16 mb-3"><i class="uil uil-user me-1"></i> Equipe</h5>
                                            <ul class="list-unstyled chat-list statumain2">
                                                <?php
                                                $qury = "SELECT  l.active,e.* FROM equipe e,login l Where l.email=e.Email AND  e.ID!=" . $_SESSION['id'] . "";
                                                $resq = $connection->query($qury);

                                                while ($row = mysqli_fetch_assoc($resq)) {
                                                ?>
                                                    <li class="unread w-100 waves-effect status_msg" id="equipe_one">
                                                        <input type="hidden" name="id_e8" id='idjdid'>
                                                        <button class="col-12 text-start border-0 bg-white" onclick="clickMe()">
                                                            <a href="chat_contact.php?ID_equipe=<?php echo $row['ID'] ?>">
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
                                                                            <?php } else {
                                                                            ?><i class="badge bg-danger">hors ligne</i><?php
                                                                                                                    } ?>
                                                                        </div>
                                                                    </div>
                                                                    <div class="flex-grow-1 overflow-hidden">

                                                                        <h5 class="text-truncate font-size-14 mb-1"><?php echo $row['Prenom'] . ' ' . $row['Nom'] ?><?php
                                                                                                                                                                    if ($row['active'] == 'online') {
                                                                                                                                                                    ?>
                                                                            <i class="mdi mdi-circle text-success align-middle font-size-10 ms-1"></i><?php
                                                                                                                                                                    } else {
                                                                                                                                                        ?><i class="mdi mdi-circle text-danger align-middle font-size-10 ms-1"><?php
                                                                                                                                                                    } ?></i>
                                                                        </h5>


                                                                    </div>

                                                                </div>
                                                            </a>
                                                        </button>
                                                    </li>
                                                <?php } ?>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <!-- end chat-leftsidebar -->

                    </div>
                    <!-- End d-lg-flex  -->

                </div> <!-- container-fluid -->
            </div>
            <!-- End Page-content -->
            <?php include('./include/footer.inc.php') ?>
        </div>
        <!-- end main content-->

    </div>
    <!-- END layout-wrapper -->

    </div>
    </div>
    </div>
    <!---------------------- End Modal Add client -------------------->

    <!-- Right bar overlay-->
    <div class="rightbar-overlay"></div>

    <!-- Scripts -->
    <?php include('./include/scripts.inc.php') ?>


</body>

<!-- Mirrored from themesbrand.com/minible/layouts/chat.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 31 May 2022 13:16:02 GMT -->

</html>