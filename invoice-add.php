<!doctype html>
<html lang="en">


<!-- Mirrored from themesbrand.com/minible/layouts/invoices-list.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 31 May 2022 13:16:27 GMT -->
<?php
include('./include/security.php');
$pageTitle = 'Facturation';
include('./include/connect.php');
include "./include/head-link.php"; ?>


<body>

    <!-- <body data-layout="horizontal" data-topbar="colored"> -->

    <!-- Begin page -->
    <div id="layout-wrapper">
        <!-- header-top-->
        <?php include "./include/header-top.php" ?>
        <!-- Left Sidebar  -->
        <?php include "./include/left-sidebar.php" ?>

        <!-- Left Sidebar End -->

        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">

            <div class="page-content">
                <div class="card">

                    <form action="">
                        <div class="card-body row col-xl-12">
                            <div class="col-12">
                                <h3>Ajouter une nouvelle <B>Facture</B></h3>
                            </div>
                            <hr>
                            <div class="col-6">
                                <label for="client-id">Client ref</label></br>
                                <select class="form-control select2 ">
                                    <option selected disabled="disabled">Choisi un Client</option>
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
                            <div class="col-6">
                                <label for="basicpill-address-input">Adresse Client</label>
                                <textarea id="basicpill-address-input" class="form-control" rows="1" placeholder="Entrer l'adresse client"></textarea>
                            </div>

                            <div class="table-wrapper col-12">
                                <div class="table-title">

                                </div>
                                <table class="table table-hover text-nowrap">
                                    <thead class="table-success text-center">
                                        <tr>
                                            <th scope="col">Actions</th>
                                            <th scope="col" style="width: 340px;">Désignation</th>
                                            <th scope="col" style="width: 100px;">Qté</th>
                                            <th scope="col" style="width: 170px;">Prix</th>
                                            <th scope="col">Montant HT</th>


                                        </tr>
                                    </thead>
                                    <tbody class="text-center">
                                        <tr style="display: none;">
                                            <td>
                                                <a class="add" data-toggle="tooltip"><i class="uil uil-check-circle font-size-100"></i></a>
                                                <a class="edit" data-toggle="tooltip"><i class="uil uil-edit-alt font-size-100"></i></a>
                                                <a class="delete" data-toggle="tooltip"><i class="uil uil-times-circle font-size-100"></i></a>
                                            </td>
                                            <td style="height: 100px;" class="2ndtd">
                                                <select class="form-control select2 " id="select23">
                                                    <option selected disabled="disabled">Choisi un Client</option>
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
                                            </td>
                                            <td></td>
                                            <td></td>
                                            <td></td>

                                        </tr>

                                    </tbody>
                                </table>
                                <div class="col-12">
                                    <button type="button" class="btn btn-success add-new w-100 rounded-pill"><i class="fa fa-plus"></i> Add New</button>
                                </div>
                            </div>



                        </div>
                    </form>


                </div>
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

    <!---script---->
    <?php include "./include/scripts.inc.php" ?>
</body>

<!-- Mirrored from themesbrand.com/minible/layouts/invoices-list.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 31 May 2022 13:16:31 GMT -->

</html>