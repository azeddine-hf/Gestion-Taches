<!doctype html>
<html lang="en">


<!-- Mirrored from themesbrand.com/minible/layouts/invoices-list.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 31 May 2022 13:16:27 GMT -->
<?php
include('./include/security.php');
$pageTitle = 'Facturation';
include('./include/connect.php');
include "./include/head-link.php"; ?>


<body>
    <style>
        #contents div.select2-container {
            margin: 10px;
            display: block;
            max-width: 60%;
        }
    </style>
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

                    <form class="form" action="">
                        <div class="card-body row col-xl-12">
                            <div class="col-12">
                                <h3>Ajouter une nouvelle <B>Facture</B></h3>
                            </div>
                            <hr>
                            <div class="col-6">
                                <label for="client-id">Client ref</label></br>
                                <select class="form-control select2">
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

                            <div class="table-wrapper col-12"><br /> <br>
                                <div class="table-title">

                                </div>
                                <table class="table table-hover text-center" id="myTable">
                                    <thead>
                                        <tr>
                                            <th scope="col" style="width: 250px;">Désignation</th>
                                            <th scope="col">Qté</th>
                                            <th scope="col">Prix</th>
                                            <th scope="col">Montant Total</th>
                                            <th scope="col" style="width: 200px;"></th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-center">
                                        <tr id="template" style="display: none">
                                            <td scope="row">
                                                <select required="required" class="items form-control" name="data[Invoice][item_id][]" tabindex="-1">
                                                    <option selected disabled="disabled" value="Choisi un Client">Choisi un Client</option>

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
                                                <div style="z-index: 11">
                                                    <div id="borderedTost3" class="toast overflow-hidden mt-3" role="alert" aria-live="assertive"
                                                        aria-atomic="true">
                                                        <div class="align-items-center text-white bg-warning border-0">
                                                            <div class="d-flex">
                                                                <div class="toast-body">
                                                                    Hello, world! This is a toast message.
                                                                </div>
                                                                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"
                                                                    aria-label="Close"></button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td><input type="number" step="0.01" class="form-control inpt"  name="name[]" required/></td>
                                            <td><input type="text" step="0.01" data-bts-prefix="$" class="form-control" name="surname[]" disabled value="0"/></td>
                                            <td><input type="number" step="0.01" class="form-control"  name="age[]" disabled value="0"/></td>
                                            <td>
                                                <a class="add2 text-success btn" id="newadd" data-toggle="tooltip"><i class="uil uil-check-circle"></i></a>
                                                <a class="edit text-warning btn" title="Edit" data-toggle="tooltip"><i class="uil uil-edit-alt"></i></a>
                                                <a class="delete text-danger btn" data-toggle="tooltip"><i class="uil uil-trash"></i></a>
                                            </td>


                                        </tr>
                                    </tbody>
                                </table>

                                <div class="col-12">
                                    <button type="button" class="btn btn-primary add-new w-100 rounded-pill" id="AddPerson"><i class="uil uil-plus-circle"></i> Ajouter Ligne</button>
                                </div>
                            </div>



                        </div>
                    </form>



                    <!-- <table id="table">
                        <tr class="tr_clone">
                            <td>
                                <div class="input select">
                                    <select required="required" class="items" name="data[Invoice][item_id][]" tabindex="-1">
                                        <option value=""></option>
                                        <option value="1">item 1</option>
                                        <option value="2">Item 2</option>
                                        <option value="3">Item 1+2</option>
                                        <option value="4">Set 1</option>
                                        <option value="5">NURSERY Books</option>
                                    </select>
                                </div>
                            <td>
                                <input type="button" class="tr_clone_add" value="Add" name="add">
                            </td>
                            <td class="remove">X</td>
                        </tr>
                    </table><br>
                    <br>
                    <br>
                    <br>
                    <br> -->
                    <!-- End Page-content -->


                </div>

            </div>
            <!-- end main content-->

        </div>
        <!-- END layout-wrapper -->
    </div>

    <!--footer Rights-->
    <?php include "./include/footer.inc.php" ?>
    <!--end footer Rights-->
    <!--Right sidebar setting-->
    <?php include "./include/setting-right.bar.php" ?>
    <!--Right sidebar setting-->

    <!---script---->
    <?php include "./include/scripts.inc.php" ?>
</body>

<!-- Mirrored from themesbrand.com/minible/layouts/invoices-list.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 31 May 2022 13:16:31 GMT -->

</html>