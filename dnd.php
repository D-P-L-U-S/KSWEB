<?php
session_start();

// Set the time to GMT + 1 
// Regler le fuseau horaire à GMT + 1
date_default_timezone_set("Africa/Douala");
require('inc/param.php');
if (!isset($_SESSION['conf2'])) {
	$_SESSION['mode'] = (date('H') >= $_SESSION['startDarkMode'] || date('H') < $_SESSION['endDarkMode']) ? 1 : 0;
}
if (!isset($_SESSION['conf'])) {
	$_SESSION['lang'] = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);
}
$url = 'http://' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'];
$url2 = 'http://' . $_SERVER['SERVER_NAME'];
require('inc/db.php');
$uname = php_uname();
$uname_parts = explode(' ', $uname);
?>
<!DOCTYPE html>
<html lang=<?= isset($_SESSION['lang']) && $_SESSION['lang'] == 'en' ? "en" : "fr" ?>>
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="theme-color" content="#4505bb" />
	<meta name="author" content="D-P-L-U-S" />
	<meta name="github" content="https://github.com/D-P-L-U-S/KSWEB" />
	<meta name="keywords" content="KSWEB, controls, Wamp, wampServer, Home, Accueil, ecran, de, contrôle" />
	<meta name="description" content=<?= isset($_SESSION['lang']) && $_SESSION['lang'] == 'en' ? "Manage more efficiently and navigate faster between your hosts.  Configure and visit or navigate directly from all your projects, consult and explore your hosts directly here." : "Gérer plus efficace et naviguer plus rapidement entre vos hosts. Configurer et visiter ou naviguer directement depuis l'ensemble de vos projets, consulter et explorer vos hosts directement ici." ?> />
	<title><?= isset($_SESSION['lang']) && $_SESSION['lang'] == 'en' ? "Home • KSWEB" : "Accueil • KSWEB" ?></title>
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/polices.css">
	<link rel="manifest" href="css/manifest.json">
	<link rel="shortcut icon" href="img/ksweb.png" type="image/x-icon">
	<script>
		window.addEventListener('load', () => {
			if ("serviceWorker" in navigator) {
				navigator.serviceWorker.register('sw.js');
			}
		})
	</script>
</head>
<body <?= $_SESSION['mode'] == 1 ? 'data-mode="dark"' : 'light-mode="0"' ?>>
	<main>
		<div class="main">
			<header>
				<div class="header">
					<div class="logo">
						<img src="img/ksweb.png" alt="Logo KSWEB">
						<div class="info">
							<h1>KSWEB</h1><span class="version">Version: <?= $_SESSION['ksweb_version'] == '' ? '3.986' : $_SESSION['ksweb_version'] ?></span>
						</div>
					</div>
					<div class="lang">
						<a href="auth/mode.php"><span class="mio"><?= $_SESSION['mode'] == 0 ? 'dark_mode' : 'light_mode' ?></span></a>
						<a href="auth/lang.php"><?= isset($_SESSION['lang']) && $_SESSION['lang'] == 'en' ? "Français" : "English" ?></a>
					</div>
				</div>
			</header>
			<div class="controls">
				<h2><?= isset($_SESSION['lang']) && $_SESSION['lang'] == 'en' ? 'General information' : 'Informations Générales' ?></h2>
				<div class="configs">
					<div class="infos">
						<h3><?= isset($_SESSION['lang']) && $_SESSION['lang'] == 'en' ? 'Server configuration' : 'Configuration <br> du serveur' ?></h3>
						<ul>
							<li>
								<span class="tit"><?= isset($_SESSION['lang']) && $_SESSION['lang'] == 'en' ? 'Name of current server' : 'Nom du serveur actuel' ?></span><br>
								<span class="reply"><?= $_SERVER['SERVER_SOFTWARE'] ?></span>

							</li>
							<li>
								<span class="tit"><?= isset($_SESSION['lang']) && $_SESSION['lang'] == 'en' ? 'PHP version' : 'Version de php' ?></span><br>
								<span class="reply"><?= phpversion(); ?></span>

							</li>
							<li>
								<span class="tit"><?= isset($_SESSION['lang']) && $_SESSION['lang'] == 'en' ? 'Database server' : 'Serveur de Base de donnée' ?></span><br>
								<span class="reply"><?= $server_name ?></span>
							</li>
						</ul>
					</div>
					<div class="infos">
						<h3><?= isset($_SESSION['lang']) && $_SESSION['lang'] == 'en' ? "Informations of the <br> operating system" : "Informations du <br>Système d'exploitation" ?></h3>
						<ul>
							<li>
								<span class="tit"><?= isset($_SESSION['lang']) && $_SESSION['lang'] == 'en' ? 'OS name' : 'Nom du SE' ?></span><br>
								<span class="reply"><?= $uname_parts[0] . ' ' . $uname_parts[1] . ' ' . $uname_parts[2] . ' ' ?></span>

							</li>
							<li>
								<span class="tit"><?= isset($_SESSION['lang']) && $_SESSION['lang'] == 'en' ? 'OS version' : 'Version du SE' ?></span><br>
								<span class="reply"><?= 'Android 13 • '. $uname_parts[3] . ' ' . $uname_parts[4] . ' ' . $uname_parts[5] . ' ' . $uname_parts[6] . ' ' . $uname_parts[7] ?></span>

							</li>
							<li>
								<span class="tit"><?= isset($_SESSION['lang']) && $_SESSION['lang'] == 'en' ? 'Processor architecture' : 'Architecture du processeur' ?></span><br>
								<span class="reply"><?= $uname_parts[12] ?></span>
							</li>
						</ul>
					</div>
				</div>
				<?php require("inc/dir.php") ?>
				<div class="tools">
					<h2><?= isset($_SESSION['lang']) && $_SESSION['lang'] == 'en' ? 'Tools supplied with the server' : 'Outils fournis avec le serveur' ?></h2>
					<ul>
						<li>
							<a target="_blank" href="<?= $url2 . ':'. $portPhpMyAdmin ?>">phpMyAdmin</a>
						</li>
						<li>
							<a target="_blank" href="<?= $url2 . ':' . $portAdmirer ?>">Admirer</a>
						</li>
						<li>
							<a target="_blank" href="<?= $url . '/phpinfo' ?>"><?= isset($_SESSION['lang']) && $_SESSION['lang'] == 'en' ? 'PHP info' : 'Informations sur PHP' ?></a>
						</li>
					</ul>
				</div>
				<div class="projets">
					<h2><?= isset($_SESSION['lang']) && $_SESSION['lang'] == 'en' ? 'Your virtuals hosts' : 'Vos hôtes virtuelles' ?></h2>
					<div class="files">
						<?php require("inc/vhosts.php") ?>
					</div>
				</div>
				<b class="fo-fa"><?= isset($_SESSION['lang']) && $_SESSION['lang'] == 'en' ? "To add a new host, opened your KSWeb application, selected the server, and then tap the + icon." : "Pour ajouter une nouvelle hôte, ouvrer votre application KSWEB, sélectionné le serveur, puis appuyez sur l'icône + ." ?></b> <br><br> <br><br>
				<div class="projets">
					<h2><?= isset($_SESSION['lang']) && $_SESSION['lang'] == 'en' ? 'Your projects' : 'Vos projets' ?></h2>
					<b class="fo-fa"><?= isset($_SESSION['lang']) && $_SESSION['lang'] == 'en' ? 'Folders beginning with «.» as well as all files in the directory are hidden.' : 'Les dossiers débutants par «.» ainsi que tous les fichiers du répertoire sont masqués.' ?></b> <br><br><br>
					<?php require("inc/setup.php") ?>
					<hr class="hr">
					<b class="fo-fa"><?= isset($_SESSION['lang']) && $_SESSION['lang'] == 'en' ? "To add a project, simply create a new directory in «". $projet. "» from the root directory" : "Pour ajouter un projet, créez simplement un nouveau répertoire dans «".$projet."» depuis le repertoire racine" ?>.</b>
				</div>
				<footer>
					<div class="logo">
						<img src="img/ksweb.png" alt="Logo KSWEB">
						<div class="info">
							<h1>KSWEB</h1><span class="version">Version: <?= $_SESSION['ksweb_version'] == '' ? '3.986' : $_SESSION['ksweb_version'] ?></span>
						</div>
					</div>
					<div class="coop">
						&copy; Copyright 2023 • <?= isset($_SESSION['lang']) && $_SESSION['lang'] == 'en' ? "All rights reserved" : "Tous droits reservés" ?>.
					</div>
				</footer>
			</div>
		</div>
	</main>
</body>
</html>