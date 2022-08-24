<!doctype html>
<html lang="en">
<!-- <meta http-equiv="Content-Type" content="text/html; charset=windows-1252" />  -->
<?php
include('include/security.php');
$pageTitle = 'Taches List';
include('include/connect.php');
include('include/head-link.php');



?>


<body>
    <!-----------------------ADD tach---------------------->
    <!-- The Modal -->
    <div class="modal fade" id="myModal" style="backdrop-filter: blur(8px);">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title text-primary">Ajouté Tache :</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <!--------- Input Pop Up Add tach------------>
                    <div class="col-xl-12">
                        <div class="card-body">
                            <!----------Form Pop Up ---------->
                            <form class="needs-validation" method="POST" action="./auth/code.php" id="formtache" enctype='multipart/form-data' novalidate>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label class="form-label" for="client">Description </label>
                                            <textarea name="txt_desc" class="form-control" id="txt_descr" placeholder="Tache Message"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <!--------------Drop Down Projet ----------->
                                            <div class="form-group">
                                                <label class="form-label" for="projet2">Projet</label>
                                                <select class="form-control form-select" id="projet2" name="projet_select">
                                                    <option selected disabled="disabled" class="text-secondary" value="NULL">Choisi Un Projet</option>
                                                    <?php
                                                    $qury = "SELECT * FROM  projet WHERE is_delete = 0 ";
                                                    $resry = $connection->query($qury);
                                                    if ($resry) {
                                                        while ($row = mysqli_fetch_assoc($resry)) {
                                                            $projet = $row['title_projet'];
                                                            $id = $row['Id'];
                                                            echo '<option value="' . $id . '">' . $projet . '</option>';
                                                        }
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                            <!--------------End Drop Down projet ----------->
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <!--------------Drop Down member ----------->
                                            <div class="form-group">
                                                <label class="form-label" for="member2">Member</label>
                                                <select class="form-control form-select" id="member2" name="member_select" required>
                                                    <option selected disabled="disabled" class="text-secondary" value="">Choisi Un member</option>
                                                    <?php
                                                    $qury = "SELECT * FROM  equipe WHERE is_delete = 0 ";
                                                    $resry = $connection->query($qury);
                                                    if ($resry) {
                                                        while ($row = mysqli_fetch_assoc($resry)) {
                                                            $member = $row['Nom'] . ' ' . $row['Prenom'];
                                                            $id = $row['ID'];
                                                            echo '<option value="' . $id . '">' . $member . '</option>';
                                                        }
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                            <!--------------End Drop Down member ----------->
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="validationCustom03">Date de Début</label>
                                            <!-------Date Picker------->
                                            <input id="date_picker1" class="form-control" placeholder="Date Début" name="date_start" type="text" required />
                                            <span id="startDateSelected"></span>
                                        </div>
                                        <!----------------------->
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="validationCustom04">Date Limite</label>
                                            <input id="date_picker2" class="form-control" placeholder="Date Fin" name="date_end" type="tewt" required />
                                            <span id="startDateSelected"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label" for="status_s">Status</label>
                                            <select class="form-control form-select" id="status_s" name="status_select" required>
                                                <option selected disabled="disabled" class="text-secondary" value="">Choisi Un Status</option>
                                                <option value="Pas commencé" class="bg-soft-info">Pas commencé</option>
                                                <option value="en cours" class="bg-soft-warning">en cours</option>
                                                <option value="Annulé" class="bg-soft-danger">Annulé</option>
                                                <option value="terminé" class="bg-soft-success">terminé</option>

                                            </select>
                                        </div>

                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label" for="proprty">Proprieté</label>
                                            <select class="form-control form-select " id="proprty" name="prop_select" required>
                                                <option selected disabled="disabled" class="text-secondary" value="">Choisi Un Proprieté</option>
                                                <option value="urgent" class="bg-soft-danger">urgent</option>
                                                <option value="important" class="bg-soft-warning">important</option>
                                                <option value="moyen" class="bg-soft-info">moyen</option>
                                                <option value="faible" class="bg-soft-dark">faible</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                        </div>
                        <button class="btn btn-primary " id="" type="submit" name="sub_addtache">Ajouté Tache</button>
                        </form>

                    </div>
                    <!-- end card -->

                </div> <!-- end col -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                </div>
                <!-------------End Input Add client------------>
                <!-- Modal footer -->

            </div>

        </div>


    </div>
    <!--------------------END ADD tache---------------------->

    <!-- <body data-layout="horizontal" data-topbar="colored"> -->

    <!-- Begin page -->
    <div id="layout-wrapper">
        <!-- Left Sidebar  -->
        <?php
        include "./include/header-top.php";
        include "./include/left-sidebar.php" ?>
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
                                <h4 class="mb-0">Les Taches</h4>

                                <!-- <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Contacts</a></li>
                                            <li class="breadcrumb-item active">User List</li>
                                        </ol>
                                    </div> -->

                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    <?php
                                    $email2 = $_SESSION['user'];
                                    $query110 = " SELECT * FROM login WHERE type='admin' AND email='$email2'";
                                    $resry110 = $connection->query($query110);
                                    if (mysqli_num_rows($resry110) > 0) {
                                    ?>
                                        <div class="col-md-4">
                                            <button type="button" class="btn btn-success waves-effect waves-light mb-3" data-bs-toggle="modal" data-bs-target="#myModal"><i class="mdi mdi-plus me-1"></i> Ajouté Tache</button>
                                        </div>
                                    <?php } ?>
                                    <!-- end row -->
                                    <div class="table-responsive-xl ">
                                        <table id="datatable" class="table table-centered  table-nowrap mb-0">
                                            <thead>
                                                <tr>
                                                    <td style="display: none;"></td>
                                                    <th style="width: 200px;">Description</th>
                                                    <th>Projet</th>
                                                    <th style="display: none;">projet id</th>
                                                    <th style="display: none;">member id</th>
                                                    <th>Member</th>
                                                    <th>Date Début</th>
                                                    <th>Date Fin</th>
                                                    <th>Status</th>
                                                    <th>Proprieté</th>
                                                    
                                                    <?php if(mysqli_num_rows($resry110) > 0){
                                                    echo'<th>Action</th>';
                                                    }else{ ?>
                                                    <th style="display:none;"></th>
                                                    <?php } ?>
                                                    
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $qury = "SELECT *  FROM task t , projet p , equipe ep WHERE t.ID_projet = p.Id   AND ep.ID = t.ID_equipe AND t.is_delete=0 ";
                                                $resq = $connection->query($qury);
                                                if ($resq) {
                                                    while ($row = mysqli_fetch_assoc($resq)) {
                                                ?>
                                                        <tr>
                                                            <td style="display: none;"><b style="display: none;"><?php echo $row['ID_task'] ?></b></td>
                                                            <td><?php echo utf8_encode($row['desc_task']) ?></td>
                                                            <td class="text-capitalize text-pink"><?php echo $row['title_projet'] ?></td>
                                                            <td style="display: none;"><?php echo $row['Id'] ?></td>
                                                            <td><?php echo $row['Nom'] . ' ' . $row['Prenom'] ?></td>
                                                            <td style="display: none;"><?php echo $row['ID'] ?></td>
                                                            <td class="text-dark"><?php echo $row['date_start'] ?></td>
                                                            <td class="text-dark"><?php echo $row['date_end'] ?></td>
                                                            <td style="font-size: 12px;" class="badge rounded-pill <?php

                                                                                                                    if ($row['status'] === "en cours")
                                                                                                                        echo 'bg-warning';
                                                                                                                    else if ($row['status'] === 'Annulé')
                                                                                                                        echo 'bg-danger';
                                                                                                                    else if ($row['status'] === 'Pas commencé')
                                                                                                                        echo 'bg-info';
                                                                                                                    else
                                                                                                                        echo 'bg-success';
                                                                                                                    ?> fw-bold"><?php echo $row['status'] ?></td>
                                                            <td class=" <?php

                                                                        if ($row['property'] === "important")
                                                                            echo 'text-warning ';
                                                                        else if ($row['property'] === 'urgent')
                                                                            echo 'text-danger';
                                                                        else if ($row['property'] === 'moyen')
                                                                            echo 'text-info';
                                                                        else
                                                                            echo 'text-secondary';
                                                                        ?> fw-bold"><?php echo $row['property'] ?></td>
                                                            <td>
                                                                <?php
                                                                $query10 = " SELECT * FROM login WHERE type='admin' AND email='$email2'";
                                                                $resry10 = $connection->query($query10);
                                                                if (mysqli_num_rows($resry10) > 0) {
                                                                ?>
                                                                    <ul class="list-inline mb-0">
                                                                        <li class="list-inline-item">
                                                                            <a class="btn waves-effect waves-light editbtn2" data-bs-toggle="modal" data-bs-target="#editmodal2" href=""><i class="uil uil-pen font-size-18 text-primary"></i></a>
                                                                        </li>
                                                                        <li class="list-inline-item">
                                                                            <a id="" data-bs-toggle="modal" data-bs-target="#delete_tache" class="btn text-danger delete-task"><i class="uil uil-trash-alt font-size-18"></i></a>
                                                                        </li>

                                                                    </ul>
                                                                <?php } ?>
                                                            </td>
                                                        </tr>
                                                <?php
                                                    }
                                                }
                                                ?>


                                            </tbody>
                                        </table>
                                    </div>



                                </div>


                            </div>
                        </div>
                    </div>
                    <!-- end row -->


                </div> <!-- container-fluid -->
            </div>
            <!------------Delete modal taches---------->
            <!-- Modal -->
            <div class="modal fade" id="delete_tache" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="backdrop-filter: blur(8px);">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title text-danger" id="exampleModalLabel">Delete Memeber !</h5>
                            <button type="button" class="close text-danger border-0 bg-white font-size-20" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body text-center">
                            <form action="./auth/code.edit.php" method="POST">
                                <input type="hidden" class="form-control" id="idsup" name="id_supp">
                                <i class="uil-annoyed text-danger border-0 " style="font-size:100px ;"></i><br>
                                <b class="text-danger">Confirmer La Supprission ?</b>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-info" data-bs-dismiss="modal">Annulé</button>
                            <button type="submit" class="btn btn-danger " name="sub_deletetaches">Supprimé</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!------------End Delete modal taches------->
            <!-- End Page-content -->
            <!-----------------Edit Tache------------------->
            <!-- The Modal -->
            <div class="modal fade" id="editmodal2" style="backdrop-filter: blur(8px);">
                <div class="modal-dialog">
                    <div class="modal-content">

                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h4 class="modal-title text-primary">Edit Tache :</h4>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>

                        <!-- Modal body -->
                        <div class="modal-body">
                            <!--------- Input Pop Up Add client------------>
                            <div class="col-xl-12">
                                <div class="card-body">
                                    <!----------Form Pop Up ---------->
                                    <form class="needs-validation" method="POST" action="./auth/code.edit.php" id="formtache" novalidate>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="mb-3">
                                                    <input type="hidden" name="id_tsk2" class="form-control" id="task_id22" value="">
                                                    <label class="form-label" for="client">Description </label>
                                                    <textarea id="txt_descr22" name="txt_desc3" class="form-control" id="txt_descr" placeholder="Tache Message" aria-valuetext=""></textarea>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <!--------------Drop Down Projet ----------->
                                                    <div class="form-group">
                                                        <label class="form-label" for="projet2">Projet</label>
                                                        <select class="form-control form-select" id="projet222" name="projet_select2">
                                                            <option value="" style="display: none;"></option>
                                                            <?php
                                                            $qury = "SELECT DISTINCT(title_projet),Id FROM projet WHERE is_delete = 0";
                                                            $resry = $connection->query($qury);
                                                            if ($resry) {
                                                                while ($row = mysqli_fetch_assoc($resry)) {
                                                                    $projet = $row['title_projet'];
                                                                    $id = $row['Id'];
                                                                    echo '<option value="' . $id . '">' . $projet . '</option>';
                                                                }
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                    <!--------------End Drop Down projet ----------->
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <!--------------Drop Down member ----------->
                                                    <div class="form-group">
                                                        <label class="form-label" for="member2">Member</label>
                                                        <select class="form-control form-select" id="member21" name="member_select2" required>
                                                            <option value="" style="display: none;"></option>
                                                            <?php
                                                            $qury = "SELECT * FROM  equipe WHERE is_delete = 0 ";
                                                            $resry = $connection->query($qury);
                                                            if ($resry) {
                                                                while ($row = mysqli_fetch_assoc($resry)) {
                                                                    $member = $row['Nom'] . ' ' . $row['Prenom'];
                                                                    $id = $row['ID'];
                                                                    echo '<option value="' . $id . '">' . $member . '</option>';
                                                                }
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                    <!--------------End Drop Down member ----------->
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label" for="validationCustom03">Date de Début</label>
                                                    <!-------Date Picker------->
                                                    <input id="date_picker98" class="form-control" placeholder="Date Début" name="date_start" type="text" required />
                                                    <span id="startDateSelected"></span>
                                                </div>
                                                <!----------------------->
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label" for="validationCustom04">Date Limite</label>
                                                    <input id="date_picker99" class="form-control" placeholder="Date Fin" name="date_end" type="tewt" required />
                                                    <span id="startDateSelected"></span>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label" for="status_s">Status</label>
                                                    <select class="form-control form-select" id="status_s2" name="status_select2" required>
                                                        <option value="" style="display: none;"></option>
                                                        <option value="Pas commencé">Pas commencé</option>
                                                        <option value="en cours">en cours</option>
                                                        <option value="Annulé">Annulé</option>
                                                        <option value="terminé">terminé</option>

                                                    </select>
                                                </div>

                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label" for="proprty">Proprieté</label>
                                                    <select class="form-control form-select " id="proprty2" name="prop_select2" required>
                                                        <option value="" style="display: none;"></option>
                                                        <option value="important">important</option>
                                                        <option value="urgent">urgent</option>
                                                        <option value="moyen">moyen</option>
                                                        <option value="faible">faible</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                </div>
                                <button class="btn btn-primary " id="" type="submit" name="sub_edittache">Edit Tache</button>
                                </form>

                            </div>
                            <!-- end card -->
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                            </div>
                        </div> <!-- end col -->


                        <!-- Modal footer -->
                    </div>
                </div>
                <!-----------------End Ediit teches--------------->


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
        <script src="https://unpkg.com/bootstrap-show-password@1.2.1/dist/bootstrap-show-password.min.js"></script>

        <!--------ADD Project Date Time picker validation----------->
        <script>
            $(document).ready(function() {
                ///////
                var startDate;
                var endDate;
                $("#date_picker1").datepicker({
                    dateFormat: 'dd-mm-yy'
                })
                ///////
                ///////
                $("#date_picker2").datepicker({
                    dateFormat: 'dd-mm-yy'
                });
                ///////
                $('#date_picker1').change(function() {
                    startDate = $(this).datepicker('getDate');
                    $("#date_picker2").datepicker("option", "minDate", startDate);
                })

                ///////
                $('#date_picker2').change(function() {
                    endDate = $(this).datepicker('getDate');
                    $("#date_picker1").datepicker("option", "maxDate", endDate);
                })
                ////////////////
            })
        </script>
        <!---------------Edit Modal date picker---------------->
        <script>
            $(document).ready(function() {
                ///////
                var startDate;
                var endDate;
                $("#date_picker98").datepicker({
                    dateFormat: 'dd-mm-yy'
                })
                ///////
                ///////
                $("#date_picker99").datepicker({
                    dateFormat: 'dd-mm-yy'
                });
                ///////
                $('#date_picker98').change(function() {
                    startDate = $(this).datepicker('getDate');
                    $("#date_picker99").datepicker("option", "minDate", startDate);
                })

                ///////
                $('#date_picker99').change(function() {
                    endDate = $(this).datepicker('getDate');
                    $("#date_picker98").datepicker("option", "maxDate", endDate);
                })
                ////////////////
            })
        </script>
        <!------------------------modal edit---------------------->

        <script>
            $(document).ready(function() {

                $('.editbtn2').on('click', function() {
                    $('#editmodal2').modal('show');

                    $tr = $(this).closest('tr');

                    var data = $tr.children("td").map(function() {
                        return $(this).text();
                    }).get();
                    $('#task_id22').val(data[0]);
                    $('#txt_descr22').val(data[1]);
                    $("#projet222 option:selected").text(data[2]);
                    $("#projet222 option:selected").val(data[3]);
                    $('#member21 option:selected').text(data[4]);
                    $('#member21 option:selected').val(data[5]);
                    $('#date_picker98').val(data[6]);
                    $('#date_picker99').val(data[7]);
                    $('#status_s2 option:selected').val(data[8]);
                    $('#status_s2 option:selected').text(data[8]);
                    $('#proprty2 option:selected').val(data[9]);
                    $('#proprty2 option:selected').text(data[9]);




                });
            });
        </script>
        <!-------------------Modal delete----------------->
        <script>
            $(document).ready(function() {

                $('.delete-task').on('click', function() {

                    $('#delete_tache').modal('show');

                    $tr = $(this).closest('tr');

                    var data = $tr.children("td").map(function() {
                        return $(this).text();
                    }).get();
                    $('#idsup').val(data[0]);
                });
            });
        </script>
        <!---------------search live in table--------------------->
        <!-- <script>
            $("#search").keyup(function() {
                var value = this.value.toLowerCase().trim();

                $("table tr").each(function(index) {
                    if (!index) return;
                    $(this).find("td").each(function() {
                        var id = $(this).text().toLowerCase().trim();
                        var not_found = (id.indexOf(value) == -1);
                        $(this).closest('tr').toggle(!not_found);
                        return not_found;
                    });
                });
            });
        </script> -->


</body>

<!-- Mirrored from themesbrand.com/minible/layouts/contacts-list.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 31 May 2022 13:16:31 GMT -->

</html>