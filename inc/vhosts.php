<?php
$url2 = 'http://' . $_SERVER['SERVER_NAME'];
$hosts = [];
if (stripos($_SERVER['SERVER_SOFTWARE'], 'apache') !== false) {
	// Relatif à apache
	$confFiles = glob("/data/user/0/ru.kslabs.ksweb/components/httpd/conf/*localhost*.conf");
	foreach ($confFiles as $confFile) {
		$content = file_get_contents($confFile);
		preg_match('/Define\s+port\s+(\d+)/', $content, $portMatches);
		preg_match('/Define\s+docroot\s+(\S+)/', $content, $rootMatches);
		preg_match('/Define\s+hostname\s+(\S+)/', $content, $hostMatches);

		$port = $portMatches[1];
		$root = str_replace('"', '', $rootMatches[1]);
		$root = preg_replace('/[^\/]+\//', '', $root, 1) . ' » ' . basename($root);

		$hosts[] = [
			'port' => $port,
			'root' => $root
		];
	}
} else {
	if (stripos($_SERVER['SERVER_SOFTWARE'], 'lighttpd') !== false) {
		// Relatif à lighttpd
		$confFiles = glob("/data/user/0/ru.kslabs.ksweb/components/lighttpd/conf/*localhost*.conf");
		foreach ($confFiles as $file) {
			$lines = file($file);
			$content = implode("", array_map(function($line) {
				return strpos($line, "#") === false ? $line : "";
			}, $lines));
			if (strpos($content, "server.document-root") !== false) {
				preg_match('/SERVER\["socket"\]\s*==\s*\"(.*?):(\d+)\"/', $content, $matches);
				if (isset($matches[1]) && isset($matches[2])) {
					$root = trim(str_replace(["server.document-root", "\"", ".", "(", ")", "{", "}"], "", strstr($content, "server.document-root")));
					$parentDir = basename(dirname($root));
					$projectDir = basename($root);
					$host = [
						"port" => $matches[2],
						"root" => $parentDir . " » " . $projectDir,
					];
					$hosts[] = $host;
				}
			}
		}
	} else {
		// Relatif à nginx
		$confFiles = glob("/data/user/0/ru.kslabs.ksweb/components/nginx/conf/*localhost*.conf");
		foreach ($confFiles as $file) {
			$lines = file($file);
			$content = implode("", array_map(function($line) {
				return strpos($line, "#") === false ? $line : "";
			}, $lines));
			if (strpos($content, "listen") !== false) {
				preg_match('/listen\s+(\d+)/', $content, $portMatch);
				preg_match('/root\s+([^\s;]+)/', $content, $rootMatch);
				if (isset($portMatch[1]) && isset($rootMatch[1])) {
					$root = trim($rootMatch[1]);
					$parentDir = basename(dirname($root));
					$projectDir = basename($root);
					$host = [
						"port" => $portMatch[1],
						"root" => $parentDir . " » " . $projectDir,
					];
					$hosts[] = $host;
				}
			}
		}
	}
}
if (count($hosts) > 0) {
	foreach ($hosts as $h) {
		echo "<a href='".$url2.":".$h['port']."' target='_blank'>".$url2.":".$h['port']." • <span class='root'>".$h['root']."</span></a><br>";
	}
} else {
	echo isset($_SESSION['lang']) && $_SESSION['lang'] == 'en' ? '<b class="empty">You have not yet configure hosts.</b>' : '<b class="empty">Vous n\'avez pas encore configurer de hosts.</b>';
}
?>