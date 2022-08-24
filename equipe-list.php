<!doctype html>
<html lang="en">

<?php
include('include/security.php');
$pageTitle = 'Equipe List';
include "./include/connect.php";
include "./include/head-link.php" ?>


<body>

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
                                <h4 class="mb-0">Equipe List</h4>

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
                                    <div class="row mb-2">
                                        <div class="col-md-6">
                                            <div class="col-md-4">
                                                <button type="button" class="btn btn-success waves-effect waves-light mb-3" data-bs-toggle="modal" data-bs-target="#myModal"><i class="mdi mdi-plus me-1"></i> Ajouté Member</button>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-inline float-md-end mb-3">
                                                <div class="search-box ms-2">
                                                    <div class="position-relative">
                                                        <input type="text" class="form-control rounded bg-light border-0" id="search" placeholder="Search...">
                                                        <i class="mdi mdi-magnify search-icon"></i>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>


                                    </div>
                                    <!-- end row -->



                                    <div class="table-responsive-xl ">
                                        <table id="datatable" class="table  table-nowrap mb-0">
                                            <thead>
                                                <tr>
                                                    <td></td>
                                                    <td></td>
                                                    <th scope="col">Nom Complet</th>
                                                    <th scope="col">Poste</th>
                                                    <th scope="col">Téléphone</th>
                                                    <th scope="col">Email</th>
                                                    <th scope="col">Mot de pass</th>
                                                    <th scope="col" style="width: 100px;">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $qury = "SELECT * FROM equipe WHERE is_delete=0";
                                                $resq = $connection->query($qury);
                                                if ($resq) {
                                                    while ($row = mysqli_fetch_assoc($resq)) {
                                                ?>
                                                        <tr>
                                                            <td><b style="display: none;"><?php echo $row['ID'] ?></b></td>
                                                            <td><b style="display: none;"><?php echo $row['Prenom'] ?></b><img src=<?php echo $row['photo'] ?> alt="" class="avatar-xs rounded-circle me-2"></td>
                                                            <td><?php echo $row['Nom'] ?><input type="text" value="<?php echo $row['Prenom'] ?>" class="border-0 text-dark" style="--bs-text-opacity: 0.8 ;"></td>
                                                            <td><?php echo $row['jobe'] ?></td>
                                                            <td><?php echo $row['Mobile'] ?></td>
                                                            <td><?php echo $row['Email'] ?></td>
                                                            <td><b style="display: none;"><?php echo $row['password'] ?></b><input id="password" class="form-control" type="password" maxlength="12" name="password" value="<?php echo $row['password'] ?>" disabled style="border: none;background-color: #fff;"></td>
                                                            <td>
                                                                <ul class="list-inline mb-0">
                                                                    <li class="list-inline-item">
                                                                        <a class="btn waves-effect waves-light editbtn" data-bs-toggle="modal" data-bs-target="#editmodal" href=""><i class="uil uil-pen font-size-18 text-primary"></i></a>
                                                                    </li>
                                                                    <li class="list-inline-item">
                                                                        <a id="" data-bs-toggle="modal" data-bs-target="#delete_popup" class="btn text-danger delete-btn"><i class="uil uil-trash-alt font-size-18"></i></a>
                                                                    </li>

                                                                </ul>
                                                            </td>
                                                        </tr>
                                                <?php
                                                    }
                                                }
                                                ?>


                                            </tbody>
                                        </table>



                                    </div>
                                    <div class="row mt-4">
                                        <div class="col-sm-6">
                                            <div>
                                                <p class="mb-sm-0">Showing 1 to 10 of 12 entries</p>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="float-sm-end">
                                                <ul class="pagination mb-sm-0">
                                                    <li class="page-item disabled">
                                                        <a href="#" class="page-link"><i class="mdi mdi-chevron-left"></i></a>
                                                    </li>
                                                    <li class="page-item">
                                                        <a href="#" class="page-link">1</a>
                                                    </li>
                                                    <li class="page-item active">
                                                        <a href="#" class="page-link">2</a>
                                                    </li>
                                                    <li class="page-item">
                                                        <a href="#" class="page-link">3</a>
                                                    </li>
                                                    <li class="page-item">
                                                        <a href="#" class="page-link"><i class="mdi mdi-chevron-right"></i></a>
                                                    </li>
                                                </ul>
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
            <!-----------------Edit Member------------------->
            <!-- The Modal -->
            <div class="modal fade" id="editmodal" style="backdrop-filter: blur(8px);">
                <div class="modal-dialog">
                    <div class="modal-content">

                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h4 class="modal-title text-primary">Modifier Member :</h4>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>

                        <!-- Modal body -->
                        <div class="modal-body">
                            <!--------- Input Pop Up Add client------------>
                            <div class="col-xl-12">
                                <div class="card-body">
                                    <!----------Form Pop Up ---------->
                                    <form class="needs-validation" method="POST" action="./code-edit-list.php" id="formcheckb" enctype='multipart/form-data' novalidate>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <input type="hidden" name="idm" class="form-control" id="id22" value="">
                                                    <label class="form-label" for="client">Nom </label>
                                                    <input type="text" class="form-control" id="nom2" name="nom2" placeholder="Nom member" value="" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label" for="entreprise">Prénom</label>
                                                    <input type="text" class="form-control" id="prenom2" name="prenom2" placeholder="Prénom member" required>
                                                </div>

                                                <div class="mb-3">
                                                    <label class="form-label" for="Email">Poste</label>
                                                    <input type="text" class="form-control" id="poste2" name="poste2" placeholder="Poste member" required>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label" for="tel">Numéro De Téléphone</label>
                                                    <input id="tel2" name="tel2" type="text" class="form-control" required placeholder="Numéro 06<->05...." />
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label" for="Email">Email</label>
                                                    <input type="email" class="form-control" id="email2" name="email2" parsley-type="email" placeholder="Email member" required />
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label" for="Email">Mot de pass</label>
                                                    <input data-toggle="password" id="password2" name="pass2" class="form-control password2" type="password" maxlength="12" name="password" placeholder="Mot de Pass" value="" required>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="mb-3">
                                                    <label class="form-label" for="entreprise">Photo</label>
                                                    <input type="file" class="form-control" id="img2" name="file2" required>

                                                </div>
                                            </div>


                                        </div>
                                </div>
                            </div>
                            <button class="btn btn-primary " id="" type="submit" name="sub_editmember">Modifier Member</button>
                            </form>

                        </div>
                        <!-- end card -->
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div> <!-- end col -->

                    <!-------------End Input Add client------------>
                    <!-- Modal footer -->
                </div>
            </div>
            <!-----------------End Ediit Member--------------->
            <!------------Delete modal member---------->
            <!-- Modal -->
            <div class="modal fade" id="delete_popup" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="backdrop-filter: blur(8px);">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title text-danger" id="exampleModalLabel">Supprimer Memeber !</h5>
                            <button type="button" class="close text-danger border-0 bg-white font-size-20" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body text-center">
                            <form action="code-edit-list.php" method="POST">
                                <input type="hidden" class="form-control" id="idsup" name="id_supp">
                                <i class="uil-annoyed text-danger border-0 " style="font-size:100px ;"></i><br>
                                <b class="text-danger">Confirmer La Supprission ?</b>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-info" data-bs-dismiss="modal">Annulé</button>
                            <button type="submit" class="btn btn-danger " name="sub_deletemember">Supprimer</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!------------End Delete modal member------->
            <!-----------------------ADD EQUIPE---------------------->
            <!-- The Modal -->
            <div class="modal fade" id="myModal" style="backdrop-filter: blur(8px);">
                <div class="modal-dialog">
                    <div class="modal-content">

                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h4 class="modal-title text-primary">Ajouté Member :</h4>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>

                        <!-- Modal body -->
                        <div class="modal-body">
                            <!--------- Input Pop Up Add client------------>
                            <div class="col-xl-12">
                                <div class="card-body">
                                    <!----------Form Pop Up ---------->
                                    <form class="needs-validation" method="POST" action="./code-list.php" id="formcheckb" enctype='multipart/form-data' novalidate>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label" for="client">Nom </label>
                                                    <input type="text" class="form-control" id="" name="nom" placeholder="Nom member" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label" for="entreprise">Prénom</label>
                                                    <input type="text" class="form-control" id="" name="prenom" placeholder="Prénom member" required>
                                                </div>

                                                <div class="mb-3">
                                                    <label class="form-label" for="Email">Poste</label>
                                                    <input type="text" class="form-control" id="" name="poste" placeholder="Poste member" value="" required>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label" for="tel">Numéro De Téléphone</label>
                                                    <input data-parsley-type="number" name="tel" type="number" class="form-control" required placeholder="Numéro 06<->05...." />
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label" for="Email">Email</label>
                                                    <input type="email" class="form-control" name="email" parsley-type="email" placeholder="Email member" required />
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label" for="Email">Mot de pass</label>
                                                    <input type="password" class="form-control" id="" name="password" placeholder="Mot de Pass" value="" required>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="mb-3">
                                                    <label class="form-label" for="entreprise">Photo</label>
                                                    <input type="file" class="form-control" id="" name="file" required>

                                                </div>
                                            </div>


                                        </div>
                                </div>
                            </div>
                            <button class="btn btn-primary " id="" type="submit" name="sub_addmember">Ajouté Member</button>
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
        <!--------------------END ADD EQUIPE---------------------->

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
    <!------------------------modal edit---------------------->
    <script>
        $(document).ready(function() {

            $('.editbtn').on('click', function() {

                $('#editmodal').modal('show');

                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function() {
                    return $(this).text();
                }).get();
                $('#id22').val(data[0]);
                $('#idsup').val(data[0]);
                $('#prenom2').val(data[1]);
                $('#nom2').val(data[2]);
                $('#poste2').val(data[3]);
                $('#tel2').val(data[4]);
                $('#email2').val(data[5]);
                $('#password2').val(data[6]);
                $('#img2').val(data[1]);

            });
        });
    </script>
    <!-------------------Modal delete----------------->
    <script>
        $(document).ready(function() {

            $('.delete-btn').on('click', function() {

                $('#delete_popup').modal('show');

                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function() {
                    return $(this).text();
                }).get();
                $('#idsup').val(data[0]);
            });
        });
    </script>
    <!-------------------Modal delete----------------->
    <script>
        $(document).ready(function() {

            $('.delete-btn').on('click', function() {

                $('#delete_popup').modal('show');

                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function() {
                    return $(this).text();
                }).get();
                $('#idsup').val(data[0]);
            });
        });
    </script>
    <!---------------search live in table--------------------->
    <script>
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
    </script>

</body>

<!-- Mirrored from themesbrand.com/minible/layouts/contacts-list.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 31 May 2022 13:16:31 GMT -->

</html>