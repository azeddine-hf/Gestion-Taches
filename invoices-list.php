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
                <div class="container-fluid">

                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box d-flex align-items-center justify-content-between">
                                <h4 class="mb-0">Invoice List</h4>

                                <!-- <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Invoices</a></li>
                                            <li class="breadcrumb-item active">Invoice List</li>
                                        </ol>
                                    </div> -->

                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                    <div class="row">
                        <div class="col-md-4">
                            <div>
                                <button type="button" class="btn btn-success waves-effect waves-light mb-3"><i class="mdi mdi-plus me-1"></i>Ajouter Facture</button>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="float-end">
                                <div class=" mb-3">
                                    <div class="input-daterange input-group" id="datepicker6" data-date-format="dd M, yyyy" data-date-autoclose="true" data-provide="datepicker" data-date-container='#datepicker6'>
                                        <input type="text" class="form-control text-start" placeholder="From" name="From" />
                                        <input type="text" class="form-control text-start" placeholder="To" name="To" />

                                        <button type="button" class="btn btn-primary"><i class="mdi mdi-filter-variant"></i></button>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="row card">
                        <div class="col-lg-12 card-body">

                            <div class="table-responsive-xl mb-4">
                                <table id="datatable" class="table table-centered table-nowrap mb-0" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                    <thead>
                                        <tr class="bg-transparent">
                                            <th style="width: 24px;">
                                                <div class="form-check text-center font-size-16">
                                                    <input type="checkbox" class="form-check-input" id="invoicecheck">
                                                    <label class="form-check-label" for="invoicecheck"></label>
                                                </div>
                                            </th>
                                            <th>Invoice ID</th>
                                            <th>Date</th>
                                            <th>Billing Name</th>
                                            <th>Amount</th>
                                            <th>Status</th>
                                            <th>Download Pdf</th>
                                            <th style="width: 120px;">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <tr>
                                            <td>
                                                <div class="form-check text-center font-size-16">
                                                    <input type="checkbox" class="form-check-input" id="invoicecheck1">
                                                    <label class="form-check-label" for="invoicecheck1"></label>
                                                </div>
                                            </td>

                                            <td><a href="javascript: void(0);" class="text-dark fw-bold">#MN0131</a> </td>
                                            <td>
                                                10 Jul, 2020
                                            </td>
                                            <td>Connie Franco</td>

                                            <td>
                                                $141
                                            </td>
                                            <td>
                                                <div class="badge bg-soft-success font-size-12">Paid</div>
                                            </td>
                                            <td>
                                                <div>
                                                    <button class="btn btn-light btn-sm w-xs">Pdf <i class="uil uil-download-alt ms-2"></i></button>
                                                </div>
                                            </td>

                                            <td>
                                                <div class="dropdown">
                                                    <button class="btn nav-btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <i class="uil uil-ellipsis-h font-size-18 text-primary"></i>
                                                    </button>
                                                    <div class="dropdown-menu dropdown-menu-end rounded-3">
                                                <a class="dropdown-item rounded-3" href="#"><span class="w-100 badge bg-primary align-middle"><i class="uil uil-edit font-size-14 align-middle bg-primary text-white"></i>Modifier</span></a>
                                                <a class="dropdown-item rounded-3" href="#"><span class="w-100 badge bg-danger align-middle"><i class="uil uil-trash font-size-14 align-middle bg-danger text-white"></i>Supprimer</span></a>


                                                    </div>

                                                </div>
                                                
                                            </td>
                                        </tr>

                                    </tbody>
                                </table>
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

    <!---script---->
    <?php include "./include/scripts.inc.php" ?>
</body>

<!-- Mirrored from themesbrand.com/minible/layouts/invoices-list.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 31 May 2022 13:16:31 GMT -->

</html>