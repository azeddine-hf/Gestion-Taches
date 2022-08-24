<!doctype html>
<html lang="en">

    
<!-- Mirrored from themesbrand.com/minible/layouts/contacts-grid.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 31 May 2022 13:16:31 GMT -->

<?php 
include('include/security.php');
$pageTitle = 'Equipe';
include "./include/head-link.php"?>    
    <body>

    <!-- <body data-layout="horizontal" data-topbar="colored"> -->

        <!-- Begin page -->
        <div id="layout-wrapper">
<?php include('./include/header-top.php') ?>
            
                  <!-- Left Sidebar  -->
           <?php include "./include/left-sidebar.php"?>

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
                                    <h4 class="mb-0">User Grid</h4>

                                    <!-- <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Contacts</a></li>
                                            <li class="breadcrumb-item active">User Grid</li>
                                        </ol>
                                    </div> -->

                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                        <div class="row">
                            <?php 
                            include './include/connect.php';
                            $req = "SELECT * FROM equipe ";
                            $resry = mysqli_query($connection,$req);
                            if($resry){
                                while($row=mysqli_fetch_assoc($resry)){
                                    $nom = $row['Nom'];
                                    $id = $row['ID'];
                                    $prenom = $row['Prenom'];
                                    $jobe = $row['jobe'];
                                    $img = $row['photo'];
                                    echo '<div class="col-xl-3 col-sm-6">
                                    <div class="card text-center">
                                        <div class="card-body">
                                            <div class="dropdown float-end">
                                                <a class="text-body dropdown-toggle font-size-16" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true">
                                                  <i class="uil uil-ellipsis-h"></i>
                                                </a>
                                              
                                                <div class="dropdown-menu dropdown-menu-end">
                                                    <a class="dropdown-item" href="#">Edit</a>
                                                    <a class="dropdown-item" href="#">Action</a>
                                                    <a class="dropdown-item" href="#">Remove</a>
                                                </div>
                                            </div>
                                            <div class="clearfix"></div>
                                            <div class="mb-4">
                                                <img src='.$img.' alt="" class="avatar-lg rounded-circle img-thumbnail">
                                            </div>
                                            <h5 class="font-size-16 mb-1"><a href="#" class="text-dark">'.$nom.' '.$prenom.'</a></h5>
                                            <p class="text-muted mb-2">'.$jobe.'</p>
                                            
                                        </div>
    
                                        <div class="btn-group" role="group">
                                          
                                            <a href="contacts-profile.php?id='.$id.'" class="btn btn-outline-light text-truncate"><i class="uil uil-user me-1"></i> Profile</a>
                                            <button type="button" class="btn btn-outline-light text-truncate"><i class="uil uil-envelope-alt me-1"></i> Message</button>
    
                                        </div>
                                    </div>
                                </div>';
                                }
                            }else
                            {
                                die($resry);
                            }
                            ?>
                            
                        </div>
                        <!-- end row -->

                        
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
<?php include('./include/scripts.inc.php') ?>

    </body>

<!-- Mirrored from themesbrand.com/minible/layouts/contacts-grid.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 31 May 2022 13:16:31 GMT -->
</html>
