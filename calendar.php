<!doctype html>
<html lang="en">

    
<!-- Mirrored from themesbrand.com/minible/layouts/calendar.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 31 May 2022 13:15:54 GMT -->
<?php include "./include/head-link.php"?>

    
    <body>

    <!-- <body data-layout="horizontal" data-topbar="colored"> -->

        <!-- Begin page -->
        <div id="layout-wrapper">

            
             <!-- header-top-->
   <?php include "./include/header-top.php"?>
            <!-- end header-top-->
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
                                    <h4 class="mb-0">Calendar</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Apps</a></li>
                                            <li class="breadcrumb-item active">Calendar</li>
                                        </ol>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                        <div class="row">
                            <div class="col-12">
                               
                                <div class="row">
                                    <div class="col-lg-3">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="d-grid">
                                                    <button class="btn font-16 btn-primary" id="btn-new-event"><i class="mdi mdi-plus-circle-outline"></i> Create
                                                        New Event</button>
                                                </div>
                                            
                                                <div class="row justify-content-center mt-5">
                                                    <img src="assets/images/coming-soon-img.png" alt="" class="img-fluid d-block">
                                                </div>
                                                
                                                <div id="external-events" class="mt-2">
                                                    <br>
                                                    <p class="text-muted">Drag and drop your event or click in the calendar</p>
                                                    <div class="external-event fc-event bg-success" data-class="bg-success">
                                                        <i class="mdi mdi-checkbox-blank-circle font-size-11 me-2"></i>New Event Planning
                                                    </div>
                                                    <div class="external-event fc-event bg-info" data-class="bg-info">
                                                        <i class="mdi mdi-checkbox-blank-circle font-size-11 me-2"></i>Meeting
                                                    </div>
                                                    <div class="external-event fc-event bg-warning" data-class="bg-warning">
                                                        <i class="mdi mdi-checkbox-blank-circle font-size-11 me-2"></i>Generating Reports
                                                    </div>
                                                    <div class="external-event fc-event bg-danger" data-class="bg-danger">
                                                        <i class="mdi mdi-checkbox-blank-circle font-size-11 me-2"></i>Create New theme
                                                    </div>
                                                </div>
                                            
                                                <ol class="activity-feed mb-0 ps-2 mt-4 ms-1">
                                                    <li class="feed-item">
                                                        <p class="mb-0">Andrei Coman magna sed porta finibus, risus
                                                            posted a new article: Forget UX Rowland</p>
                                                    </li>
                                                    <li class="feed-item">
                                                        <p class="mb-0">Zack Wetass, sed porta finibus, risus Chris Wallace Commented Developer Moreno</p>
                                                    </li>
                                                    <li class="feed-item">
                                                        <p class="mb-0">Zack Wetass, Chris combined Commented UX Murphy</p>
                                                    </li>
                                                </ol>
                                            </div>
                                        </div>
                                    </div> <!-- end col-->

                                    <div class="col-lg-9">
                                        <div class="card">
                                            <div class="card-body">
                                                <div id="calendar"></div>
                                            </div>
                                        </div>
                                    </div> <!-- end col -->

                                </div> 

                                <div style='clear:both'></div>


                                <!-- Add New Event MODAL -->
                                <div class="modal fade" id="event-modal" tabindex="-1">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header py-3 px-4 border-bottom-0">
                                                <h5 class="modal-title" id="modal-title">Event</h5>

                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>

                                            </div>
                                            <div class="modal-body p-4">
                                                <form class="needs-validation" name="event-form" id="form-event" novalidate>
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="mb-3">
                                                                <label class="form-label">Event Name</label>
                                                                <input class="form-control" placeholder="Insert Event Name"
                                                                    type="text" name="title" id="event-title" required value="" />
                                                                <div class="invalid-feedback">Please provide a valid event name</div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="mb-3">
                                                                <label class="form-label">Category</label>
                                                                <select class="form-control form-select" name="category" id="event-category">
                                                                    <option  selected> --Select-- </option>
                                                                    <option value="bg-danger">Danger</option>
                                                                    <option value="bg-success">Success</option>
                                                                    <option value="bg-primary">Primary</option>
                                                                    <option value="bg-info">Info</option>
                                                                    <option value="bg-dark">Dark</option>
                                                                    <option value="bg-warning">Warning</option>
                                                                </select>
                                                                <div class="invalid-feedback">Please select a valid event category</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row mt-2">
                                                        <div class="col-6">
                                                            <button type="button" class="btn btn-danger" id="btn-delete-event">Delete</button>
                                                        </div>
                                                        <div class="col-6 text-end">
                                                            <button type="button" class="btn btn-light me-1" data-bs-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-success" id="btn-save-event">Save</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div> <!-- end modal-content-->
                                    </div> <!-- end modal dialog-->
                                </div>
                                <!-- end modal-->

                            </div>
                        </div>
                        
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

        <!-- JAVASCRIPT -->
        <script src="assets/libs/jquery/jquery.min.js"></script>
        <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="assets/libs/metismenu/metisMenu.min.js"></script>
        <script src="assets/libs/simplebar/simplebar.min.js"></script>
        <script src="assets/libs/node-waves/waves.min.js"></script>
        <script src="assets/libs/waypoints/lib/jquery.waypoints.min.js"></script>
        <script src="assets/libs/jquery.counterup/jquery.counterup.min.js"></script>

        <!-- plugin js -->
        <script src="assets/libs/moment/min/moment.min.js"></script>
        <script src="assets/libs/jquery-ui-dist/jquery-ui.min.js"></script>
        <script src="assets/libs/%40fullcalendar/core/main.min.js"></script>
        <script src="assets/libs/%40fullcalendar/bootstrap/main.min.js"></script>
        <script src="assets/libs/%40fullcalendar/daygrid/main.min.js"></script>
        <script src="assets/libs/%40fullcalendar/timegrid/main.min.js"></script>
        <script src="assets/libs/%40fullcalendar/interaction/main.min.js"></script>

        <!-- Calendar init -->
        <script src="assets/js/pages/calendar.init.js"></script>

        <!-- App js -->
        <script src="assets/js/app.js"></script>

    </body>

<!-- Mirrored from themesbrand.com/minible/layouts/calendar.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 31 May 2022 13:16:01 GMT -->
</html>
