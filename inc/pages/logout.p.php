<?php

if(isset($_SESSION['user']))
{
    $insertData = Config::$g_con->prepare("UPDATE users SET online = ? WHERE id = ?");
    $insertData->execute([0, $_SESSION['accid']]);
    
	unset($_SESSION['user']);
	unset($_SESSION['accid']);
	header('Location: ' . Config::$_PAGE_URL . '');    
	exit;
}
else
{
	header('Location: ' . Config::$_PAGE_URL . '');
}

?>