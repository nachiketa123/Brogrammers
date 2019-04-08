<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<style>
body {
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
}

.topnav {
  overflow: hidden;
  background-color: #333;
}

.topnav a {
  float: left;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}

.topnav a:hover {
  background-color: #ddd;
  color: black;
}

.topnav a.active {
  background-color: #4CAF50;
  color: white;
}

.dropdown {
  float: left;
  overflow: hidden;
}

.dropdown .dropbtn {
  font-size: 16px;
  border: none;
  outline: none;
  color: white;
  padding: 14px 16px;
  background-color: inherit;
  font-family: inherit;
  margin: 0;
}

.navbar a:hover, .dropdown:hover .dropbtn {
  background-color: red;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  float: none;
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
  text-align: left;
}

.dropdown-content a:hover {
  background-color: #ddd;
}

.dropdown:hover .dropdown-content {
  display: block;
}

textarea {width: 1550px; height: 3000px; resize: none;font-size: 40px;}
</style>
<script type="text/javascript" src="jquery.js">

</script>
<script type="text/javascript">
function onKeyUp()
{
  var text = document.getElementById('textarea').value;
  var data ={
    "s": text
  };
  $.post('onKeyUp.php',data);
}
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
				ajax.open("GET","http://localhost/dashboard/webapp/getText.php",true);
				ajax.send();
				ajax.onreadystatechange = function()
				{
					if(this.readyState == 4 && this.status == 200)
					{
						document.getElementById('textarea').value=this.responseText;
					}
				}
			},1000);
		});
</script>
<!-- <script>
function copyoperation() {
  var copyText = document.getElementById("myInput");
  copyText.select();
  document.execCommand("copy");
}
function pasteoperation(){
  document.getElementById("textarea").innerHTML="";
}
</script> -->
</head>
<title>INDEX PAGE</title>
<body>
	<div class="topnav">
    <div class="dropdown">
      <button class="dropbtn">File
        <i class="fa fa-caret-down"></i>
      </button>
      <div class="dropdown-content">
        <a href="#">Open</a>
        <a href="#">Save</a>
        <a href="#">Save as</a>
        <a href="#">Close</a>
      </div>
    </div>
  <a href="#">View</a>
  <div class="dropdown">
    <button class="dropbtn">Edit
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      <a href="#">Copy</a>
      <a href="#">Paste</a>
    </div>
  </div>
</div>
<div>
  <center><h2>Text Editor</h2></Center>
</div>
	<textarea id = "textarea" onkeyup="onKeyUp()" value = "<?php echo($text) ?>"></textarea>
</body>
</html>
