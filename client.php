<!DOCTYPE html>
<html lang="en">
<?php
include('include/security.php');
$pageTitle = 'Client';
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
                            </div>
                        </div>
                    </div>
                    <?php
                    //total client
                    $gettotal = 'SELECT COUNT(ID) as total FROM client ';
                    $result_q = $connection->query($gettotal);
                    $total = mysqli_fetch_assoc($result_q);
                    //active
                    $total_act = "SELECT COUNT(ID) as totalact FROM client WHERE active='True'";
                    $result_act = $connection->query($total_act);
                    $total_act1 = mysqli_fetch_assoc($result_act);
                    //inactive
                    $total_ina = "SELECT COUNT(ID) as totalina FROM client WHERE active='false'";
                    $result_ina = $connection->query($total_ina);
                    $total_ina1 = mysqli_fetch_assoc($result_ina);

                    ?>
                    <!--sec somary-->
                    <div class="row">
                        <div class="col-md-6 col-xl-4">
                            <div class="card " style="border-radius: 20px;">
                                <div class="card-body">
                                    <div class="float-end mt-2">
                                        <i class="uil-users-alt text-dark" style="font-size: 40px;"></i>
                                        <!-- <div id="total-revenue-chart"></div> -->
                                    </div>
                                    <div>
                                        <h4 class="mb-1 mt-1 text-dark"><span data-plugin="counterup"><?php echo $total['total'] ?></span></h4>
                                        <span class="badge rounded-pill bg-gradient-dark " style="font-size: 14px;">Total Client</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end col-->
                        <div class="col-md-6 col-xl-4">
                            <div class="card " style="border-radius: 20px;">
                                <div class="card-body">
                                    <div class="float-end mt-2">
                                        <i class="uil-user-check text-success" style="font-size: 40px;"></i>
                                        <!-- <div id="total-revenue-chart"></div> -->
                                    </div>
                                    <div>
                                        <h4 class="mb-1 mt-1 text-success"><span data-plugin="counterup"><?php echo $total_act1['totalact'] ?></span>
                                        </h4>
                                        <span class="badge rounded-pill bg-gradient-success " style="font-size: 14px;">Active Client</span>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- end col-->
                        <div class="col-md-6 col-xl-4">
                            <div class="card " style="border-radius: 20px;">
                                <div class="card-body">
                                    <div class="float-end mt-2">
                                        <i class="uil-user-times text-danger" style="font-size: 40px;"></i>
                                        <!-- <div id="total-revenue-chart"></div> -->
                                    </div>
                                    <div>
                                        <h4 class="mb-1 mt-1 text-danger"><span data-plugin="counterup"><?php echo $total_ina1['totalina'] ?></span>
                                        </h4>
                                        <span class="badge rounded-pill bg-gradient-danger " style="font-size: 14px;">Inactive Client</span>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- end col-->
                        <!-- end col-->

                    </div> <!-- end row-->
                    <div class="row">
                        <div class="card">
                            <div class="card-body">



                                <div class="col-12">
                                    <?php
                                    $email2 = $_SESSION['user'];
                                    $query10 = " SELECT * FROM login WHERE type='admin' AND email='$email2'";
                                    $resry10 = $connection->query($query10);
                                    if (mysqli_num_rows($resry10) > 0) {
                                    ?>
                                        <div class="col-md-4">
                                            <div>
                                                <button type="button" class="btn btn-success waves-effect waves-light mb-3" data-bs-toggle="modal" data-bs-target="#myModal"><i class="mdi mdi-plus me-1"></i> Ajouté Client</button>
                                            </div>

                                        </div>
                                    <?php } ?>

                                    <div class="table-responsive-xl">
                                        <table id="datatable" class="table table-centered table-nowrap mb-0" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                            <thead>
                                                <tr>
                                                    <th>Nom du Client</th>
                                                    <th>Entreprise</th>
                                                    <th>Email</th>
                                                    <th>Numéro Téléphone</th>
                                                    <th>Active</th>
                                                    <?php
                                                    
                                                    if (mysqli_num_rows($resry10) > 0) {
                                                    ?>
                                                        <th>Edit</th>
                                                    <?php } ?>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $qury = "SELECT * FROM client";
                                                $resry = $connection->query($qury);

                                                if ($resry) {
                                                    while ($row = mysqli_fetch_assoc($resry)) { ?>
                                                        <tr>
                                                            <td><?php echo $row['Nom'] ?></td>
                                                            <td><?php echo $row['company'] ?></td>
                                                            <td><?php echo $row['email'] ?></td>
                                                            <td><?php echo $row['phone'] ?></td>
                                                            <td>
                                                                <div class="form-check form-switch checkactive">
                                                                    <?php if ($row['active'] == 'True') { ?>
                                                                        <input class="form-check-input " type="checkbox" name="checkact" value="<?php echo $row['active'] ?>" checked>
                                                                    <?php } else { ?>
                                                                        <input class="form-check-input " type="checkbox" name="checkact" value="<?php echo $row['active'] ?>">
                                                                    <?php } ?>
                                                                </div>
                                                            </td>
                                                            <?php
                                                           
                                                            if (mysqli_num_rows($resry10) > 0) {
                                                            ?>
                                                                <td>
                                                                    <!----TD edit in table----->
                                                                    <a type="button" href="edit-client?ID=<?php echo $row['ID'] ?>" name="edit" value="Edit" class="btn btn-info btn-xs edit_data">Edit</a>

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



                <!-- The Modal add client-->
                <div class="modal fade" id="myModal" style="backdrop-filter: blur(8px);">
                    <div class="modal-dialog">
                        <div class="modal-content">

                            <!-- Modal Header -->
                            <div class="modal-header">
                                <h4 class="modal-title text-primary">Ajouté Client :</h4>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>

                            <!-- Modal body -->
                            <div class="modal-body">
                                <!--------- Input Pop Up Add client------------>
                                <div class="col-xl-12">
                                    <div class="card-body">
                                        <!----------Form Pop Up ---------->
                                        <form class="needs-validation" method="POST" action="./auth/code.php" id="formcheckb" novalidate>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="client">Nom du Client</label>
                                                        <input type="text" class="form-control" id="" name="nom_c" placeholder="Nom du Client" value="" required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label" for="entreprise">Entreprise</label>
                                                        <input type="text" class="form-control" id="" name="nom_company" placeholder="Nom d'Entreprise" value="" required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label" for="Email">Email</label>
                                                        <input type="email" class="form-control" name="email_c" required parsley-type="email" placeholder="Enter a valid e-mail" />
                                                    </div>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label" for="Email">Numéro De Téléphone</label>
                                                    <input data-parsley-type="number" name="tel_c" type="number" class="form-control" required placeholder="Numéro 06<->05...." />
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label" for="Email">Active</label>
                                                    <div class="form-check form-switch checkactive">
                                                        <input class="form-check-input " type="checkbox" id="" name="checkact" id="langs_javascript" value="True">
                                                    </div>

                                                </div>
                                            </div>


                                    </div>


                                    <button class="btn btn-primary " id="" type="submit" name="sub_addclient">Ajouté
                                        Client</button>
                                    </form>
                                </div>
                                <!-- end card -->
                            </div> <!-- end col -->
                            <!-------------End Input Add client------------>
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
    <!---------------------- End Modal Add client -------------------->
    <!--footer-->
    <?php include "./include/footer.inc.php" ?>

    </div>
    <!--Right sidebar setting-->
    <?php include "./include/setting-right.bar.php" ?>
    <!--Right sidebar setting-->

    <!--scripts-->
    <?php include './include/scripts.inc.php' ?>

    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script>
        $('table input[type=checkbox]').attr('disabled', 'true');
    </script>
</body>

</html>