<?php
	require_once('utils.php');

	if (isUserUnregistered()) {
		echo 'false';
		die();
	} 
	else if (!isUserHasAccess(13 /* Languages */)) {
		echo 'false';
		die();
	}
	else
	{
		$title = htmlspecialchars($_GET['title']);

		if (strlen($title) <= 0)
		{
			echo 'false';
			die();
		}

		$db = new PdoDb();
		$req = $db->prepare('INSERT INTO `langs` (`title`) VALUES (:title);');
		$req->bindParam(':title', $title, PDO::PARAM_STR);
		$req->execute();

		echo 'true';
	}
?>