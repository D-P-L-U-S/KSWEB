<?PHP 
	session_start();
	if(isset($_SESSION['lang'])){
		$_SESSION['lang'] = $_SESSION['lang'] == 'fr' ? 'en' : 'fr';
	}
	else{
		$_SESSION['lang'] = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);
	}
	$_SESSION['conf'] = 1;
	header('location: ../');
?>