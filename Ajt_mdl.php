<?php include_once('header.php'); ?>

        <!-- Page Content -->
        <div id="page-wrapper">
         <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Ajouter Un Module:</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                       


                            <!-- /.row -->
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            Module informaition :
                                        </div>
                                        <div class="panel-body">
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <form role="form" action="" method="POST">
                                                        <div class="form-group">
                                                            <label class="control-label" >Module :</label>
                                                            <input type="text" name="mdl" placeholder="Module" class="form-control">
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label" >Horaire total :</label>
                                                            <input type="number" name="h_mdl" placeholder="Horaire e heurs" class="form-control">
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label" >Groups :</label>
                                                            <select name="mdl_grp" class="form-control input-sm">
                                                            <?php
                                                            $req = $mysqli->query("SELECT * FROM group_");
                                                            echo '<option value="'.$_SESSION['group'].'">'.$_SESSION['group'].'</option>';
                                                              while($rows = $req->fetch_assoc()) 
                                                                        {
                                                                            echo '<option value="'.$rows["code_g"].'">'.$rows["code_g"].'</option>';
                                                                        }
                                                                        $req->free();
                                                            ?>
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <input type="submit" name="ajt_mdl" class="btn btn-primary">
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                             <?php
                            if (isset($_POST['ajt_mdl'])) 
                            {
                                if ($_POST['mdl_grp'] != "") 
                                {
                                    $_SESSION['group'] = $_POST['mdl_grp'];
                                    $mdl = $mysqli->real_escape_string($_POST['mdl']);
                                    $h_mdl = $mysqli->real_escape_string($_POST['h_mdl']);
                                    $grp_mdl = $mysqli->real_escape_string($_POST['mdl_grp']);

                                    $insert_row = $mysqli->query("INSERT INTO module (intitule,horaire,grp_mdl) VALUES('$mdl' ,$h_mdl,'$grp_mdl')");
                                    $mysqli->close();
                                }
                                else
                                {
                                    echo '<script type="text/javascript"> alert("Selectionée un Group");</script>';
                                }
                            }
                            ?>




                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="../vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

</body>

</html>
