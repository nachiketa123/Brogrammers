<?php
	require('db_operation.php');
	$operation = new DBOperation();
    $text = $operation->getTextFromTable();
	echo(json_encode($text));
?>