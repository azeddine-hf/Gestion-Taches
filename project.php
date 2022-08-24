<!DOCTYPE html>
<html lang="en">
<?php
include('include/security.php');
$pageTitle = 'Projet';
include './include/head-link.php';
include './include/connect.php';
?>

<body>
    <!-- <body data-layout="horizontal" data-topbar="colored"> -->
    <div id="layout-wrapper">
        <!-- Begin page -->
        <!-- header-top-->
        <?php include "./include/header-top.php" ?>
        <!-- end header-top-->
        <!--left sidebar-->
        <?php include "./include/left-sidebar.php" ?>
        <!-- end left sidebar-->
        <div class="main-content">

            <div class="page-content">
                <div class="container-fluid">

                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box d-flex align-items-center justify-content-between">
                                <h4 class="mb-0">Dashboard</h4>

                                <!-- <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Minible</a></li>
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                    </div> -->

                            </div>
                        </div>
                    </div>
                    <!--sec somary-->
                    <?php
                    $sql = "SELECT COUNT(Id) AS 'som' from projet where statut='Pas commencé'";
                    $sql2 = "SELECT COUNT(Id) AS 'som' from projet where statut='en cours'";
                    $sql3 = "SELECT COUNT(Id) AS 'som' from projet where statut='Annulé'";
                    $sql4 = "SELECT COUNT(Id) AS 'som' from projet where statut='terminé'";
                    $result = $connection->query($sql);
                    $result2 = $connection->query($sql2);
                    $result3 = $connection->query($sql3);
                    $result4 = $connection->query($sql4);
                    $p_comm = mysqli_fetch_assoc($result);
                    $e_cour = mysqli_fetch_assoc($result2);
                    $anule = mysqli_fetch_assoc($result3);
                    $termin = mysqli_fetch_assoc($result4);
                    ?>
                    <div class="row">
                        <div class="col-md-6 col-xl-3">
                            <div class="card" style="border-radius: 20px;">
                                <div class="card-body">
                                    <div class="float-end mt-2">
                                        <i class="uil-question-circle text-info" style="font-size: 40px;"></i>
                                        <!-- <div id="total-revenue-chart"></div> -->
                                    </div>
                                    <div>
                                        <h4 class="mb-1 mt-1 text-info"><span data-plugin="counterup"><?php echo $p_comm['som']; ?></span></h4>
                                        <span class="badge rounded-pill bg-info " style="font-size: 14px;">Projet Pas commencé</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end col-->
                        <div class="col-md-6 col-xl-3">
                            <div class="card" style="border-radius: 20px;">
                                <div class="card-body">
                                    <div class="float-end mt-2">
                                        <i class="uil-clock text-warning" style="font-size: 40px;"></i>
                                        <!-- <div id="total-revenue-chart"></div> -->
                                    </div>
                                    <div>
                                        <h4 class="mb-1 mt-1 text-warning"><span data-plugin="counterup"><?php echo $e_cour['som']; ?></span></h4>
                                        <span class="badge rounded-pill bg-warning " style="font-size: 14px;">Projet en cours</span>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- end col-->
                        <div class="col-md-6 col-xl-3">
                            <div class="card" style="border-radius: 20px;">
                                <div class="card-body">
                                    <div class="float-end mt-2">
                                        <i class="uil-x text-danger" style="font-size: 40px;"></i>
                                        <!-- <div id="total-revenue-chart"></div> -->
                                    </div>
                                    <div>
                                        <h4 class="mb-1 mt-1 text-danger"><span data-plugin="counterup"><?php echo $anule['som']; ?></span></h4>
                                        <span class="badge rounded-pill bg-danger " style="font-size: 14px;">Projet Annulé</span>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- end col-->
                        <div class="col-md-6 col-xl-3">
                            <div class="card" style="border-radius: 20px;">
                                <div class="card-body">
                                    <div class="float-end mt-2">
                                        <i class="uil-check-circle text-success" style="font-size: 40px;"></i>
                                        <!-- <div id="total-revenue-chart"></div> -->
                                    </div>
                                    <div>
                                        <h4 class="mb-1 mt-1 text-success"><span data-plugin="counterup"><?php echo $termin['som']; ?></span></h4>
                                        <span class="badge rounded-pill bg-success " style="font-size: 14px;">Projet terminé</span>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- end col-->

                    </div> <!-- end row-->
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <?php
                                    $email2 = $_SESSION['user'];
                                    $query10 = " SELECT * FROM login WHERE type='admin' AND email='$email2'";
                                    $resry10 = $connection->query($query10);
                                    if (mysqli_num_rows($resry10) > 0) {
                                    ?>
                                        <div class="col-md-4">
                                            <div>
                                                <button type="button" class="btn btn-success waves-effect waves-light mb-3" data-bs-toggle="modal" data-bs-target="#myModal"><i class="mdi mdi-plus me-1"></i> Ajouté Projet</button>
                                            </div>
                                        </div>
                                    <?php } ?>
                                    <div class="table-responsive-xl">
                                        <table id="datatable" class="table table-centered  table-nowrap mb-0" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                            <thead>
                                                <tr>
                                                    <th>Nom du Projet</th>
                                                    <th>Client</th>
                                                    <th>Date de Début</th>
                                                    <th>Date Limite</th>
                                                    <th>Members</th>
                                                    <th>Status</th>
                                                    <?php
                                                    if (mysqli_num_rows($resry10) > 0) {
                                                    ?>
                                                        <th>Edit</th>
                                                    <?php } ?>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $qury = "SELECT p.* , c.Nom FROM projet p , client c WHERE p.id_client = c.ID";
                                                $resry = $connection->query($qury);
                                                if ($resry) {
                                                    while ($row = mysqli_fetch_assoc($resry)) { ?>
                                                        <tr>
                                                            <td><?php echo $row['title_projet'] ?></td>
                                                            <td><?php echo $row['Nom'] ?></td>
                                                            <td><?php echo $row['date_debut'] ?></td>
                                                            <td><?php echo $row['deadline'] ?></td>
                                                            <td><?php echo $row['members'] ?></td>
                                                            <?php if ($row['statut'] == 'en cours') { ?>
                                                                <td class="badge rounded-pill bg-warning"><?php echo $row['statut'] ?></td>
                                                            <?php } elseif ($row['statut'] == 'Annulé') { ?>
                                                                <td class="badge rounded-pill bg-danger"><?php echo $row['statut'] ?></td>
                                                            <?php } elseif ($row['statut'] == 'terminé') { ?>
                                                                <td class="badge rounded-pill bg-success"><?php echo $row['statut'] ?></td>
                                                            <?php } else { ?>
                                                                <td class="badge rounded-pill bg-info"><?php echo $row['statut'] ?></td>
                                                            <?php } ?>
                                                            <?php
                                                            if (mysqli_num_rows($resry10) > 0) {
                                                            ?>
                                                                <td>
                                                                    <!----TD edit in table----->
                                                                    <a type="button" href="edit-project?Id=<?php echo $row['Id'] ?>" name="edit" value="Edit" class="btn btn-info btn-xs edit_data">Edit</a>

                                                                </td>
                                                            <?php } ?>
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

                    </div> <!-- end col -->
                </div> <!-- end row -->

                <!-- The Modal -->
                <div class="modal fade" id="myModal" style="backdrop-filter: blur(8px);">
                    <div class="modal-dialog">
                        <div class="modal-content">

                            <!-- Modal Header -->
                            <div class="modal-header">
                                <h4 class="modal-title text-primary">Ajouté projet :</h4>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>

                            <!-- Modal body -->
                            <div class="modal-body">
                                <!--------- Input Pop Up Add Project------------>
                                <div class="col-xl-12">
                                    <div class="card-body">
                                        <!----------Form Pop Up ---------->
                                        <form class="needs-validation" method="POST" action="./auth/code.php" id="formcheckb" novalidate>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="validationCustom01">Nom du Projet</label>
                                                        <input type="text" class="form-control" id="validationCustom01" name="title_p" placeholder="Nom du Projet" value="" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="mb-3">
                                                        <!--------------Drop Down Client ----------->
                                                        <div class="form-group">
                                                            <label class="form-label" for="validationCustom02">Client</label>
                                                            <select class="form-control form-select" id="validationCustom02" name="clientselect" required>
                                                                <option selected disabled="disabled" class="text-secondary" value="">Choisi Un Client</option>
                                                                <?php
                                                                $qury = "SELECT * FROM  client ";
                                                                $resry = $connection->query($qury);
                                                                if ($resry) {
                                                                    while ($row = mysqli_fetch_assoc($resry)) {
                                                                        $client = $row['Nom'];
                                                                        $id = $row['ID'];
                                                                        echo '<option value="' . $id . '">' . $client . '</option>';
                                                                    }
                                                                }
                                                                ?>

                                                            </select>
                                                        </div>
                                                        <!--------------End Drop Down Client ----------->

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="validationCustom03">Date de Début</label>
                                                        <!-------Date Picker------->
                                                        <input id="date_picker1" class="form-control" name="date_start" type="text" required />
                                                        <span id="startDateSelected"></span>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="validationCustom04">Date Limite</label>
                                                        <input id="date_picker2" class="form-control" name="date_end" type="tewt" required />
                                                        <span id="startDateSelected"></span>
                                                    </div>
                                                </div>

                                                <div class="col-md-12">
                                                    <div class="mb-3">

                                                        <label class="form-label " for="validationCustom05">Members</label>
                                                        <!---Message error check box in div-->
                                                        <div id="kika"></div>

                                                        <div class="form-check form-switch  bola">
                                                            <input class="form-check-input khrya" type="checkbox" id="flexSwitchCheckDefault" name="langs[]" id="langs_javascript" value="HISSOUF">
                                                            <label class="" for="langs_javascript">AZEDDINE HISSOUF</label>
                                                        </div>

                                                        <div class="form-check form-switch bola">
                                                            <input class="form-check-input khrya" type="checkbox" id="flexSwitchCheckChecked" name="langs[]" id="langs_javascript" value="BENHMIDI">
                                                            <label class="" for="langs_javascript">El MEHDI BENHMIDI</label>
                                                        </div>
                                                        <div class="form-check form-switch bola">
                                                            <input class="form-check-input khrya" type="checkbox" id="flexSwitchCheckChecked" name="langs[]" id="langs_javascript" value="EL KALAKHI">
                                                            <label class="" for="langs_javascript">El MEHDI Kalakhi</label>
                                                        </div>
                                                        <div class="form-check form-switch bola">
                                                            <input class="form-check-input khrya" type="checkbox" id="flexSwitchCheckChecked" name="langs[]" id="langs_javascript" value="ABIDIA">
                                                            <label class="" for="langs_javascript">HAJAR ABIDIA</label>
                                                        </div>
                                                        <div class="form-check form-switch bola">
                                                            <input class="form-check-input khrya " type="checkbox" id="flexSwitchCheckChecked" name="langs[]" id="langs_javascript" value="EL FELTA">
                                                            <label class="" for="langs_javascript">HASSAN EL FELTA</label>

                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="mb-3">
                                                        <div class="col-md-12">
                                                            <div class="mb-3">
                                                                <!--------------Drop Down Client ----------->
                                                                <div class="form-group">
                                                                    <label class="form-label" for="validationCustom05">Status</label>
                                                                    <select class="form-control form-select" id="validationCustom02" name="statuselect" required>
                                                                        <option selected disabled="disabled" class="text-secondary" value="">Choisi Un Status</option>
                                                                        <option value="terminé">terminé</option>
                                                                        <option value="Annulé">Annulé</option>
                                                                        <option value="en cours">en cours</option>
                                                                        <option value="Pas commencé">Pas commencé</option>
                                                                    </select>
                                                                </div>
                                                                <!--------------End Drop Down Client ----------->

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <button class="btn btn-primary " id="btn-project" type="submit" name="sub_addproject">Ajouté Projet</button>
                                        </form>
                                    </div>
                                    <!-- end card -->
                                </div> <!-- end col -->
                                <!-------------End Input Add Projetc------------>
                            </div>
                            <!-- Modal footer -->
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
        <!---------------------- End Modal Add Project -------------------->


        <!--footer-->
        <?php include "./include/footer.inc.php" ?>

    </div>
    <!--Right sidebar setting-->
    <?php include "./include/setting-right.bar.php" ?>
    <!--Right sidebar setting-->

    <!--scripts-->
    <?php include './include/scripts.inc.php' ?>
    <!-----DatePicker Script---->

    <!-----ADD P check box validation------>
    <script>
        $('#formcheckb').on('submit', function() {
            var chkLength = $('.bola .khrya:checked').length; //get checkbox checked length
            if (chkLength > 0) //check with or condition
                document.getElementById('kika').innerHTML = '';
            else {
                document.getElementById('kika').innerHTML = '<b class="text-danger">Choisi Un Member ?</b>';
                return false;
            }


        });
    </script>
    <!-----EDIT P check box validation------>
    <script>
        $('#formcheckb2').on('submit', function() {
            var chkLength = $('.bola2 .khrya2:checked').length; //get checkbox checked length
            if (chkLength > 0) //check with or condition
                document.getElementById('kika2').innerHTML = '';
            else {
                document.getElementById('kika2').innerHTML = '<b class="text-danger">Choisi Un Member ?</b>';
                return false;
            }


        });
    </script>

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
    <!-----Edit Project Date Time picker validation------->
    <script>
        $(document).ready(function() {
            ///////
            var startDate;
            var endDate;
            $("#date_picker8").datepicker({
                dateFormat: 'dd-mm-yy'
            })
            ///////
            ///////
            $("#date_picker9").datepicker({
                dateFormat: 'dd-mm-yy'
            });
            ///////
            $('#date_picker8').change(function() {
                startDate = $(this).datepicker('getDate');
                $("#date_picker9").datepicker("option", "minDate", startDate);
            })

            ///////
            $('#date_picker9').change(function() {
                endDate = $(this).datepicker('getDate');
                $("#date_picker8").datepicker("option", "maxDate", endDate);
            })
            ////////////////
        })
    </script>
    <!-----------AJAX CODE EDIT--------->
    <script>
        $(document).ready(function() {
            $('#add').click(function() {
                $('#insert').val("Insert");
                $('#insert_form')[0].reset();
            });
            $(document).on('click', '.edit_data', function() {
                var project_id = $(this).attr("Id");
                $.ajax({
                    url: "fetch.php",
                    method: "POST",
                    data: {
                        project_id: project_id
                    },
                    dataType: "json",
                    success: function(data) {
                        $('#title_p').val(data.title_projet);
                        $('#clientdrop').val(data.id_client);
                        $('#date_picker8').val(data.date_debut);
                        $('#date_picker9').val(data.deadline);
                        $('#validationCustom021').prop('checked', data.statut);
                        $('#validationCustom021:checked').val(data.statut);
                        $('#Id').val(data.Id);
                        $('#insert').val("Update");
                        $('#add_data_Modal').modal('show');
                    }
                });
            });

        });
    </script>

    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
</body>

</html>