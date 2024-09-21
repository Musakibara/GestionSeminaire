<?php
    require_once('connexiondb.php');
    require_once('identifierForm.php');
    
    /*
    if(isset($_GET['nomF']))
        $nomf=$_GET['nomF'];
    else
        $nomf="";
    */
  
    $denomination=isset($_GET['denomination'])?$_GET['denomination']:"";
    $typeConsult=isset($_GET['typeConsultant'])?$_GET['typeConsultant']:"all";

    $size=isset($_GET['size'])?$_GET['size']:6;
    $page=isset($_GET['page'])?$_GET['page']:1;
    $offset=($page-1)*$size;


    if($typeConsult=="all"){
        $requeteForm="select * from Consultant
                where denomination like '%$denomination%'
                limit $size
                offset $offset";
        
        $requeteCount="select count(*) countForm from Consultant
                where denomination like '%$denomination%'";
    }else{
         $requeteForm="select * from Consultant
                where denomination like '%$denomination%'
                and typeConsultant='$typeConsult'
                limit $size
                offset $offset";
        
        $requeteCount="select count(*) countForm from Consultant
                where denomination like '%$denomination%'
                and typeConsultant='$typeConsult'";
    }
    
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

    $resultatForm=$conn->query($requeteForm);

    $resultatCount=$conn->query($requeteCount);
    $tabCount=$resultatCount->fetch();
    $nbrForm=$tabCount['countForm'];
    $reste=$nbrForm % $size;   // % operateur modulo: le reste de la division 
                                 //euclidienne de $nbrFiliere par $size
    if($reste===0) //$nbrFiliere est un multiple de $size
        $nbrPage=$nbrForm/$size;   
    else
        $nbrPage=floor($nbrForm/$size)+1;  // floor : la partie entière d'un nombre décimal
?>
<!DOCTYPE HTML>
<HTML>
    <head>
        <meta charset="utf-8">
        <title>Gestion des Consultants</title>
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
        <?php require_once('menu1Form.php'); ?>
        <br>
        <div class="container">
            <div class="panel panel-success margetop60">
          
				<div class="panel-heading text-center">Rechercher des Consultants</div>
				<div class="panel-body">
					
					<form method="get" action="consultantParti" class="form-inline">
					
						<div class="form-group">
                            
                            <input type="text" name="denomination" 
                                   placeholder="Denomination"
                                   class="form-control"
                                   value="<?php echo $denomination ?>"/>
              
                        </div>
                    
                        <label for="typeConsultant">Type:</label>
                        <select name="typeConsultant" class="form-control" id="typeConsultant" onchange="this.form.submit()">
                            <option value="all" <?php if($typeConsult==="all") echo "selected"?>> Tous les types </option>
                            <option value="externe" <?php if($typeConsult==="externe") echo "selected"?>> Externe </option>
                            <option value="interne" <?php if($typeConsult==="interne") echo "selected"?>> Interne </option>
                            <option value="mixte" <?php if($typeConsult==="mixte") echo "selected"?>> Mixte </option>
                        </select>
        
				        <button type="submit" class="btn btn-success">
                            <span class="bi bi-search"></span>
                            Chercher...
                        </button> 
                                             
					</form>
				</div>
			</div>
            
            <div class="panel panel-primary">
                <div class="panel-heading">Liste des Consultants (<?php echo $nbrForm ?> Consultants)</div>
                <div class="panel-body">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th class="text-center">IdConsultants</th><th class="text-center">Type Consultants</th><th class="text-center">Denominations</th><th class="text-center">Formateur1</th><th class="text-center">Formateur2</th><th class="text-center">Formateur3</th><th class="text-center">Numero</th><th class="text-center">NIU</th><th class="text-center">Email</th>

                            </tr>
                        </thead>
                        
                        <tbody>
                            <?php while($Consultant=$resultatForm->fetch()){ ?>
                                <tr class="<?php echo $Consultant['etat']==1?'success':'danger'?>">
                                    <td class="text-center"><?php echo $Consultant['idConsultant'] ?> </td>
                                    <td class="text-center"><?php echo $Consultant['typeConsultant'] ?> </td>
                                    <td class="text-center"><?php echo $Consultant['denomination'] ?> </td>
                                    <td class="text-center"><?php echo $Consultant['formateur1'] ?> </td>
                                    <td class="text-center"><?php echo $Consultant['formateur2'] ?> </td>
                                    <td class="text-center"><?php echo $Consultant['formateur3'] ?> </td>
                                    <td class="text-center"><?php echo $Consultant['numTel'] ?> </td>
                                    <td class="text-center"><?php echo $Consultant['NIU'] ?> </td>
                                    <td class="text-center"><?php echo $Consultant['email'] ?> </td>
                                                                        
                                </tr>
                            <?PHP } ?>
                       </tbody>
                    </table>
                <div>
                    <ul class="pagination">
                        <?php for($i=1;$i<=$nbrPage;$i++){ ?>
                            <li class="<?php if($i==$page) echo 'active' ?>"> 
            <a href="consultantForm?page=<?php echo $i;?>&denomination=<?php echo $denomination ?>&typeConsultant=<?php echo $typeConsult ?>">
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