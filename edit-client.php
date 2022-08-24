<!DOCTYPE html>
<html lang="en">
<?php
session_start();
$pageTitle = 'Edit Client';
include './include/head-link.php';
include './include/connect.php';


$id_client = $_REQUEST['ID'];
$qury = "SELECT * FROM client  WHERE ID=$id_client";
$resry = $connection->query($qury);
if ($resry) {
    $row = mysqli_fetch_assoc($resry);
    $nom_client = $row['Nom'];
    $company_cl = $row['company'];
    $email_cl = $row['email'];
    $tel_cl = $row['phone'];
    $active = $row['active'];
} else
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
                <form class="needs-validation" method="POST" action="./auth/code.edit.php?ID=<?php echo $id_client ?>" id="formcheckb" novalidate>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label class="form-label" for="client">Nom du Client</label>
                                <input type="text" class="form-control" id="" name="nom_c" placeholder="Nom du Client" value="<?php echo $nom_client ?>" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="entreprise">Entreprise</label>
                                <input type="text" class="form-control" id="" name="nom_company" placeholder="Nom d'Entreprise" value="<?php echo $company_cl ?>" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="Email">Email</label>
                                <input type="email" class="form-control" name="email_c" required parsley-type="email" placeholder="Enter a valid e-mail" value="<?php echo $email_cl ?>" />
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="Email">Numéro De Téléphone</label>
                            <input data-parsley-type="number" name="tel_c" type="number" class="form-control" required placeholder="Numéro 06<->05...." value="<?php echo $tel_cl ?>" />
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="Email">Active</label>
                            <div class="form-check form-switch checkactive">
                                <?php if ($row['active'] == 'True') { ?>
                                    <input class="form-check-input " type="checkbox" name="checkact" value="True" checked>
                                <?php } else { ?>
                                    <input class="form-check-input " type="checkbox" name="checkact" value="True">
                                <?php } ?>
                            </div>

                        </div>
                    </div>


            </div>


            <button class="btn btn-primary " id="" type="submit" name="sub_editclient">Edit Client</button>
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

    


</body>

</html>