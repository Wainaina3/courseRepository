
<?php

<!DOCTYPE html>
<html>
<head>
<title></title>
<!--  -->
/**
 * Date: 5/12/2015
 * Time: 3:02pm
 * Edited by Akpene
 */
<!--  -->
<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- <link href="../css/elements.css" rel="stylesheet"> 
	<link rel="stylesheet" href="../css/style.css">
	<link href="../css/bootstrap.min.css" rel="stylesheet" type="text/css" />
	<link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/> -->
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script>
	<script type="text/javascript" src="js/my_js.js"></script>
	  <!-- // <script type="text/javascript" src="../js/jquery-2.1.3.min.js"></script>
	  //  <script type="text/javascript" src="../js/bootstrap.js"></script> -->
	 <!--  // <script type="text/javascript" src="../ckeditor/ckeditor.js"></script> -->
	   <!-- <script type="text/javascript" src="../js/materialize.min.js"></script>
	 // <script type="text/javascript" src="../js/jquery"></script> -->
	 <!-- <script src="script.js"></script>  -->
	<style type="text/css">
	input{
		margin-bottom: 10px;
		height: 30px;
		width: 250px;
		outline-color: red;
	}
	textarea{
		margin-bottom: 10px;
		outline-color: black;
		width: 250px;
		height:60px;
	}
	</style>

</head>
?>
<body>
	<div class="container">
		<div class="row">

			<div class="col-lg-12"><h2 id="pageheader">Department Update</h2></div>
		</div>
		<ul class="nav nav-pills">
		  <li role="presentation" class="active" onclick="back()"><a href="#">Back</a></li>
		</ul>

		<?php
		include("phpController/departmentControl.php");
		$obj=new departmentControl();
echo "Hello"
		if(isset($_REQUEST['departmentId'])){
			$scip=$_REQUEST['departmentId'];
			$detail=$obj->getDepartmentById($scip);
			$sched=$obj->showTable($scip);
			echo "<center>";
		echo "<br>";
		echo "<div><div class='headers'>DEPARTMENT ID</div><input type='text' length='30' name='did' id='did' value='{$detail['departmentId']}'></div>";
		echo "<div><div class='headers'>DEPARTMENT NAME</div><input type='text' id='dna' name='cna' value='{$detail['departmentName']}'></div>";
		echo "<div><div class='headers'>DEPARTMENT HOD</div><input type='text' id='dephod' name='cdep' value={$detail['departmentHOD']}></div>";
		

			echo "<br>";
			echo "<div><button id='addbt'>SAVE UPDATE</button></div>";
			echo "<div id='footer' >";
			echo "Copyright &copy Webtech Group 9";
			echo "</div>";
			echo "</center>";
			
		}
		?>
</div>
</body>
