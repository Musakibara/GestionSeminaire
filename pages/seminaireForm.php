<?php
    require_once('connexiondb.php');
    require_once('identifierForm.php');
    
    /*
    if(isset($_GET['nomF']))
        $nomf=$_GET['nomF'];
    else
        $nomf="";
    */
  
    $nomSemin=isset($_GET['nomSemin'])?$_GET['nomSemin']:"";

    $size=isset($_GET['size'])?$_GET['size']:5;
    $page=isset($_GET['page'])?$_GET['page']:1;
    $offset=($page-1)*$size;

    $requete="select * from Seminaire
        where nomSemin like '%$nomSemin%'
        limit $size
        offset $offset";
        
    $requeteCount="select count(*) countS from Seminaire
        where nomSemin like '%$nomSemin%'";
    
    //if($niveau=="all"){
    //    $requete="select * from filiere
    //            where nomFiliere like '%$nomf%'
    //            limit $size
    //            offset $offset";
    //    
    //    $requeteCount="select count(*) countF from filiere
    //            where nomFiliere like '%$nomf%'";
    //}else{
    //     $requete="select * from filiere
    //            where nomFiliere like '%$nomf%'
    //            and niveau='$niveau'
    //            limit $size
    //            offset $offset";
    //    
    //    $requeteCount="select count(*) countF from filiere
    //            where nomFiliere like '%$nomf%'
    //            and niveau='$niveau'";
    //}

    $resultatS=$conn->query($requete);

    $resultatCount=$conn->query($requeteCount);
    $tabCount=$resultatCount->fetch();
    $nbrSemin=$tabCount['countS'];
    $reste=$nbrSemin % $size;   // % operateur modulo: le reste de la division 
                                 //euclidienne de $nbrFiliere par $size
    if($reste===0) //$nbrFiliere est un multiple de $size
        $nbrPage=$nbrSemin/$size;   
    else
        $nbrPage=floor($nbrSemin/$size)+1;  // floor : la partie entière d'un nombre décimal
?>
<!DOCTYPE HTML>
<HTML>
    <head>
        <meta charset="utf-8">
        <title>Gestion des Seminaires</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
        <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script> -->
        <link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="../css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="../css/monstyle.css">
        <link rel="stylesheet" href="../CSS/bootstrap.min.css">

        <link rel="shortcut icon" href="../images/favicon.svg" type="image/x-icon">
        <link rel="shortcut icon" href="../images/favicon.png" type="image/png">
        <style>
			body{
				background-color: #eeebeb;
			}
		</style>

    </head>
    <body>
    <?php include('menu1Form.php'); ?>
        <br>
        <div class="container">
            <div class="panel panel-success margetop60">
          
				<div class="panel-heading text-center">Rechercher des Seminaires</div>
				<div class="panel-body">
					
					<form method="get" action="Seminaire.php" class="form-inline">
					
						<div class="form-group">
                            
                            <input type="text" name="nomSemin" 
                                   placeholder="Nom du Seminaire"
                                   class="form-control"
                                   value="<?php echo $nomSemin ?>"/>
                                   
                        </div>
                        
			            
				        <button type="submit" class="btn btn-success">
                            <span class="bi bi-search"></span>
                            Chercher...
                        </button>

					</form>
				</div>
			</div>
            
            <div class="panel panel-primary">
                <div class="panel-heading">Liste des Seminaires (<?php echo $nbrSemin ?> Seminaires)</div>
                <div class="panel-body">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th class="text-center">Id Seminaires</th><th class="text-center">Nom Seminaires</th><th class="text-center">programme</th><th class="text-center">Listes des Participants</th><th class="text-center">Rapports</th><th class="text-center">Listes du Kit</th><th>supportCours</th><th class="text-center">Actions</th>

                            </tr>
                        </thead>
                        
                        <tbody>
                            <?php while($Seminaire=$resultatS->fetch()){ ?>
                                <tr>
                                    <td class="text-center"><?php echo $Seminaire['idSeminaire'] ?> </td>
                                    <td class="text-center"><?php echo $Seminaire['nomSemin'] ?> </td>
                                    <td class="text-center"><?php echo $Seminaire['programme'] ?> </td>
                                    <td class="text-center"><?php echo $Seminaire['listPart'] ?> </td>
                                    <td class="text-center"><?php echo $Seminaire['rapport'] ?> </td>
                                    <td class="text-center"><?php echo $Seminaire['kit'] ?> </td>
                                    <td class="text-center" ><?php echo $Seminaire['supportCours'] ?> </td>

                                    
                                        <td class="text-center">
                                            &nbsp;
                                            <a href="newSupport?idSeminaire=<?php echo $Seminaire['idSeminaire'] ?>">
                                                <span class="bi bi-upload" style="color: var(--bs-success);"></span>
                                            </a>
                                            &nbsp;
                                            <a href="print?idSeminaire=<?php echo $Seminaire['idSeminaire'] ?>">
                                                <span class="bi bi-printer-fill" style="color: var(--bs-primary);"></span>
                                            </a>
                                            <!-- &nbsp; -->
                                            <!-- <a href="print.php?idSeminaire="> -->
                                                <!-- <span class="bi bi-eye-fill"  style="color: var(--bs-primary);"></span> -->
                                            <!-- </a> -->
                                        </td>
                                    
                                </tr>
                            <?PHP } ?>
                       </tbody>
                    </table>
                <div>
                    <ul class="pagination">
                        <?php for($i=1;$i<=$nbrPage;$i++){ ?>
                            <li class="<?php if($i==$page) echo 'active' ?>"> 
                                <a href="SeminaireForm?page=<?php echo $i;?>&nomSemin=<?php echo $nomSemin ?>">
                                    <?php echo $i; ?>
                                </a> 
                             </li>
                        <?php } ?>
                    </ul>
                </div>
                </div>
            </div>
        </div>
    </body>
</HTML>