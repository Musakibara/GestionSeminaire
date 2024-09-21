<?php
    require_once('connexiondb.php');
    require_once('identifierSecret.php');
    
    /*
    if(isset($_GET['nomF']))
        $nomf=$_GET['nomF'];
    else
        $nomf="";
    */
  
    $nomParti=isset($_GET['nomParti'])?$_GET['nomParti']:"";
    $nomStructure=isset($_GET['nomStructure'])?$_GET['nomStructure']:"";

    $size=isset($_GET['size'])?$_GET['size']:4;
    $page=isset($_GET['page'])?$_GET['page']:1;
    $offset=($page-1)*$size;

    $requete="select * from Participant
        where nomParti like '%$nomParti%'
        limit $size
        offset $offset";
        
    $requeteCount="select count(*) countP from Participant
        where nomParti like '%$nomParti%'";
    
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

    $resultatP=$conn->query($requete);

    $resultatCount=$conn->query($requeteCount);
    $tabCount=$resultatCount->fetch();
    $nbrParti=$tabCount['countP'];
    $reste=$nbrParti % $size;   // % operateur modulo: le reste de la division 
                                 //euclidienne de $nbrFiliere par $size
    if($reste===0) //$nbrFiliere est un multiple de $size
        $nbrPage=$nbrParti/$size;   
    else
        $nbrPage=floor($nbrParti/$size)+1;  // floor : la partie entière d'un nombre décimal
?>
<!DOCTYPE HTML>
<HTML>
    <head>
        <meta charset="utf-8">
        <title>Gestion des Particiapnts</title>
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
        <?php require_once('menuSecret.php'); ?>

        <br>
        <div class="container">
            <div class="panel panel-success margetop60">
          
				<div class="panel-heading text-center">Rechercher des Particiapnts</div>
				<div class="panel-body">
					
					<form method="get" action="participant.php" class="form-inline">
					
						<div class="form-group">
                            
                            <input type="text" name="nomParti" 
                                   placeholder="Nom du participant"
                                   class="form-control"
                                   value="<?php echo $nomParti ?>"/>
                                   
                        </div>
                        <div class="form-group">
    
                            <input type="text" name="nomStructure" 
                                   placeholder="Nom de la Structure"
                                   class="form-control"
                                   value="<?php echo $nomStructure ?>"/>
           
                        </div>
                        
			            
				        <button type="submit" class="btn btn-success">
                            <span class="bi bi-search"></span>
                            Chercher...
                        </button> 
                        
					</form>
				</div>
			</div>
            
            <div class="panel panel-primary">
                <div class="panel-heading">Liste des Particiapnts (<?php echo $nbrParti ?> Participants)</div>
                <div class="panel-body">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th class="text-center">Id Participants</th><th class="text-center">Nom Participant</th><th class="text-center">Email Participant</th><th class="text-center">Numero telephonique</th><th class="text-center">Nom Structure</th><th class="text-center">Photo</th>
                            </tr>
                        </thead>
                        
                        <tbody>
                            <?php while($Participant=$resultatP->fetch()){ ?>
                                <tr class="<?php echo $Participant['etat']==1?'success':'danger'?>">
                                    <td class="text-center"><?php echo $Participant['idParticipant'] ?> </td>
                                    <td class="text-center"><?php echo $Participant['nomParti'] ?> </td>
                                    <td class="text-center"><?php echo $Participant['email'] ?> </td>
                                    <td class="text-center"><?php echo $Participant['numTel'] ?> </td>
                                    <td class="text-center"><?php echo $Participant['nomStructure'] ?> </td>
                                    <td class="text-center">
                                        <img src="../Documents/photo/<?php echo $Participant['photo']?>"
                                        width="50px" height="50px" class="img-circle">
                                    </td> 
                                                                        
                                </tr>
                            <?PHP } ?>
                       </tbody>
                    </table>
                <div>
                    <ul class="pagination">
                        <?php for($i=1;$i<=$nbrPage;$i++){ ?>
                            <li class="<?php if($i==$page) echo 'active' ?>"> 
            <a href="ParticipantSecret?page=<?php echo $i;?>&nomParti=<?php echo $nomParti ?>&nomStructure=<?php echo $nomStructure ?>">
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