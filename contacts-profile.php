<!doctype html>
<html lang="en">


<!-- Mirrored from themesbrand.com/minible/layouts/contacts-profile.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 31 May 2022 13:16:31 GMT -->
<?php
include('include/security.php');
include './include/connect.php';
@$id = $_REQUEST['id'];
$qury2 = "SELECT * FROM equipe WHERE ID = $id";
$resry2 = mysqli_query($connection, $qury2);
$row2 = mysqli_fetch_assoc($resry2);
$pageTitle = $row2['Nom'] . ' ' . $row2['Prenom'];
include "./include/head-link.php";
if (isset($_GET['ID_task']) && isset($_GET['status'])) {
    $id_tsk = $_GET['ID_task'];
    $stats_tsk = $_GET['status'];
    $id_new = $_GET['ID'];
    $qury = "UPDATE task SET status='" . $stats_tsk . "' WHERE ID_task=" . $id_tsk . " ";
    $res_tsk = $connection->query($qury);
    echo "<meta http-equiv=\"refresh\" content=\"0;URL=contacts-profile.php?id=" . $id_new . "\">";

    // header("Location: );
}
if (isset($_GET['ID_task']) && isset($_GET['property'])) {
    $id_tsk = $_GET['ID_task'];
    $prop_tsk = $_GET['property'];
    $id_new = $_GET['ID'];
    $qury = "UPDATE task SET property='" . $prop_tsk . "' WHERE ID_task=" . $id_tsk . " ";
    $res_tsk = $connection->query($qury);
    echo "<meta http-equiv=\"refresh\" content=\"0;URL=contacts-profile.php?id=" . $id_new . "\">";

    // header("Location: contacts-profile.php?id=".$id_new."");

}


?>


<body>

    <!-- <body data-layout="horizontal" data-topbar="colored"> -->

    <!-- Begin page -->
    <div id="layout-wrapper">


        <?php include "./include/header-top.php" ?>
        <!-- Left Sidebar  -->
        <?php include "./include/left-sidebar.php" ?>
        <!-- Left Sidebar End -->



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
                                <h4 class="mb-0">Profile</h4>

                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Contacts</a></li>
                                        <li class="breadcrumb-item active">Profile</li>
                                    </ol>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- end page title -->
                    <?php

                    $qury = "SELECT * FROM equipe e,login l WHERE e.ID = $id AND e.email=l.email";
                    $resry = mysqli_query($connection, $qury);
                    $row = mysqli_fetch_assoc($resry);
                    ?>
                    <div class="row mb-4">
                        <div class="col-xl-3">
                            <div class="card h-100">
                                <div class="card-body">
                                    <div class="text-center">
                                        <div class="dropdown float-end">
                                            <a class="text-body dropdown-toggle font-size-18" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true">
                                                <i class="uil uil-ellipsis-v"></i>
                                            </a>

                                            <div class="dropdown-menu dropdown-menu-end">
                                                <a class="dropdown-item" href="#">Edit</a>
                                                <a class="dropdown-item" href="#">Action</a>
                                                <a class="dropdown-item" href="#">Remove</a>
                                            </div>
                                        </div>
                                        <div class="clearfix"></div>
                                        <div>
                                            <img src=<?php echo $row['photo']; ?> alt="" class="avatar-lg rounded-circle img-thumbnail">
                                        </div>
                                        <h5 class="mt-3 mb-1"><?php echo $row['Nom'] . ' ' . $row['Prenom']; ?></h5>
                                        <p class="text-muted"><?php echo $row['jobe']; ?></p>
                                        <?php
                                        $qury20 = "SELECT * from login  WHERE email = '" . $_SESSION['user'] . "' AND type='admin'";
                                        $resry20 = mysqli_query($connection, $qury20);
                                        if (mysqli_num_rows($resry20) > 0) {
                                        ?>
                                            <span class="d-none d-sm-block badge rounded-pill bg-gradient-danger" style="font-size: 14px;">Dernière Connexion</span>
                                            <p class="badge rounded-pill bg-gradient-success" style="font-size: 17px;"><?php echo $row['last_seen'];
                                                                                                                    } ?></p>

                                            <div class="mt-4">
                                                <button type="button" class="btn btn-light btn-sm"><i class="uil uil-envelope-alt me-2"></i> Message</button>
                                            </div>
                                    </div>

                                    <hr class="my-4">

                                    <div class="text-muted">
                                        <div class="table-responsive mt-4">
                                            <div>
                                                <p class="mb-1">Name :</p>
                                                <h5 class="font-size-16"><?php echo $row['Nom'] . ' ' . $row['Prenom']; ?></h5>
                                            </div>
                                            <div class="mt-4">
                                                <p class="mb-1">Mobile :</p>
                                                <h5 class="font-size-16"><?php echo $row['Mobile']; ?></h5>
                                            </div>
                                            <div class="mt-4">
                                                <p class="mb-1">Email :</p>
                                                <h5 class="font-size-16"><?php echo $row['Email']; ?></h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-9    ">
                            <div class="card mb-0">
                                <!-- Nav tabs -->
                                <ul class="nav nav-tabs nav-tabs-custom nav-justified" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" data-bs-toggle="tab" href="#about" role="tab">
                                            <i class="uil-crosshair-alt font-size-20"></i>
                                            <span class="d-none d-sm-block">Tâches en attente...</span>
                                        </a>
                                    </li>

                                </ul>
                                <!-- Tab content -->
                                <div class="tab-content p-4">
                                    <div class="tab-pane active" id="about" role="tabpanel">
                                        <div>

                                            <div>
                                                <h5 class="font-size-16 mb-4">Les Taches !</h5>

                                                <div class="table-responsive mb-4">
                                                    <table class="table table-centered table-nowrap mb-0">
                                                        <thead>
                                                            <tr>
                                                                <td style="display: none;"></td>
                                                                <th scope="col">Description</th>
                                                                <th scope="col">Projet</th>
                                                                <th scope="col">Date Début</th>
                                                                <th scope="col">Date Fin</th>
                                                                <th scope="col" style="width: 180px; text-align: center;">Status</th>
                                                                <th scope="col" style="width: 130px; text-align: center;">Proprieté</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                            $qury = "SELECT * FROM task t ,projet p,equipe e WHERE t.ID_projet = p.Id AND e.ID=t.ID_equipe AND e.ID=$id AND t.is_delete=0";
                                                            $resq = $connection->query($qury);
                                                            if (mysqli_num_rows($resq) > 0) {
                                                                while ($row = mysqli_fetch_assoc($resq)) {
                                                            ?>
                                                                    <tr>
                                                                        <td style="display: none;"><?php echo $row['ID_task'] ?></td>
                                                                        <td><?php echo $row['desc_task'] ?></td>
                                                                        <td><?php echo $row['title_projet'] ?></td>
                                                                        <td><?php echo $row['date_start'] ?></td>
                                                                        <td><?php echo $row['date_end'] ?></td>
                                                                        <td>
                                                                            <select class="form-select-sm rounded-pill form-select text-<?php

                                                                                                                                        if ($row['status'] === "en cours")
                                                                                                                                            echo 'warning border-warning';
                                                                                                                                        else if ($row['status'] === 'Annulé')
                                                                                                                                            echo 'danger border-danger';
                                                                                                                                        else if ($row['status'] === 'terminé')
                                                                                                                                            echo 'success border-success';
                                                                                                                                        else
                                                                                                                                            echo 'info border-info';
                                                                                                                                        ?> fw-bold" name="select_status33" id="select_status3" onchange="status_update(this.options[this.selectedIndex].value,<?php echo $row['ID_task'] ?>,<?php echo $row['ID'] ?>)">
                                                                                <option value="<?php echo $row['status'] ?>" selected style="display: none;"><?php echo $row['status'] ?> </option>
                                                                                <option value="Pas commencé" class="text-info fw-bold">Pas commencé</option>
                                                                                <option value="en cours" class="text-warning fw-bold">en cours</option>
                                                                                <option value="Annulé" class="text-danger fw-bold">Annulé</option>
                                                                                <option value="terminé" class="text-success fw-bold">terminé</option>
                                                                            </select>
                                                                        </td>
                                                                        <td>
                                                                            <select class="form-select-sm rounded-pill form-select text-<?php

                                                                                                                                        if ($row['property'] === "important")
                                                                                                                                            echo 'warning border-warning';
                                                                                                                                        else if ($row['property'] === 'urgent')
                                                                                                                                            echo 'danger border-danger';
                                                                                                                                        else if ($row['property'] === 'moyen')
                                                                                                                                            echo 'info border-info';
                                                                                                                                        else
                                                                                                                                            echo 'secondary border-secondary';
                                                                                                                                        ?> fw-bold" name="select_proprty1" id="select_property3" onchange="status_update2(this.options[this.selectedIndex].value,<?php echo $row['ID_task'] ?>,<?php echo $row['ID'] ?>)">
                                                                                <option class="fw-bold" value="<?php echo $row['property'] ?>" selected style="display: none;"><?php echo $row['property'] ?> </option>
                                                                                <option value="important" class="text-warning fw-bold">important</option>
                                                                                <option value="urgent" class="text-danger fw-bold">urgent</option>
                                                                                <option value="moyen" class="text-info fw-bold">moyen</option>
                                                                                <option value="faible" class="text-secondary fw-bold">faible</option>

                                                                            </select>
                                                                        </td>

                                                                    </tr>
                                                                <?php
                                                                }
                                                            } else {
                                                                ?><td colspan="6" style="text-align: center; font-size: 20px;font-weight: bold;"> Aucune Tache ... ?</td><?php
                                                                                                                                                                        }

                                                                                                                                                                            ?>


                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end row -->

                </div> <!-- container-fluid -->
            </div>
            <!-- End Page-content -->


            <!--footer Rights-->
            <?php include "./include/footer.inc.php" ?>
            <!--end footer Rights-->
        </div>
        <!-- end main content-->

    </div>
    <!-- END layout-wrapper -->



    <!--Right sidebar setting-->
    <?php include "./include/setting-right.bar.php" ?>
    <!--Right sidebar setting-->

    <!-- scripts -->
    <?php include "./include/scripts.inc.php" ?>
    <!------------------status update on change ---------------->
    <script>
        //func 1
        function status_update(value, ID_task, ID) {
            let url = "http://localhost/gestion-taches/contacts-profile.php?id=" + ID + "";
            window.location.href = url + "&ID_task=" + ID_task + "&status=" + value + "&ID=" + ID;
        }
        //func 2
        function status_update2(value, ID_task, ID) {
            let url = "http://localhost/gestion-taches/contacts-profile.php?id=" + ID + "";
            window.location.href = url + "&ID_task=" + ID_task + "&property=" + value + "&ID=" + ID;
        }
    </script>

</body>

<!-- Mirrored from themesbrand.com/minible/layouts/contacts-profile.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 31 May 2022 13:16:31 GMT -->

</html>