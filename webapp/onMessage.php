<html>
<head>
<title>
MESSAGE
</title>
<script type="text/javascript" src="jquery.js">

</script>
<?php
	require('db_operation.php');
	if($_SERVER['REQUEST_METHOD'] == 'POST')
	{
		$text = $_POST['text'];
		$operation = new DBOperation();
		$operation->updateText($text);
	}
	else
	{
		$operation = new DBOperation();
		$text = $operation->getTextFromTable();
	}
?>
<script type="text/javascript">
		$(document).ready(function(){
			setInterval(function(){
			var ajax = new XMLHttpRequest();
				ajax.open("GET","http://localhost/dashboard/webapp/getMobileNumber",true);
				ajax.send();
				ajax.onreadystatechange = function()
				{
					if(this.readyState == 4 && this.status == 200)
					{
						document.getElementById('mobile').value=this.responseText;
					}
				}
			},1000);
		});
</script>
</head>
<body>
		<input id="mobile" type="number" max="10" onkeyup="onNumberKeyUp()" placeholder="Enter Mobile Number"/>
		<input id="msg" type ="text" onkeyup="onMsgKeyUp" placeholder="Enter Your Message"/>
		<input type="button" value="SEND" id="send" onclick="onSend()"/>
		
</body>
</html>