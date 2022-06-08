<?php include("config.php") ?>
<?php
// define variables and set to empty values
$Name = $Email = $Message = $Subject = "";

$EmailFrom = "WEBSITE";
$EmailTo = "contact@arness-business.com";
$EmailToMe = "sydneymondestin@gmail.com";
$EmailToDesty = "destineemoussavou@gmail.com";
$Subject = "Nouvelle Inscription"; 
// get all the data from the form 
// step 1 data
  $fname = ($_POST["fname"]);
  $lname = ($_POST["lname"]);
  $ville = ($_POST["ville"]);	 
  $dateofbirth = date("Y-m-d", strtotime($_POST["dateofbirth"]));
  $adress = ($_POST["adress"]);
  $phone = ($_POST["phone"]);
  $email = ($_POST["email"]);

// step 2 data
  $niveau = ($_POST["niveau"]);
  $diplome = ($_POST["diplome"]);        
  $situation = ($_POST["situation"]);

// step 3 data
  $departement = ($_POST["departement"]);
  $ethnie = ($_POST["ethnie"]);

// step 4 data
  $taille = ($_POST["taille"]);
  $social_media = ($_POST["social_media"]);
  $description = ($_POST["description"]);

// step 5 data
  $dreams = ($_POST["dreams"]);
  $ambitions = ($_POST["ambitions"]);
  $already = ($_POST["already"]);
  $casting = ($_POST["casting"]);
 

// prepare email body text to send to arness et desty
$Body = "";
$Body .= "Nom: ";
$Body .= $lname;
$Body .= "\n";
$Body .= "Prenoms: ";
$Body .= $lname;
$Body .= "\n";
$Body .= "Tel: ";
$Body .= $phone;
$Body .= "\n";
$Body .= "Subject: ";
$Body .= $Subject;
$Body .= "\n";

// save data of new miss into db 
 $insert=query("INSERT INTO `miss2021` (`fname`, `lname`, `ville`, `dateofbirth`, `adress`, `phone`, `email`, `niveau`, `diplome`, `situation`, `departement`, `ethnie`, `taille`, `social_media`, `description`, `dreams`, `ambitions`, `already`, `casting`) VALUES ('$fname','$lname','$ville','$dateofbirth','$adress','$phone','$email','$niveau','$diplome','$situation','$departement','$ethnie','$taille','$social_media','$description','$dreams','$ambitions','$already','$casting');");

// redirect to success page 
if ($insert){
	//  // send emailto arness
	// $arness = mail($EmailTo, $Subject, $Body, "From: <$EmailFrom>");
	// // send emailto mondestin
	// $mondestin = mail($EmailToMe, $Subject, $Body, "From: <$EmailFrom>");
	// // send emailto desty
	// $desty = mail($EmailToDesty, $Subject, $Body, "From: <$EmailFrom>");
	echo "INSERTED";

}
else{
  // print "<meta http-equiv=\"refresh\" content=\"0;URL=index.html\">";
	echo "NOT INSERTED TO BD, got some issues to handle data";
}
?>