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
                <div class="container">
                    <div class="table-wrapper">
                        <div class="table-title">
                            <div class="row">
                                <div class="col-sm-8">
                                    <h2>Employee <b>Details</b></h2>
                                </div>
                                <div class="col-sm-4">
                                    <button type="button" class="btn btn-info add-new"><i class="fa fa-plus"></i> Add New</button>
                                </div>
                            </div>
                        </div>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>From(mm/yy)</th>
                                    <th>To(mm/yy)</th>
                                    <th>Organization</th>
                                    <th>Position</th>
                                    <th>Primary Responsibility</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr style="display: none;">
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>
                                        <a class="add" title="Add" data-toggle="tooltip"><i class="uil uil-plus-circle"></i></a>
                                        <a class="edit" title="Edit" data-toggle="tooltip"><i class="uil uil-minus-circle"></i></a>
                                        <a class="delete" title="Delete" data-toggle="tooltip"><i class="uil uil-times-circle"></i></a>
                                    </td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
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