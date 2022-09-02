<!DOCTYPE html>
<html lang="en">
<?php
include('include/security.php');
$pageTitle = 'Projet';
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

                                <!-- <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Minible</a></li>
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                    </div> -->

                            </div>
                        </div>
                    </div>
                    <!--sec somary-->
                    <?php
                    $sql = "SELECT COUNT(Id_order) AS 'som' from order_item where qte_enStock>=0";
                    $sql2 = "SELECT COUNT(Id_order) AS 'som' from order_item where qte_enStock <= 0";
                    $sql3 = "SELECT COUNT(Id_order) AS 'som' from order_item where categorie='digital'";
                    $sql4 = "SELECT COUNT(Id_order) AS 'som' from order_item where categorie='physique'";
                    $result = $connection->query($sql);
                    $result2 = $connection->query($sql2);
                    $result3 = $connection->query($sql3);
                    $result4 = $connection->query($sql4);
                    $stock_in = mysqli_fetch_assoc($result);
                    $stock_out = mysqli_fetch_assoc($result2);
                    $digital = mysqli_fetch_assoc($result3);
                    $physique = mysqli_fetch_assoc($result4);
                    ?>
                    <div class="row">
                        <div class="col-md-6 col-xl-3">
                            <div class="card" style="border-radius: 20px;">
                                <div class="card-body">
                                    <div class="float-end mt-2">
                                        <i class="uil-question-circle text-primary" style="font-size: 40px;"></i>
                                        <!-- <div id="total-revenue-chart"></div> -->
                                    </div>
                                    <div>
                                        <h4 class="mb-1 mt-1 text-primary"><span data-plugin="counterup"><?php echo $physique['som']; ?></span></h4>
                                        <span class="badge rounded-pill bg-primary " style="font-size: 14px;">Article Physique</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end col-->
                        <div class="col-md-6 col-xl-3">
                            <div class="card" style="border-radius: 20px;">
                                <div class="card-body">
                                    <div class="float-end mt-2">
                                        <i class="uil-clock text-pink" style="font-size: 40px;"></i>
                                        <!-- <div id="total-revenue-chart"></div> -->
                                    </div>
                                    <div>
                                        <h4 class="mb-1 mt-1 text-pink"><span data-plugin="counterup"><?php echo $digital['som']; ?></span></h4>
                                        <span class="badge rounded-pill bg-pink " style="font-size: 14px;">Article Digital</span>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- end col-->
                        <div class="col-md-6 col-xl-3">
                            <div class="card" style="border-radius: 20px;">
                                <div class="card-body">
                                    <div class="float-end mt-2">
                                        <i class="uil-x text-success" style="font-size: 40px;"></i>
                                        <!-- <div id="total-revenue-chart"></div> -->
                                    </div>
                                    <div>
                                        <h4 class="mb-1 mt-1 text-success"><span data-plugin="counterup"><?php echo $stock_in['som']; ?></span></h4>
                                        <span class="badge rounded-pill bg-success " style="font-size: 14px;">En Stock</span>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- end col-->
                        <div class="col-md-6 col-xl-3">
                            <div class="card" style="border-radius: 20px;">
                                <div class="card-body">
                                    <div class="float-end mt-2">
                                        <i class="uil-check-circle text-danger" style="font-size: 40px;"></i>
                                        <!-- <div id="total-revenue-chart"></div> -->
                                    </div>
                                    <div>
                                        <h4 class="mb-1 mt-1 text-danger"><span data-plugin="counterup"><?php echo $stock_out['som']; ?></span></h4>
                                        <span class="badge rounded-pill bg-danger " style="font-size: 14px;">En Rupture de stock</span>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- end col-->

                    </div> <!-- end row-->
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <?php
                                    $email2 = $_SESSION['user'];
                                    $query110 = " SELECT * FROM login WHERE type='admin' AND email='$email2'";
                                    $resry110 = $connection->query($query110);
                                    if (mysqli_num_rows($resry110) > 0) {
                                    ?>
                                        <div class="col-md-4">
                                            <button type="button" class="btn btn-success waves-effect waves-light mb-3" data-bs-toggle="modal" data-bs-target="#myModal"><i class="mdi mdi-plus me-1"></i> Ajouté article</button>
                                        </div>
                                    <?php } ?>
                                    <!-- end row -->
                                    <div class="table-responsive-xl ">
                                        <table id="datatable" class="table table-centered  table-nowrap mb-0">
                                            <thead>
                                                <tr>
                                                    <th>Article</td>
                                                    <th style="width: 10%;">Description</th>
                                                    <th>Prix</th>
                                                    <th>Quatité en stock</th>
                                                    <th>Catégorie</th>
                                                    <th>Date création</th>
                                                    <th style="display: none;">id article</th>
                                                    <?php if (mysqli_num_rows($resry110) > 0) {
                                                    ?><th>Action</th><?php
                                                                    } else { ?>
                                                        <th style="display:none;"></th>
                                                    <?php } ?>
                                                    
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $article = "SELECT * FROM order_item WHERE is_deleted=0 ";
                                                $res_art = $connection->query($article);
                                                if ($res_art) {
                                                    while ($row = mysqli_fetch_assoc($res_art)) {
                                                ?>
                                                        <tr>
                                                            <td><?php echo $row['title_order'] ?></td>
                                                            <td><?php if ($row['desc_order'] == '') {
                                                                    echo '<i class="text-danger font-size-12">Aucun description</i>';
                                                                } else {
                                                                    echo $row['desc_order'];
                                                                } ?></td>
                                                            <td><?php echo $row['price_order'] ?></td>
                                                            <td><?php echo $row['qte_enStock'] ?></td>
                                                            <td><?php echo $row['categorie'] ?></td>
                                                            <td><?php echo $row['date_add'] ?></td>
                                                            <td style="display: none;"><?php echo $row['Id_order'] ?></td>
                                                            <?php
                                                            $query10 = " SELECT * FROM login WHERE type='admin' AND email='$email2'";
                                                            $resry10 = $connection->query($query10);
                                                            if (mysqli_num_rows($resry10) > 0) {
                                                            ?>
                                                                <td>
                                                                    <ul class="list-inline mb-0">
                                                                        <li class="list-inline-item">
                                                                            <a class="btn waves-effect waves-light editbtn2" data-bs-toggle="modal" data-bs-target="#editmodal2" href=""><i class="uil uil-pen font-size-18 text-primary"></i></a>
                                                                        </li>
                                                                        <li class="list-inline-item">
                                                                            <a id="" data-bs-toggle="modal" data-bs-target="#delete_article" class="btn text-danger delete-article"><i class="uil uil-trash-alt font-size-18"></i></a>
                                                                        </li>

                                                                    </ul>
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

                <!-- The Modal -->
                <div class="modal fade" id="myModal" style="backdrop-filter: blur(8px);">
                    <div class="modal-dialog">
                        <div class="modal-content">

                            <!-- Modal Header -->
                            <div class="modal-header">
                                <h4 class="modal-title text-success">Ajouté article :</h4>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>

                            <!-- Modal body -->
                            <div class="modal-body">
                                <!--------- Input Pop Up Add Project------------>
                                <div class="col-xl-12">
                                    <div class="card-body">
                                        <!----------Form Pop Up ---------->
                                        <form class="needs-validation" method="POST" action="./auth/code.php" id="formcheckb" novalidate>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="designation">Désignation<i class="text-danger">*</i></label>
                                                        <input type="text" class="form-control" id="designation" name="designation_item" placeholder="Désignation d'article" value="" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="mb-3">
                                                        <!--------------Drop Down Client ----------->
                                                        <div class="form-group">
                                                            <label class="form-label" for="desc_item">Description<i class="text-secondary">(Optionnel)</i></label>
                                                            <textarea name="desc_article" id="desc_item" class="form-control" rows="2" placeholder="Description d'article"></textarea>
                                                        </div>
                                                        <!--------------End Drop Down Client ----------->

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Quantité <i class="text-danger">*</i></label>
                                                    <input type="text" placeholder="Quantité" name="qte_article" required>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="price_article">Prix d'article <i class="text-danger">*</i></label>
                                                        <div class="input-group">
                                                            <div class="input-group-text">Dhs</div>
                                                            <input class="form-control" type="number" step="any" min="1" id="price_article2" name="price_item" placeholder="Prix d'article" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="mb-3">
                                                        <div class="col-md-12">
                                                            <div class="mb-3">
                                                                <!--------------Drop Down Client ----------->
                                                                <div class="form-group">
                                                                    <label class="form-label" for="validationCustom05">Catégorie <i class="text-danger">*</i></label><br />
                                                                    <input class="form-check-input" type="radio" name="category" id="physique" value="physique" required>
                                                                    <label class="form-check-label" for="physique">
                                                                        Physique
                                                                    </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                    <input class="form-check-input" type="radio" name="category" id="digital" value="digital" required>
                                                                    <label class="form-check-label" for="digital">
                                                                        Digital
                                                                    </label>
                                                                </div>
                                                                <!--------------End Drop Down Client ----------->

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div><br />
                                            <button class="btn btn-success w-100" id="btn-project" type="submit" name="sub_addarticle">Ajouté article</button>
                                        </form>
                                    </div>
                                    <!-- end card -->
                                </div> <!-- end col -->
                                <!-------------End Input Add article------------>
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
        <!---------------------- End Modal Add article -------------------->

        <!------------Delete modal article---------->
        <!-- Modal -->
        <div class="modal fade" id="delete_article" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="backdrop-filter: blur(8px);">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title text-danger" id="exampleModalLabel">Delete Memeber !</h5>
                        <button type="button" class="close text-danger border-0 bg-white font-size-20" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body text-center">
                        <form action="./auth/code.edit.php" method="POST">
                            <input type="hidden" class="form-control" id="article_del" name="article_delete">
                            <i class="uil-annoyed text-danger border-0 " style="font-size:100px ;"></i><br>
                            <b class="text-danger">Confirmer La Supprission ?</b>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-info" data-bs-dismiss="modal">Annulé</button>
                        <button type="submit" class="btn btn-danger " name="sub_deletearticle">Supprimé</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!------------End Delete modal article------->
        <!-- End Page-content -->
        <!-----------------Edit article------------------->
        <!-- The Modal -->
        <div class="modal fade" id="editmodal2" style="backdrop-filter: blur(8px);">
            <div class="modal-dialog">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title text-success">Edit article :</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <div class="col-xl-12">
                            <div class="card-body">
                                <!----------Form Pop Up ---------->
                                <form class="needs-validation" method="POST" action="./auth/code.php" id="formcheckb" novalidate>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label class="form-label" for="designation">Désignation<i class="text-danger">*</i></label>
                                                <input type="text" class="form-control" id="designation_p" name="designation_item" placeholder="Désignation d'article" value="" required>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <div class="form-group">
                                                    <label class="form-label" for="desc_item">Description<i class="text-secondary">(Optionnel)</i></label>
                                                    <textarea id="desc_itemarea" class="form-control" rows="2" placeholder="Description d'article"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label class="form-label">Quantité <i class="text-danger">*</i></label>
                                            <input type="text" placeholder="Quantité" name="qte_article" id="qte_article" required>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label class="form-label" for="price_article">Prix d'article <i class="text-danger">*</i></label>
                                                <div class="input-group">
                                                    <div class="input-group-text">Dhs</div>
                                                    <input class="form-control" type="number" min="1" id="price_article_it" step="any" name="price_item" placeholder="Prix d'article" required>
                                                </div>
                                                <!-- <input type="text" class="form-control"   > -->
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <div class="col-md-12">
                                                    <div class="mb-3">
                                                        <div class="form-group">
                                                            <label class="form-label" for="cat">Catégorie <i class="text-danger">*</i></label><br />
                                                            <input class="form-check-input" type="radio" name="category" id="physique2" value="physique" required>
                                                            <label class="form-check-label" for="physique2">
                                                                Physique
                                                            </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                            <input class="form-check-input" type="radio" name="category" id="digital2" value="digital" required>
                                                            <label class="form-check-label" for="digital2">
                                                                Digital
                                                            </label>
                                                        </div>
                                                        <!--------------End Drop Down Client ----------->

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div><br />
                                    <button class="btn btn-success w-100" id="btn-project" type="submit" name="sub_edtitem">Modifier article</button>
                                </form>

                            </div>
                            <!-- end card -->
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                            </div>
                        </div> <!-- end col -->


                        <!-- Modal footer -->
                    </div>
                </div>
                <!-----------------End Ediit article--------------->


            </div>
        </div>

    </div>
    <!--footer-->
    <?php include "./include/footer.inc.php" ?>

    <!--Right sidebar setting-->
    <?php include "./include/setting-right.bar.php" ?>
    <!--Right sidebar setting-->

    <!--scripts-->
    <?php include './include/scripts.inc.php' ?>
    <!-----DatePicker Script---->




    <!-----------AJAX CODE EDIT--------->
    <script>
        $(document).ready(function() {

            $('.editbtn2').on('click', function() {
                $('#editmodal2').modal('show');
                $tr = $(this).closest('tr');
                var data = $tr.children("td").map(function() {
                    return $(this).text();
                }).get();
                $('#designation_p').val(data[4]);
                $('#desc_itemarea').val(data[1]);
                $("#qte_article").val(data[3]);
                $("#price_article_it").val(data[2]);
                $('input[name=category][value=' + data[4] + ']').attr('checked', true)
                // $('#digital :checked').val();

            });
        });
        //! delete article
        $(document).ready(function() {

            $('.delete-article').on('click', function() {
                $('#delete_article').modal('show');
                $tr = $(this).closest('tr');
                var data = $tr.children("td").map(function() {
                    return $(this).text();
                }).get();
                $('#article_del').val(data[6]);
            });
        });
    </script>
    <script>
        $("input[name='qte_article']").TouchSpin({
            min: 1,
            max: 1000000000,
            stepinterval: 50,
            maxboostedstep: 10000000,
            buttondown_class: "btn btn-success",
            buttonup_class: "btn btn-success",
        });
    </script>

    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
</body>

</html>