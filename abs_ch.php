<?php  include_once('header.php'); ?>



        <!-- Page Content -->
        <div id="page-wrapper">
         <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Chercher un absence:</h1>
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
                            Listes Des Stagiaires:
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                        <div class="row">
            <form accept="" method="POST">
                
<?php
    //$grp_abs = $_POST['grp_stg'];
    echo '<div class="col-sm-3">
              <div class="dataTables_length">
                <select name="mdl" class="form-control input-sm">
                    <option value="">.:: Groups ::.</option>
                    ';
                $reqt = $mysqli->query("SELECT * FROM group_");
                while($rows = $reqt->fetch_assoc()) 
                {
                    $req = $mysqli->query("SELECT * FROM module ");
                  while($row = $req->fetch_assoc()) 
                    {
                        echo '<option value="'.$rows["code_g"].'-'.$row['code_m'].'">'.$rows["code_g"].':'.$row["intitule"].'</option>';
                    }
                }
                     
    echo ' </select>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="dataTables_length">
                <input type="date" name="date_jour" value="'.date("Y-m-d").'"  class="form-control input-sm" >
            </div>
        </div>
         <div class="col-sm-3">
            <div id="dataTables-example_filter" class="dataTables_filter">
                <input type="submit" name="ch_abs" value="Chercher" class="btn btn-outline btn-primary" >
            </div></br>
        </div>
     </form>
   </div>';
 //  echo after('-',$_POST['mdl']).'::'.before('-',$_POST['mdl']);
if (isset($_POST['ch_abs'])) 
{
    if ($_POST['mdl']!="" ) 
    {
        $_SESSION['group'] = after('-',$_POST['mdl']);
        $results = $mysqli->query("SELECT * FROM etudiant WHERE groups  = '".before('-',$_POST['mdl'])."' ORDER BY prenom");
        echo '<form action="" method="POST">
               <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Prenom</th>
                        <th>Absence</th>
                    </tr>
                </thead>
                <tbody>';
                 $j = 0;
                 $abs = 0;
                 $mdl = after('-',$_POST['mdl']);
                 while($row = $results->fetch_assoc()) 
                    {

                        
                        $res = $mysqli->query("SELECT * FROM module WHERE code_m = '".$mdl."'");

                        while($row3 = $res->fetch_assoc()) 
                         {
                            $reslt2 = $mysqli->query("SELECT * FROM absence WHERE date_a = '".$_POST['date_jour']." 00:00:00' and id_m = ".$mdl." and id_s = ".$cne);
                            $abs = $reslt2->fetch_assoc();
                         }

                       // echo "SELECT * FROM absence WHERE date_a = '".$_POST['date_jour']." 00:00:00' and id_m = ".$mdl." and id_s = ".$cne."";
                         echo '<tr class="odd gradeX">';
                        echo '<td>'.$row["nom"].'</td>';
                        echo '<td>'.$row["prenom"].'</td>';
                        echo '<td>'.$abs['h_abs'].'</td>';
                        echo '</tr>';
                    }
                    echo '</tbody>
                    </table>
                </form>';
                            
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

    <!-- Custom Theme JavaScript <a href="lien.html" target="_blank"></a> -->
    <script src="../dist/js/sb-admin-2.js"></script>

</body>

</html>