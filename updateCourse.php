<?php?>
<!DOCTYPE html>
<html>
<head>
<title></title>
<!--  -->

<!--  -->
<meta name="viewport" content="width=device-width, initial-scale=1">

	<link type="text/css" rel="stylesheet" href="css/materialize.css"  media="screen,projection"/>
  <link type="text/css" rel="stylesheet" href="css/style.css"/>
  <script type="text/javascript" src="js/my_js.js"></script>
  <!--Let browser know website is optimized for mobile-->
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
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
		width: 80%;
		height:60px;
	}
	</style>

</head>
<body class="#bbdefb blue lighten-4" >
 <div class="container z-depth-5"  id="indexcon">
 	 <div class="navbar-fixed" >
     <ul id="user" class="dropdown-content ">
      <li><a href="#" class="blue-text">My Profile</a></li>
      <li class="divider"></li>
      <li><a href="#" class="blue-text">Activities</a></li>
      <li class="divider"></li>
      <li><a href="#!" onclick="" class="blue-text">Logout</a></li>
    </ul>
    <ul id="courseout" class="dropdown-content ">
      <li><a href="#" class="blue-text">Add</a></li>
      <li class="divider"></li>
      <li><a href="courseview.php" class="blue-text">View</a></li>
    </ul>
    <ul id="department" class="dropdown-content ">
      <li><a href="#" class="blue-text">Add</a></li>
      <li class="divider"></li>
      <li><a href="#" class="blue-text">View</a></li>
    </ul>
    <nav>
      <div class="nav-wrapper" >
        <a href="#!" class="brand-logo"><img src="images/25.png" width="80px" height="50px"></a>
        <a href="#" data-activates="mobile-demo" class="button-collapse black-text"><i class="mdi-navigation-menu"></i></a>
        <ul class="right hide-on-med-and-down" >
          <li><a href="courseview.php" class="blue-text">Home</a></li>
          <li><a href="job_ads.php" class="blue-text dropdown-button" data-beloworigin="true" data-activates="courseout">Courseoutline</a></li>
          <li><a href="events.php" class="blue-text dropdown-button" data-beloworigin="true" data-activates="department">Department</a></li>
          <li><a href="#!" class="valign-wrapper dropdown-button" data-beloworigin="true" data-activates="user">
            <div class="row user" >
             <div class="col s5 truncate" style="padding:0;">
             
            </div>
            <div class="col s1">&nbsp;</div>
            <div class="col s5 ">
              <img id="pic" alt="" class="circle valign" style="width:75px;height:65px; float:left;">
            </div>

          </div>

        </a>
      </li>
    </ul>
    <ul class="side-nav" id="mobile-demo">
      <li><a href="home.php" class="blue-text">Home</a></li>
      <li><a href="job_ads.php" class="blue-text">Ads Portal</a></li>
      <li><a href="events.php" class="blue-text">Events</a></li>
      <li><a href="profile.php" class="valign-wrapper">
        <div class="row user" >
         <div class="col s7 m7" id="uname">
          <span class="blue-text " style="float:left; font-size:80%; ">
           <?php echo $_SESSION['jwi_user_firstname']." ".$_SESSION['jwi_user_lastname']; ?>
         </span>
       </div>
       <div class="col s5 m5" >
        <img id="pics" src="" alt="" class="circle responsive-img valign" style="width:100px;height:65px; float:right; ">
      </div>

    </div>

  </a>
</li>
<li class="divider"></li>
<li><a href="" class="blue-text">My Profile</a></li>
<li class="divider"></li>
<li><a href="" class="blue-text">Activities</a></li>
<li class="divider"></li>
<li><a href="" class="blue-text" onclick="">Logout</a></li>
</ul>
</div>
</nav>
</div>
		<div class="row">
			<div class="col s12 m6 l4" align="center"><h4>Update Courseoutlines</h4></div>
		</div>
		<?php
		include("phpController/courseOutlineControl.php");
		$obj=new courseOutlineControl();

		if(isset($_REQUEST['upid'])){
			$scip=$_REQUEST['upid'];
			$detail=$obj->getCourseById($scip);
			$sched=$obj->showTable($scip);

		echo "<br>";
		echo "<div><div class='headers'><strong>COURSE ID</strong></div><input type='text' length='30' name='cid' id='cid' value='{$detail['courseId']}'></div>";
		echo "<div><div class='headers'><strong>COURSE NAME</strong></div><input type='text' id='cna' name='cna' value='{$detail['courseTitle']}'></div>";
		echo "<div><div class='headers'><strong>COURSE DEPARTMENT</strong></div><input type='text' id='cdep' name='cdep' value={$detail['courseDepartment']}></div>";
		echo "<div><div class='headers'><strong>COURSE OBJECTIVE</strong></div><textarea class='ckeditor' col='10' row='25' id='cobj' name='cobj'>{$detail['courseObjectives']}</textarea></div>";
		echo "<div><div class='headers'><strong>COURSE DESCRIPTION</strong></div><textarea class='ckeditor' col='10' row='25' id='cdes' name='cdes'>{$detail['courseDescription']}</textarea></div>";
		echo "<div><div class='headers'><strong>LEARNING GOALS</strong></div><textarea class='ckeditor' col='10' row='25' id='goals' name='goals'>{$detail['learninggoals']}</textarea></div>";

		echo "<div class='headers' id='scheduler' name='scheduler'><strong> COURSE SCHEDULER</strong>
			<table id='schedule' name='schedule' bordered centered highlight>";
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
			echo "<div> <div class='headers'> <strong>SEMESTER </strong></div> <textarea class='ckeditor' col='10' row='10' id='csem' name='csem'>{$detail['courseSemester']}</textarea></div>";
			echo "<div> <div class='headers'><strong> FACULTY ID </strong></div> <textarea class='ckeditor' col='10' row='10' id='cfid' name='cfid'>{$detail['facultyId']}</textarea></div>";
			echo "<br>";
			echo "<div><center><button id='addbt'>SAVE UPDATE</button></center></div>";
			
		}
		?>
		<footer class="page-footer blue lighten-4">
  <div class="row">
    <div class="col l6 s12" style=" float:left;">
      <h5 class="black-text">Contact Us</h5>
      <p class="black-text text-lighten-4">Softeware Engineering<br>
        Ashesi University<br>
        Berekusu<br>
      </p>
      <p class="black-text text-lighten-4">Mobile:  +233-23 232 2323</p>
      <p class="black-text text-lighten-4">Email:   couserepo@gmail.com</p>

    </div>
    <div class="col l4 offset-l2 s12">
      <h5 class="black-text">Quick Links</h5>
      <ul>
        <li><a class="black-text text-lighten-3" href="#!">Facebook</a></li>
        <li><a class="black-text text-lighten-3" href="#!">Twitter</a></li>
        <li><a class="black-text text-lighten-3" href="#!">Instagram</a></li>
      </ul>
    </div>
  </div>
  
  <div class="footer-copyright" >
    <div class="black-text center-align"  >
      Copyright &copy 2015 Group 9 - All Rights Reserved 
      <!-- <a class="black-text text-lighten-4 right" href="#!">More Links</a> -->
    </div>
  </div>
</footer>
</body>
</html>
