<html>
<title>Add New Task</title>
<body>
	<h1>Form Pembuatan Task Baru</h1>
	<p>
		<?php if (strlen($msg)>0) echo $msg;?>
	</p>
	<form action="addingNewTask" method="post">
		Judul: <input type="text" id="judul" name="judul" width="50"/>
		<br/>
		Kata Kunci: <input type="text" id="keywords" name="keywords" width="50"/>
		<br/>
		<input type="submit" value="Submit">
	</form>
</body>
</html>