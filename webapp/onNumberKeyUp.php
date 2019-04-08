<?php
	$text = $_POST['s'];
	require('db_operation.php');
	$operation = new DBOperation();
    $operation->updateNumber($text);
?>