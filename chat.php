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
                                <h4 class="mb-0">Boîte de Message</h4>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                    <div class="col-12">
                        <div class="chat-leftsidebar card">
                            <div class="p-3 px-4">
                                <div class="d-flex align-items-start">
                                    <div class="flex-shrink-0 me-3 align-self-center">
                                        <img src="<?php echo $_SESSION['img'] ?>" class="avatar-xs rounded-circle" alt="">
                                    </div>

                                    <div class="flex-grow-1">
                                        <h5 class="font-size-16 mb-1"><span class="text-dark"><?php echo $_SESSION['nom']; ?> <i class="mdi mdi-circle text-success align-middle font-size-10 ms-1"></i></span></h5>
                                        <p class="text-muted mb-0">en ligne</p>
                                    </div>

                                    <div class="flex-shrink-0">
                                        <div class="dropdown chat-noti-dropdown">
                                            <button class="btn dropdown-toggle py-0" type="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="uil uil-ellipsis-h"></i>
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-end">
                                            <a class="dropdown-item" href="contacts-profile.php?id=<?php echo $_SESSION['id'] ?>" class="btn btn-outline-light text-truncate"><i class="uil uil-user-circle font-size-18 align-middle text-muted me-1"></i> <span class="align-middle">profil</span></a>
                                                <a class="dropdown-item" href="equipe-list.php"><i class="uil uil-edit font-size-18 align-middle text-muted me-1 "></i><span class="align-middle">Modifier</span></a>
                                                <?php
                                                $getadmin ="SELECT * from Login Where type='admin' AND email='".$_SESSION['user']."'";
                                                $resget = $connection->query($getadmin);
                                                if(mysqli_num_rows($resget) > 0){
                                                ?>
                                                <a class="dropdown-item" href="add_cont.php"><i class="uil uil-envelope-add font-size-18 align-middle text-muted me-1"></i><span class="align-middle">Ajouté Contact</span></a>
                                                <?php }?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>



                            <div class="pb-3 statumain">
                                <div class="chat-message-list" id="iWantToScrollHere" name="iWantToScrollHere" data-simplebar>


                                    <div class="p-4 border-top statumain1 ">
                                        <div>

                                            <h5 class="font-size-16 mb-3"><i class="uil uil-user me-1"></i> Equipe</h5>

                                            <ul class="list-unstyled chat-list statumain2">
                                                <div id="load">
                                                   
                                                </div>
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

    <!-- Right bar overlay-->
    <div class="rightbar-overlay"></div>

    <!-- Scripts -->
    <?php include('./include/scripts.inc.php') ?>
    <!-----------AJAX CODE EDIT--------->

    <!-- <script>
        $(".passingID").click(function() {
            var ids = $(this).attr('data-id');
            var nom = $(this).attr('data-nom');
            $("#idkl").val(ids);
            $("#nomeq").html(nom);
            $('#myModal').modal('show');
        });
    </> -->
    <script>
        $(document).ready(function() {
            setTimeout(function() {
                $('#load').load("test2.php").fadeIn("slow");
            }, 500);
            setInterval(function() {
                $('#load').load("test2.php").fadeIn("slow");
            }, 5000);


        });
    </script>
    
</body>

<!-- Mirrored from themesbrand.com/minible/layouts/chat.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 31 May 2022 13:16:02 GMT -->

</html>