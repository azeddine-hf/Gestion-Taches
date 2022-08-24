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

                    <div class="" id="" style="backdrop-filter: blur(8px);">
                        <div class="">
                            <div class="">
                                <!-- Modal body -->

                                <!--------- ------------>

                                <?php
                                

                                $email2 = $_SESSION['user'];
                                $ide = $_REQUEST['ID_equipe'];
                                @$qury2 = "SELECT DISTINCT e.*,MAX(Id_chat) as 'id_chat' from equipe e,chat_contact c  where c.is_deleted=0  AND Destination_email=e.Email ID=" . $_REQUEST['ID_equipe'] . "";
                                $result2 = $connection->query($qury2);
                                @$row2 = mysqli_fetch_array($result2);
                                if ((isset($_GET['ID_equipe']))) {
                                    $query5 = "UPDATE chat_contact SET status_msg='vu' WHERE Destination_email='$email2' AND last_msg=Message AND Id_chat=" . $row2['id_chat'] . "";
                                    $connection->query($query5);
                                }
                                if (isset($_POST['sub_deletechat'])) {
                                    @$id_chat = $_POST['chatsup'];

                                    $qury1 = "UPDATE chat_contact SET  is_deleted=1,delete_date=SYSDATE() WHERE Id_chat=" . $id_chat . "";
                                    $resultq2 = $connection->query($qury1);
                                    if ($resultq2) {

                                        echo "<meta http-equiv=\"refresh\" content=\"0;URL=./chat_contact.php?ID_equipe=$ide\">";
                                        // header("Refresh:2; ../taches.php", true, 303);
                                    }
                                }

                                ?>
                                <input type="hidden" name="ide" id="ide" value="<?php echo $_REQUEST['ID_equipe']; ?>">
                                <form class="needs-validation" action="./auth/code.php" method="POST" novalidate>
                                    <input type="hidden" value="" name="idkl" id="idkl">
                                    <div class="w-100 user-chat mt-4 mt-sm-0 ms-lg-1 menu2">
                                        <div class="card boxdown0">
                                            <div class="p-3 px-lg-4 border-bottom">
                                                <div class="row">
                                                    <?php
                                                    $ide = $_REQUEST['ID_equipe'];
                                                    @$qury2 = "select * from equipe  where ID=" . $_REQUEST['ID_equipe'] . "";
                                                    $result2 = $connection->query($qury2);
                                                    @$row2 = mysqli_fetch_array($result2);
                                                    ?>
                                                    <input type="hidden" name="ide" id="ide" value="<?php echo $_REQUEST['ID_equipe']; ?>">
                                                    <div class="col-md-4 col-6">
                                                        <h5 class="font-size-16 mb-1 text-truncate" id="nomeq"><a href="#" class="text-dark"></a></h5>
                                                        <p class="text-muted text-truncate mb-0"><i class="uil uil-users-alt me-1"></i><?php echo $row2['Nom'] ?></p>
                                                    </div>
                                                    <div class="col-md-8 col-6">
                                                        <ul class="list-inline user-chat-nav text-end mb-0">
                                                            <li class="list-inline-item">
                                                                <div class="dropdown">
                                                                    <button class="btn nav-btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                        <i class="uil uil-search"></i>
                                                                    </button>
                                                                    <div class="dropdown-menu dropdown-menu-end dropdown-menu-md">
                                                                        <form class="p-2">
                                                                            <div>
                                                                                <input type="text" class="form-control rounded" placeholder="Search...">
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </li>


                                                            <li class="list-inline-item">
                                                                <div class="dropdown">
                                                                    <button class="btn nav-btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                        <i class="uil uil-ellipsis-h"></i>
                                                                    </button>
                                                                    <div class="dropdown-menu dropdown-menu-end">
                                                                        <a class="dropdown-item" href="#">Profile</a>
                                                                        <a class="dropdown-item" href="#">Archive</a>
                                                                        <a class="dropdown-item" href="#">Muted</a>
                                                                        <a class="dropdown-item" href="#">Delete</a>
                                                                    </div>
                                                                </div>
                                                            </li>

                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>

                                            <div>
                                                <div class="chat-conversation py-3">
                                                    <ul class="list-unstyled mb-0 chat-conversation-message px-3 simplebar-content-wrapper" data-simplebar id="boxdown2">
                                                        <li class="chat-day-title">
                                                            <div class="title">Today </div>
                                                        </li>
                                                        <div id="load">


                                                        </div>
                                                    </ul>
                                                </div>
                                            </div>

                                            <div class="p-3 chat-input-section">
                                                <div class="row">
                                                    <div class="col">
                                                        <div class="position-relative">
                                                            <input type="text" class="form-control chat-input rounded" placeholder="Enter Message..." name="messagef">

                                                        </div>
                                                    </div>
                                                    <div class="col-auto">
                                                        <button type="submit" class="btn btn-primary chat-send w-md waves-effect waves-light" name="sub_message"><span class="d-none d-sm-inline-block me-2">Envoyer</span> <i class="mdi mdi-send float-end"></i></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>



                                <!-- end card -->
                                <!-- end col -->
                                <!-------------End Chat------------>
                                <!-- Modal footer -->
                                <hr>
                                <div class="d-grid gap-2 d-md-flex justify-content-md-end ">
                                    <button onclick="history.back()" class="btn btn-warning">Retour</button>
                                </div>
                            </div>

                        </div>


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
    <!-- The Modal chat -->

    </div>
    </div>
    </div>

    <!------------Delete modal chat---------->
    <!-- Modal -->
    <!-- <div class="modal fade" id="delete_popup" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="backdrop-filter: blur(8px);">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-danger" id="exampleModalLabel">Supprimer Message !</h5>
                    <button type="button" class="close text-danger border-0 bg-white font-size-20" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body text-center">
                    <form action="" method="POST">
                        <input type="hidden" class="form-control" id="idsupp" name="chatsup">
                        <i class="uil-annoyed text-danger border-0 " style="font-size:100px ;"></i><br>
                        <b class="text-danger">Confirmer La Supprission ?</b>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-info" data-bs-dismiss="modal">Annulé</button>
                    <button type="submit" class="btn btn-danger " name="sub_deletechat">Supprimer</button>
                    </form>
                </div>
            </div>
        </div>
    </div> -->
    <!------------End Delete modal chat------->
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
    </script> -->
    <script>
        $(document).ready(function() {
            var ide = document.getElementById("ide").value;
            setTimeout(function() {
                $('#load').load("test.php?ID_equipe=" + ide + "").fadeIn("slow");
            }, 500);
            setTimeout(function() {
                $('.simplebar-content-wrapper').scrollTop(5000);
            }, 700);
            setInterval(function() {
                $('#load').load("test.php?ID_equipe=" + ide + "").fadeIn("slow");
            }, 5500);


        });
    </script>



</body>


</html>