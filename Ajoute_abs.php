<?php include_once('header.php'); ?>

        <!-- Page Content -->
        <div id="page-wrapper">
         <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Ajouter une absence:</h1>
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
                            Listes d'absence:
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                        <div class="row">
            <form accept="" method="POST">
                <div class="col-sm-3">
                    <div class="dataTables_length">
                        <select name="grp_stg" class="form-control input-sm">
                            <?php
                        $req = $mysqli->query("SELECT * FROM group_");
                        echo '<option value="'.$_SESSION['group'].'">'.$_SESSION['group'].'</option>';
                          while($rows = $req->fetch_assoc()) 
                            {
                                echo '<option value="'.$rows["code_g"].'">'.$rows["code_g"].'</option>';
                            }							
							?>
                        </select>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div id="dataTables-example_filter" class="dataTables_filter">
                        <input type="submit" name="ch_abs" value="Chercher" class="btn btn-outline btn-primary" >
                    </div></br>
                </div>
            </form>
            </div>

                
        <?php

            if (isset($_POST['ch_abs'])) 
            {
                if ($_POST['grp_stg']!="" ) 
                {
                    $_SESSION['group'] = $_POST['grp_stg'];
                    //$grp_abs = $_POST['grp_stg'];
                    echo '<form action="" method="POST">
                            <div class="col-sm-3">
                              <div class="dataTables_length">
                                <select name="mdl" class="form-control input-sm">
                                    <option value="">Modules :</option>
                                    ';
                                    $req = $mysqli->query("SELECT * FROM module");

                                  while(($rows = $req->fetch_assoc())==!null) 
                                    {
                                        echo '<option value="'.$rows["code_m"].'">'.$rows["intitule"].'</option>';
                                    }
                                     
                    echo ' </select>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="dataTables_length">
                                <input type="date" name="date_jour" value="'.date("Y-m-d").'"  class="form-control input-sm" >
                            </div>
                        </div>';
                    $results = $mysqli->query("SELECT * FROM etudiant WHERE groups  = '".$_POST['grp_stg']."' ORDER BY prenom ");
                    echo '  <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
										<th>Mat</th>
                                        <th>Nom</th>
                                        <th>Prenom</th>
                                        <th>Heur Absence</th>
                                      <!--  <th>Image</th> -->
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="odd gradeX">';
                                 $j = 0;
                                 while(($row = $results->fetch_assoc())==!null) 
                                    {
                                       echo '<tr>';
                                        echo '<td>'.$row["nom"].'</td>';
                                        echo '<td>'.$row["prenom"].'</td>';
                                        echo '<td>'.$row["mat"].'<input type="hidden" name="mat-'.$j.'" value="'.$row["mat"].'"></td>';
                                        echo '<td>
                                            <select class="form-control input-sm" name="abs-'.$j.'">
                                               <option value="0" >Present</option>
                                               <option value="2.5" >2.5 Heurs</option>
                                               <option value="5" >5 Heurs</option> 
                                            </select>
                                         </td>';          $j++;
                                    }
                                   
                                        
                                      echo ' <!--  <td class="center">
                                            <div class="form-group">
                                                <input type="file" name="img" class="form-control" >
                                            </div>
                                        </td> -->
                                    </tr>
                                </tbody>
                            </table>
                            <input type="hidden" name="total" value="'.$j.'">
                            <input type="hidden" name="grp_stg_hid" value="'.$_POST['grp_stg'].'">
                            <input type="submit" name="ajt_abs" value="Valider" class="btn btn-outline btn-primary">

                        </form>';
                                    
                }
                else
                {
                    echo '<script type="text/javascript"> alert("Selectionée un Group");</script>';
                }
            }
            ?>
                <?php
                        if (isset($_POST['ajt_abs'])) 
                        {
                            $_SESSION['group'] = $_POST['grp_stg_hid'];
                            if ($_POST['mdl']!="" ) 
                             {
                                $i = 0;//echo 'totale est '.$_POST['total'];
                                foreach ($_POST as $key=>$value) 
                                 {
                                    if ($i<$_POST['total']) 
                                    { 
                                        $abs = $mysqli->real_escape_string($_POST['abs-'.$i]);
                                        $mdl = $mysqli->real_escape_string($_POST['mdl']);
                                        $cne = $mysqli->real_escape_string($_POST['mat-'.$i]);
                                        $date_jour = $mysqli->real_escape_string($_POST['date_jour']);
                                        //$grp_abs = $mysqli->real_escape_string($_POST['grp_abs']);
         
                                            $insert_row = $mysqli->query("INSERT INTO absence(id_s, id_m,h_abs,date_a) VALUES ($mat,$mdl,$abs,'$date_jour')");
                                            //echo "INSERT INTO absence(id_s, id_m,h_abs,date_a) VALUES ($cne,$mdl,$abs,'$date_jour')";
                                             $insert_row = $mysqli->query("DELETE FROM `absence` WHERE h_abs = 0.00");
                                    }
                                    //echo 'value : '.$value.'  key : '.$key.'</br>';
                                
                                     $i++;
                                }
                               
                             }
                            else
                            {
                                echo '<script type="text/javascript"> alert("Selectionée un Module");</script>';
                            }
                        }
                            // close connection 
                            $mysqli->close();
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

    <!-- Custom Theme JavaScript <a href="lien.html" target="_blank"></a> -->
    <script src="../dist/js/sb-admin-2.js"></script>

</body>

</html>