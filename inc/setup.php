<?php
$url2 = 'http://' . $_SERVER['SERVER_NAME'];
$repertoire = $mainProjetsName;

$dp = opendir($repertoire);
if ($dp === false) {
	echo isset($_SESSION['lang']) && $_SESSION['lang'] == 'en' ? '<b class="empty">Can\'t open the directory: «'. $projet.' • ('. $repertoire.')». Check the path in fill in the «dir.php» file from the «inc» directory of the project, then try again.</b>' : '<b class="empty">Impossible d\'ouvrir le répertoire : «'.$projet.' • ('.$repertoire.')». Vérifier le chemin renseigner dans le fichier «dir.php» depuis le répertoire «inc» du projet puis réessayer de nouveau.</b><br>';
} else {
	$i = 0;
	$ListFiles = [];
	while ($file = readdir($dp)) {
		if (is_dir($repertoire.'/'.$file) && $file != '.' && $file != '..' && $file[0] != '.') {
			$ListFiles[$i] = $file;
			$i++;
		}
	}
	closedir($dp);
	$list_tri = 'CROI';

	if (count($ListFiles) != 0) {
		if ($list_tri == 'DESC') {
			rsort($ListFiles);
		} else {
			sort($ListFiles);
		}
		$i = 0;
		echo "<div class='files'>";
		while ($i < count($ListFiles)) {
			echo '<a target="_blank" href="'.$url2 . ':' . $mainProjetsPort . '/' . $ListFiles[$i] .'">' . strtolower($ListFiles[$i]) . '</a><br>';
			$i++;
		}
		echo "</div>";
	} else {
		?>
		<b class="empty"><?= isset($_SESSION['lang']) && $_SESSION['lang'] == 'en' ? "You have no project yet !" : "Vous n'avez aucun projet !</b><br>" ?>
		<?php
	}
}
?>