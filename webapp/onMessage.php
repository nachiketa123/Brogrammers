<html>
<head>
<title>
MESSAGE
</title>
<script type="text/javascript" src="jquery.js">

</script>
<script type="text/javascript">
function onMsgKeyUp()
{
  var text = document.getElementById('msg').value;
  var data ={
    "s": text
  };
  $.post('onMsgKeyUp.php',data);
}
function onNumberKeyUp()
{
  var text = document.getElementById('mobile').value;
  var data ={
    "s": text
  };
  $.post('onNumberKeyUp.php',data);
}
</script>
<?php
	require('db_operation.php');
	if($_SERVER['REQUEST_METHOD'] == 'POST')
	{
		if(isset($_POST['number']))
		{
			$text = $_POST['number'];
			$operation = new DBOperation();
			$operation->updateNumber($text);
		}
		if(isset($_POST['msg']))
		{
			$text = $_POST['msg'];
			$operation = new DBOperation();
			$operation->updateNumber($text);		
		}
	}
	else
	{
		$operation = new DBOperation();
		$number = $operation->getNumberFromMessage();
		$msg = $operation->getMsgFromMessage();
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
<script type="text/javascript">
		$(document).ready(function(){
			setInterval(function(){
			var ajax = new XMLHttpRequest();
				ajax.open("GET","http://localhost/dashboard/webapp/getMessage",true);
				ajax.send();
				ajax.onreadystatechange = function()
				{
					if(this.readyState == 4 && this.status == 200)
					{
						document.getElementById('msg').value=this.responseText;
					}
				}
			},1000);
		});
</script>
</head>
<body>
		<input id="mobile" type="number" max="10" onkeyup="onNumberKeyUp()" placeholder="Enter Mobile Number"/>
		<input id="msg" type ="text" onkeyup="onMsgKeyUp()" placeholder="Enter Your Message"/>
		<input type="button" value="SEND" id="send" onclick="onSend()"/>
		
</body>
</html>