<?php include_once('header.php'); ?>
        <!-- Page Content -->
 <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Ajouter des étudiants:</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>


            
            

            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Listes des étudiants:
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                        <div class="row">
        <form accept="" method="POST">
                <div class="col-sm-3">
                    <div class="dataTables_length">
                        <select name="stg_grp" class="form-control input-sm">
                            
                            <?php
                            $req = $mysqli->query("SELECT * FROM group_");
                            echo'<option value="'.$_SESSION['group'].'">'.$_SESSION['group'].'</option>';
                              while($rows = $req->fetch_assoc()) 
                                {
                                    echo '<option value="'.$rows["code_g"].'">'.$rows["code_g"].'</option>';
                                }
                               
                            ?>
                        </select>
                    </div>
                </div>
            </div>
                      <div class="col-sm-4">   
                      </div>  
                                <div class="col-sm-4">
                                    <?php
                                     
                                            echo '
					
                                            <div class="form-group">
                                                <input type="text" name="nom" class="form-control" placeholder="Entrer Nom">
                                            </div>
                                      
                                            <div class="form-group">
                                                <input type="text" name="prenom" class="form-control" placeholder="Entrer Prenom">
                                            </div>
                                        
                                            <div class="form-group">
                                                <input type="date" name="date_" value="'.date("Y-m-d").'" class="form-control" placeholder="Date de naiss">
                                            </div>
                                            <div class="form-group">
                                                <select name="genre" class="form-control">
													<option value="sexe">sexe</option>
                                                    <option value="homme">Homme</option>
                                                    <option value="femme">Femme</option>
                                                </select>
                                            </div>
											<div class="form-group">
                                                <select name="Compétence" class="form-control">
                                                    <option value="">Compétence</option>
                                                    <option value="Maquettage">Maquettage et prototypage</option>
													<option value="Web">Intégration Web</option>
													<option value="PHP">Réaliser des composants dynamique avec PHP</option>
													<option value="BD">Réaliser des composants daccés de base de données</option>
													<option value="APP">Déployer un application</option>
													<option value="AG">Gestion de proget agile</option>
													<option value="APP">Versionning</option>
                                                </select>
                                            </div>
											<div class="form-group">
                                                <input type="text" name="parcours"  class="form-control" placeholder="Entrer le parcours">
                                            </div>
                                        ';
                                        
                                    ?>
                                       <!--  <td class="center">
                                            <div class="form-group">
                                                <input type="file" name="img" class="form-control" >
                                            </div>
                                        </td> -->
                                    <div id="dataTables-example_filter" class="dataTables_filter">
                                        <input type="submit" name="ajt_stg" value="Ajoutée" class="btn btn-outline btn-primary" >
                                    </div>
                               </div>
                           <!-- <input type="submit" name="ajt_stg" value="Valider" class="btn btn-outline btn-primary">-->
                        </form>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
        </div>
                        <?php
                            if (isset($_POST['ajt_stg'])) 
                            {
                                if ($_POST['stg_grp']!="") 
                                {
                                    $_SESSION['group'] = $_POST['stg_grp'];
									
                                    $nom = $mysqli->real_escape_string($_POST['nom']);
                                    $prenom = $mysqli->real_escape_string($_POST['prenom']);
                                    $date_ = $mysqli->real_escape_string($_POST['date_']);
                                    $genre = $mysqli->real_escape_string($_POST['genre']);
									$parcours = $mysqli->real_escape_string($_POST['parcours']);
                                    $stg_grp = $mysqli->real_escape_string($_POST['stg_grp']);
                                    if ($stg_grp != "") 
                                    {
                                         $insert_row = $mysqli->query("INSERT INTO etudiant(nom, prenom, age, genre, parcours ,groups) VALUES('$nom','$prenom','$date_','$genre','$parcours','$stg_grp')");
                                    }
                                    else
                                    {
                                        echo '<script type="text/javascript"> alert("Un champs est vide");</script>';
                                    }
                                }
                                else
                                {
                                    echo '<script type="text/javascript"> alert("Selectionée un group");</script>';
                                }
                            }
                             $req->free();
                            // close connection 
                            $mysqli->close();
                        ?>

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
