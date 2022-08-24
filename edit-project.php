<!DOCTYPE html>
<html lang="en">
<?php
session_start();
include './include/head-link.php';
include './include/connect.php';


    $idp=$_REQUEST['Id'];
    $qury = "SELECT p.* , c.* FROM projet p , client c WHERE p.id_client = c.ID and p.Id=$idp";
    $resry = $connection->query($qury);
    if($resry){
        $row = mysqli_fetch_assoc($resry);
        $client_tp = $row['id_client'];
        $startdate = $row['date_debut'];
        $enddate = $row['deadline'];
        $status = $row['statut'];
        $member = $row['members'];
        $member1 = explode(",", $member);
    }
    else
    die($resry);
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
                <form class="needs-validation" method="POST" action="./auth/code.edit.php?Id=<?php echo $idp ?>" id="formcheckb" novalidate>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label class="form-label" for="validationCustom01">Nom du Projet</label>
                                <input type="text" class="form-control" id="validationCustom01" name="title_p" placeholder="Nom du Projet" value="<?php echo $row['title_projet']; ?>" required>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="mb-3">
                                <!--------------Drop Down Client ----------->
                                <div class="form-group">
                                    <label class="form-label" for="validationCustom02">Client</label>
                                    <select class="form-control form-select" id="validationCustom02" name="clientselect" required>
                                        <!-- <option selected disabled="disabled" class="text-secondary" value="">Choisi Un Client</option> -->
                                        <option value=""  <?php echo !isset($row['ID']) ? "selected" :'' ?>></option>
                                        <?php
                                        $qury2 = "SELECT * FROM  client ";
                                        $resry3 = $connection->query($qury2);
                                        if ($resry3) {
                                            while ($row1 = mysqli_fetch_assoc($resry3)) {
                                                $client = $row1['Nom'];
                                                $idc = $row1['ID'];
                                                ?>
                                                <option value="<?php echo $idc ?>" <?php
                                                if ($client_tp==$idc)
                                                echo "selected";
                                                ?>
                                                
                                                ><?php echo $client ?></option>';
                                                <?php 
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
                                <input id="date_picker1" class="form-control" name="date_start" type="text" required 
                                value="<?php 
                                echo $startdate;
                                ?>"
                                />
                                <span id="startDateSelected"></span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label" for="validationCustom04">Date Limite</label>
                                <input id="date_picker2" class="form-control" name="date_end" type="tewt" value="<?php 
                                echo $enddate;
                                ?>" required />
                                <span id="startDateSelected"></span>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="mb-3">

                                <label class="form-label " for="validationCustom05">Members</label>
                                <!---Message error check box in div-->
                                <div id="kika"></div>

                                <div class="form-check form-switch  bola">
                                    <input class="form-check-input khrya" type="checkbox" id="flexSwitchCheckDefault" name="langs[]" id="langs_javascript" value="HISSOUF"
                                    <?php if(in_array('HISSOUF',$member1))
                                    echo 'checked';
                                    ?>
                                    >
                                    <label class="" for="langs_javascript">AZEDDINE HISSOUF</label>
                                </div>

                                <div class="form-check form-switch bola">
                                    <input class="form-check-input khrya" type="checkbox" id="flexSwitchCheckChecked" name="langs[]" id="langs_javascript" value="BENHMIDI"
                                    <?php if(in_array('BENHMIDI',$member1))
                                    echo 'checked';
                                    ?>
                                    >
                                    <label class="" for="langs_javascript">El MEHDI BENHMIDI</label>
                                </div>
                                <div class="form-check form-switch bola">
                                    <input class="form-check-input khrya" type="checkbox" id="flexSwitchCheckChecked" name="langs[]" id="langs_javascript" value="EL KALAKHI"
                                    <?php if(in_array('EL KALAKHI',$member1))
                                    echo 'checked';
                                    ?>
                                    >
                                    <label class="" for="langs_javascript">El MEHDI Kalakhi</label>
                                </div>
                                <div class="form-check form-switch bola">
                                    <input class="form-check-input khrya" type="checkbox" id="flexSwitchCheckChecked" name="langs[]" id="langs_javascript" value="ABIDIA"
                                    <?php if(in_array('ABIDIA',$member1))
                                    echo 'checked';
                                    ?>>
                                    <label class="" for="langs_javascript">HAJAR ABIDIA</label>
                                </div>
                                <div class="form-check form-switch bola">
                                    <input class="form-check-input khrya " type="checkbox" id="flexSwitchCheckChecked" name="langs[]" id="langs_javascript" value="EL FELTA"
                                    <?php if(in_array('EL FELTA',$member1))
                                    echo 'checked';
                                    ?>>
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
                                                <option value="terminé"
                                                <?php 
                                                if ($status=='terminé'){
                                                    echo " selected";
                                                }
                                                ?>                         
                                                >terminé</option>
                                                <option value="Annulé"
                                                <?php 
                                                if ($status=='Annulé'){
                                                    echo " selected";
                                                }
                                                ?> 
                                                >Annulé</option>
                                                <option value="en cours"
                                                <?php 
                                                if ($status=='en cours'){
                                                    echo " selected";
                                                }
                                                ?> 
                                                >en cours</option>
                                                <option value="Pas commencé"
                                                <?php 
                                                if ($status=='Pas commencé'){
                                                    echo " selected";
                                                }
                                                ?>
                                                >Pas commencé</option>
                                            </select>
                                        </div>
                                        <!--------------End Drop Down Client ----------->

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <a class="btn btn-warning "  href="project.php">Retour</a>
                    <button class="btn btn-success" type="submit" name="sub_editproject">Edit Projet</button>
                </form>
            </div>
          



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


</body>

</html>