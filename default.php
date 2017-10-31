<?php
	include("config.php");
	session_start();

	if($_SERVER["REQUEST_METHOD"] == "POST") {
		//brukernavnet og passordet sent fra formen

		$myusername = mysqli_real_escape_string($db, $_POST['username']);
		$mypassword = mysqli_real_escape_string($db, $_POST['password']);

		$sql = "SELECT idbruker FROM bruker WHERE brukerNavn = '$myusername' AND passord = '$mypassword'";
		$result = mysqli_query($db, $sql);
		$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
		$active = $row['active'];

		$count = mysqli_num_rows($result);

		// hvis brukernavn og passord matcher, skal row være 1
		if ($count == 1) {
			$_SESSION['login_user'] = $myusername;
			header("location: welcome.php");
		} else {
			$error = "Your Login Name or Password is invalid";
		}
	}
 ?>

<html>

<head>
	<title>Forelesning</title>
	<meta charset="utf8">
	<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="HandheldFriendly" content="true">

	<!--##Device = Mobiles (Portrait)-->
	<link rel="stylesheet" type="text/css" href="css/default/defaultMobilePortrait.css" media="screen and (min-width: 234px) and (max-width: 480px)" />
	<!--##Device = Low Resolution Tablets, Mobiles (Landscape)-->
	<link rel="stylesheet" type="text/css" href="css/default/defaultMobileLandscape.css" media="screen and (min-width: 481px) and (max-width: 767px)" />
	<!--##Device = Tablets, Laptops, Desktops (portrait)-->
	<link rel="stylesheet" type="text/css" href="css/default/defaultTablet.css" media="screen and (min-width: 768px) and (max-width: 1280px)" />
	<!--##Device = Tablets, Laptops, Desktops (portrait)-->
	<link rel="stylesheet" type="text/css" href="css/default/defaultDesktop.css" media="screen and (min-width: 1281px)">
	<!-- Hentet fra w3schools -->
	<!-- Endret av Fredrik Ravndal -->
  <script src="js/w3.js"></script>
	<!-- Hentet fra w3schools -->
	<!-- Endret av Fredrik Hulaas -->
	<script type="text/javascript" src="js/mobile-menu.js"></script>
</head>

<body>
		<!-- Header for logo -->
		<header class="logosection">
			<img id="desktoplogo" src="picture/default/logo-desktop.png" alt="logo image" style="height:100px; width:300px; padding-left: 12.5%; padding-top: 0.5%;" />
			<img id="mobilelogo" src="picture/default/logo-mobile.png" alt="logo image" style="height:100%; width:100%;" />
		</header>

			<!-- Loginform -->
      <form action="default.php" method="post" class="formtop">
				<p id="loginlabel">Logg inn</p>
        <div id="logbruker">
        	<label for="brukernavn" class="brukernavnTekst">Brukernavn</label>
        	<input class="brukernavnmobile" type="text" name="username">
      	</div>

        <div id="logpassord">
        	<label for="passord" class="passordTekst">Passord</label>
        	<input class="passordmobile" type="password" name="password">
      	</div>

				<div id="loginbutton">
					<input class="login" type="submit" value="Logg Inn" >
				</div>
			</form>

			<div id="headerbutton">
				<input class="login" type="submit" value="Logg Inn" >
			</div>

			<section id="registerbtn">
				<p id="registerText">Registrer deg for å ta del i studentlivet!</p>
				<input class="registerMobile" type="button" value="Registrer deg her!" />
			</section>

			<!-- Registerform for desktop-->
    	<article id="container">
				<aside id="topcontent">
					<aside id="reg" w3-include-html="register.html">
					</aside>
					<div id="infospan">
						<p style="font-size: 20px; ">Informasjon</p>
						<br>
						<p>
							Her kommer beskrivende tekst om nettstedet.
						</p>
					</div>
				</aside>
    	</article>

			<!-- Dropdownmenu for mobile -->
			<footer id="faq">
				<a class="dropbtn" onclick="myFunction()" style="color: black;" href="#">
					Lurer du på noe?
				</a>
				<div id="myDropdown" class="dropdown-content">
					<a href="#"><img  id="kryss" src="picture/default/x.png" alt="logo image"/></a>
					<a href="kontaktOss.php">Kontakt oss</a>
					<a href="Regler.php">Regler & FAQ</a>
				</div>
			</footer>

			<!-- Script from w3schools, to include another html file -->
			<script>
				w3.includeHTML();
			</script>

</body>
<!-- Denne siden er utviklet av Fredrik Ravndal og Fredrik Hulaas, siste gang endret 28.09.2017 -->
<!-- Denne siden er kontrollert av Ola Bredviken og Håvard Betten, siste gang 28.09.2017 -->
</html>
