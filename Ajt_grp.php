<?php include_once('header.php'); ?>

        <!-- Page Content -->
        <div id="page-wrapper">
         <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Modifier un cours:</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                       
                        <?php

                        $horaire = "";
                        $intitule = "";
                        $mdl_grp = "";
                        $id_filliere = "";
                        $code_g = "";

                            if (isset($_GET['s']) && isset($_GET['ss'])) 
                            {
                                $reqt0 = $mysqli->query("SELECT * FROM module WHERE code_m = ".$_GET['ss']);
                                $val0 = $reqt0->fetch_assoc();
                                    $horaire = $mysqli->real_escape_string($val0['horaire']);
                                    $intitule = $mysqli->real_escape_string($val0['intitule']);
                                    $mdl_grp = $mysqli->real_escape_string($val0['grp_mdl']);

                                $reqt = $mysqli->query("SELECT * FROM group_ WHERE code_g='".$_GET['s']."'");
                                $val = $reqt->fetch_assoc();
                                    $id_filliere = $mysqli->real_escape_string($val['id_filliere']);
                                    $code_g = $mysqli->real_escape_string($val['code_g']);
                            }

                            if (isset($_GET['r']) && isset($_GET['rr'])) 
                            {
                                $reqt = $mysqli->query("DELETE FROM module WHERE code_m = ".$_GET['rr']);
                                $reqt = $mysqli->query("DELETE FROM group_ WHERE code_g = '".$_GET['r']."'");
                                //$reqt = $mysqli->query("DELETE FROM filliere WHERE code_g = '".$_GET['r']."'");

                                $reqt1 = $mysqli->query("SELECT * FROM examen WHERE id_module = ".$_GET['rr']);
                                $val1 = $reqt1->fetch_assoc();
                                $reqt = $mysqli->query("DELETE FROM examen WHERE id_module = ".$_GET['rr']);
                                $reqt = $mysqli->query("DELETE FROM etudiant WHERE groups = '".$_GET['r']."'");
                                $reqt = $mysqli->query("DELETE FROM absence WHERE id_m = ".$_GET['rr']);

                                echo '<script> window.location.replace("list_mdf_grp.php"); </script>';
                            }
                        ?>

                            <!-- /.row -->
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            Modifier Un Modue :
                                        </div>
                                        <div class="panel-body">
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <form role="form" action="" method="POST">
                                                        <div class="form-group">
                                                            <label class="control-label" >Filliere :</label>
                                                            <input type="text" value="<?php echo $id_filliere; ?>" name="filliere" placeholder="Filliere" class="form-control">
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label" >Group :</label>
                                                            <input type="text" value="<?php echo $code_g; ?>" name="group" placeholder="Groups" class="form-control">
                                                        </div>
                                                        <div class="form-group">
                                                            <input type="submit" name="c_group" class="btn btn-primary">
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <?php
                            if (isset($_POST['c_group'])) 
                            {
                       
                            $group = $mysqli->real_escape_string($_POST['group']);
                            $filliere = $mysqli->real_escape_string($_POST['filliere']);
                                $insert_row = $mysqli->query("UPDATE group_ SET code_g='$group', id_filliere='$filliere' WHERE code_g='".$_GET['s']."'");
                                $insert_row = $mysqli->query("UPDATE filliere SET code_f='$filliere' WHERE code_f='$filliere.");
                                $insert_row = $mysqli->query("UPDATE module SET intitule='$group' WHERE code_m='".$_GET['ss']."'");
                            }
                            ?>



                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                <div class="row">
                    <div class="col-lg-12">
                       


                            <!-- /.row -->
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            Ajouter un Module :
                                        </div>
                                        <div class="panel-body">
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <form role="form" action="" method="POST">
                                                        <div class="form-group">
                                                            <label class="control-label" >Module :</label>
                                                            <input type="text" value="<?php echo $intitule; ?>" name="mdl" placeholder="Module" class="form-control">
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label" >Horaire total :</label>
                                                            <input type="number" value="<?php echo $horaire ;?>" name="h_mdl" placeholder="Horaire e heurs" class="form-control">
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label" >Groups :</label>
                                                            <select name="mdl_grp" class="form-control input-sm">
                                                            <?php
                                                                        
                                                                echo '<option value="'.$_GET['s'].'">'.$_GET['s'].'</option>';
                                            
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

                                    $insert_row = $mysqli->query("UPDATE module SET intitule='$mdl',horaire=$h_mdl,grp_mdl='$grp_mdl' WHERE grp_mdl='".$_GET['s']."'");
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
