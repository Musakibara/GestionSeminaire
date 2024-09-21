<?php
    require_once('connexiondb.php');
    require_once('identifier.php');
    
    /*
    if(isset($_GET['nomF']))
        $nomf=$_GET['nomF'];
    else
        $nomf="";
    */
  
    $nomSecret=isset($_GET['nomSecret'])?$_GET['nomSecret']:"";
    $email=isset($_GET['email'])?$_GET['email']:"";

    $size=isset($_GET['size'])?$_GET['size']:7;
    $page=isset($_GET['page'])?$_GET['page']:1;
    $offset=($page-1)*$size;

    $requete="select * from Secretaire
        where nomSecret like '%$nomSecret%'
        limit $size
        offset $offset";
        
    $requeteCount="select count(*) countS from Secretaire
        where nomSecret like '%$nomSecret%'";
    

    $resultatS=$conn->query($requete);

    $resultatCount=$conn->query($requeteCount);
    $tabCount=$resultatCount->fetch();
    $nbrSecret=$tabCount['countS'];
    $reste=$nbrSecret % $size;   // % operateur modulo: le reste de la division 
                                 //euclidienne de $nbrFiliere par $size
    if($reste===0) //$nbrFiliere est un multiple de $size
        $nbrPage=$nbrSecret/$size;   
    else
        $nbrPage=floor($nbrSecret/$size)+1;  // floor : la partie entière d'un nombre décimal
?>
<!DOCTYPE HTML>
<HTML>
    <head>
        <meta charset="utf-8">
        <title>Gestion des Secretaires</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
        <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script> -->
        <link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="../css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="../css/monstyle.css">
        <link rel="stylesheet" href="../CSS/bootstrap.min.css">

        <link rel="shortcut icon" href="../images/favicon.svg" type="image/x-icon">
        <link rel="shortcut icon" href="../images/favicon.png" type="image/png">

        <link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="../css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="../css/monStyle.css">
        <script src="../js/jquery-1.10.2.js"></script>
        <script src="../js/bootstrap.min.js"></script>
    </head>
    <body>
        <?php include("menu1.php"); ?>
        <br>
        <div class="container">
            <div class="panel panel-success margetop60">
          
				<div class="panel-heading text-center">Rechercher des Secretaires</div>
				<div class="panel-body">
					
					<form method="get" action="secretaire" class="form-inline">
					
						<div class="form-group">
                            
                            <input type="text" name="nomSecret" 
                                   placeholder="Nom de la secretaire"
                                   class="form-control"
                                   value="<?php echo $nomSecret ?>"/>
                                   
                        </div>
                        <div class="form-group">
    
                            <input type="text" name="email" 
                                   placeholder="Adresse Email"
                                   class="form-control"
                                   value="<?php echo $email ?>"/>
           
                        </div>
                        
			            
				        <button type="submit" class="btn btn-success">
                            <span class="bi bi-search"></span>
                            Chercher...
                        </button> 
                        
                        &nbsp;&nbsp;
                       	
                        <a href="newSecret">

                            <span class="glyphicon glyphicon-plus" style="font-size: 2rem;"></span>
                            <!-- <span class="glyphicon glyphicon-plus" style="font-size: 3rem;"></span> -->
                            
                            Nouvelle Secretaire
                            
                        </a>                
                         
					</form>
				</div>
			</div>
            
            <div class="panel panel-primary">
                <div class="panel-heading">Liste des Secretaires (<?php echo $nbrSecret ?> Secretaires)</div>
                <div class="panel-body">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th class="text-center">Id Secretaires</th><th class="text-center">Nom Secretaires</th><th class="text-center">Email Secretaires</th><th class="text-center">Actions</th>

                            </tr>
                        </thead>
                        
                        <tbody>
                            <?php while($Secretaire=$resultatS->fetch()){ ?>
                                <tr>
                                    <td class="text-center"><?php echo $Secretaire['idSecretaire'] ?> </td>
                                    <td class="text-center"><?php echo $Secretaire['nomSecret'] ?> </td>
                                    <td class="text-center"><?php echo $Secretaire['email'] ?> </td>
                                    
                                        <td class="text-center">
                                            <a href="editerSecret?idSecretaire=<?php echo $Secretaire['idSecretaire'] ?>">
                                                <span class="bi bi-pencil-square" style="color: var(--bs-success);"></span>
                                            </a>
                                            &nbsp;&nbsp;&nbsp;&nbsp;
                                            <a onclick="return confirm('Etes vous sur de vouloir supprimer la Secretaire ??')" href="deleteSecret?idSecretaire=<?php echo $Secretaire['idSecretaire'] ?>">
                                                    <span class="bi bi-trash3-fill" style="color: var(--bs-danger);"></span>
                                            </a>
                                        </td>
                                    
                                </tr>
                            <?PHP } ?>
                       </tbody>
                    </table>
                <div>
                    <ul class="pagination">
                        <?php for($i=1;$i<=$nbrPage;$i++){ ?>
                            <li class="<?php if($i==$page) echo 'active' ?>"> 
            <a href="Secretaire?page=<?php echo $i;?>&nomSecret=<?php echo $nomSecret ?>&email=<?php echo $email ?>">
                                    <?php echo $i; ?>
                                </a> 
                             </li>
                        <?php } ?>
                    &nbsp&nbsp&nbsp&nbsp
                    <!-- </ul> -->
                        <!-- &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp --> 
                    <!-- <a href="#" class="btn btn-primary"> -->
                    	<!-- <span class="glyphicon glyphicon-plus" style="font-size: 2rem;"></span> NOUVEAU -->
                    <!-- </a> -->
                </div>
                </div>
            </div>
        </div>
    </body>
</HTML>