<?PHP 
	session_start();
	if(isset($_SESSION['mode'])){
		$_SESSION['mode'] = $_SESSION['mode'] == 1 ? 0 : 1;
	}
	else{
		$_SESSION['mode'] = (date('H') >= $_SESSION['startDarkMode'] || date('H') < $_SESSION['endDarkMode']) ? 1 : 0;
	}
	$_SESSION['conf2'] = 1;
	header('location: ../');
?>