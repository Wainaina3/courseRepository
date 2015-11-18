<?php?>
<!DOCTYPE html>
<html>
<head>
<title></title>
<!--  -->

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
<body>
	<div class="container">
		<div class="row">

			<div class="col-lg-12"><h2 id="pageheader">Course Update</h2></div>
		</div>
		<ul class="nav nav-pills">
		  <li role="presentation" class="active" onclick="back()"><a href="#">Back</a></li>
		</ul>
		<?php
		include("phpController/courseOutlineControl.php");
		$obj=new courseOutlineControl();

		if(isset($_REQUEST['upid'])){
			$scip=$_REQUEST['upid'];
			$detail=$obj->getCourseById($scip);
			$sched=$obj->showTable($scip);
			echo "<center>";
		echo "<br>";
		echo "<div><div class='headers'>COURSE ID</div><input type='text' length='30' name='cid' id='cid' value='{$detail['courseId']}'></div>";
		echo "<div><div class='headers'>COURSE NAME</div><input type='text' id='cna' name='cna' value='{$detail['courseTitle']}'></div>";
		echo "<div><div class='headers'>COURSE DEPARTMENT</div><input type='text' id='cdep' name='cdep' value={$detail['courseDepartment']}></div>";
		echo "<div><div class='headers'>COURSE OBJECTIVE</div><textarea class='ckeditor' col='10' row='25' id='cobj' name='cobj'>{$detail['courseObjectives']}</textarea></div>";
		echo "<div><div class='headers'>COURSE DESCRIPTION</div><textarea class='ckeditor' col='10' row='25' id='cdes' name='cdes'>{$detail['courseDescription']}</textarea></div>";
		echo "<div><div class='headers'>LEARNING GOALS</div><textarea class='ckeditor' col='10' row='25' id='goals' name='goals'>{$detail['learninggoals']}</textarea></div>";

		echo "<div class='headers' id='scheduler' name='scheduler'> COURSE SCHEDULER
			<table id='schedule' name='schedule' border='1' width='50%' align='center'>";
			echo	"<div id='schedule_header' name='schedule_header'> <thead id='table_headers' name='table_headers' width='50%'>"; 
			echo		"<th><b>Weeks</b></th>";
			echo		"<th><b>Topics</b></th>";
			echo		"<th><b>Readings</b></th>";
			echo		"<th><b>Milestones</b></th>";
			echo	"</thead></div>";
			echo	"<tbody id='thetab'>";
				while($row=$obj->fetch()){
					echo '<tr  align="center" contenteditable="true">';
					echo '<td>'. $row["weeks"].' </td> <td>'. $row["topics"].' </td> <td>'.$row["readings"].' </td> <td>'.$row["milestones"].'</td>' ;
				}	echo '</tr>';
			echo	"</tbody>";
			echo "</table></div><br>";
			echo "<div><div>COURSE EVALUATIONS</div><textarea class='ckeditor' col='10' row='10' id='evaluate' name='evaluate'>{$detail['courseEvaluation']}</textarea></div>";
			echo "<div> <div class='headers'> COURSE READINGS </div> <textarea class='ckeditor' col='10' row='10' id='creads' name='creads'>{$detail['readings']}</textarea></div>";
			echo "<div> <div class='headers'> SEMESTER </div> <textarea class='ckeditor' col='10' row='10' id='csem' name='csem'>{$detail['courseSemester']}</textarea></div>";
			echo "<div> <div class='headers'> FACULTY ID </div> <textarea class='ckeditor' col='10' row='10' id='cfid' name='cfid'>{$detail['facultyId']}</textarea></div>";
			echo "<br>";
			echo "<div><button id='addbt'>SAVE UPDATE</button></div>";
			echo "<div id='footer' >";
			echo "Copyright &copy Webtech Group 9";
			echo "</div>";
			echo "</center>";
			
		}
		?>
</body>
</html>
