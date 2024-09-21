
<?php
  session_start();
    require_once('identifier.php');
    include "db.php";

$msg = $_GET["msg"];
$email = $_SESSION["email"];

$q = "SELECT A.email, S.email FROM Administrateur A, Secretaire S WHERE email='$email'";
$params=array($email,$msg);

$resultat=$conn->prepare($requete);



if ($rq = mysqli_query($db, $q)) {
  if (mysqli_num_rows($rq) == 1) {

    $q = "INSERT INTO msg (email, msg) VALUES ('$email','$msg')";
    $rq = mysqli_query($db, $q);

  }
}

?>