<?php include_once('header.php'); ?>

        <!-- Page Content -->
        <div id="page-wrapper">
         <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Ajouter Un Examen / Controls:</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                       




                        <div class="col-lg-12">
                                </div>
                                <!-- /.col-lg-12 -->

                            <!-- /.row -->
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            Exam informaition :
                                        </div>
                                        <div class="panel-body">
                                          <div class="row">
                                            <form role="form" accept="" method="POST">
                                                <div class="dataTables_length">
                                                  <div class="col-lg-3">
                                                    <select name="exam_grp" class="form-control input-sm">
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
                                                </div>
                                                 <div class="col-sm-10">
                                                    <div class="form-group">
                                                        </br>
                                                            <input type="submit" name="ch_grp" value="Chercher" class="btn btn-primary">
                                                        </div>
                                                    </div>
                                            </form>

                                     <?php
                                        if (isset($_POST['ch_grp'])) 
                                        {
                                            $_SESSION['group'] = $_POST['exam_grp'];
                                            echo '<form role="form" accept="" method="POST">
                                                 <div class="col-sm-3">
                                                    <div class="form-group">
                                                        <label class="control-label" >Exam type :</label>
                                                        <select name="mdl_exam" class="form-control">
                                                            <option value="">Choisi Exam :</option>
                                                            <option value="efm">EFM</option>
                                                            <option value="control 1">Controle 1</option>
                                                            <option value="control 2">Controle 2</option>
                                                            <option value="control 3">Controle 3</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-sm-3">
                                                    <div class="form-group">
                                                        <label class="control-label" >Module :</label>
                                                        <select name="mdl" class="form-control">
                                                            <option value="">Choisi Module :</option>';
                                                            
                                                                $req = $mysqli->query("SELECT * FROM module where grp_mdl = '".$_POST['exam_grp']."'");

                                                              while($rows = $req->fetch_assoc()) 
                                                                        {
                                                                            echo '<option value="'.$rows["code_m"].'">'.$rows["intitule"].'</option>';
                                                                        }
                                                                        $req->free();
                                                                        // close connection 
                                                                       
                                                                
                                                    echo '</select>
                                                     </div>
                                                    </div>
                                                     <div class="col-sm-3">
                                                        <div class="form-group">
                                                                <label class="control-label" >Date Jour :</label>
                                                                <input type="date" name="date_exam" value="'.date("Y-m-d").'"  class="form-control input-sm" >
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <div class="form-group">
                                                        </br>
                                                            <input type="submit" name="ajt_exam" class="btn btn-primary">
                                                        </div>
                                                    </div>
                                                </form>';
                                        }
                                    ?>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                             <?php

                            if (isset($_POST['ajt_exam'])) 
                            {
                       
                            $mdl_exam = $mysqli->real_escape_string($_POST['mdl_exam']);
                            $mdl = $mysqli->real_escape_string($_POST['mdl']);
                            $date_exam = $mysqli->real_escape_string($_POST['date_exam']);

                            $insert_row = $mysqli->query("INSERT INTO examen (date_e,type,id_module) VALUES('$date_exam','$mdl_exam','$mdl')");
                            $mysqli->close();
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
