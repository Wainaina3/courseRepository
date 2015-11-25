
<!DOCTYPE html>
<html>

<head>
  <!--Import materialize.css-->
  <link type="text/css" rel="stylesheet" href="css/materialize.css"  media="screen,projection"/>
  <link type="text/css" rel="stylesheet" href="css/style.css"/>

  <!--Let browser know website is optimized for mobile-->
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
  
  <script type="text/javascript">

</script>

</head>

<body class="#bbdefb blue lighten-4">
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
      <li><a href="#" class="blue-text">View</a></li>
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
          <li><a href="home.php" class="blue-text">Home</a></li>
          <li><a href="job_ads.php" class="blue-text dropdown-button" data-beloworigin="true" data-activates="courseout">Courseoutline</a></li>
          <li><a href="events.php" class="blue-text dropdown-button" data-beloworigin="true" data-activates="department">Department</a></li>
          <li><a href="#!" class="valign-wrapper dropdown-button" data-beloworigin="true" data-activates="user">
            <div class="row user" >
             <div class="col s5 truncate" style="padding:0;">
              <span class="blue-text" style="float:right; padding-left:25%; " >
               <?php //echo $_SESSION['jwi_user_firstname']." ".$_SESSION['jwi_user_lastname']; ?> 
              </span>
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
           <?php // echo $_SESSION['jwi_user_firstname']." ".$_SESSION['jwi_user_lastname']; ?>
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

<div class="row" id="userform">
<<<<<<< HEAD
  <div id="myOutline">
    <form id="courseOutline" method="POST" enctype="multipart/form-data">
      <label for="courseTitle"> Course Title</label>
      <input id="courseTitle" type="text">
      <input type="button" value="submit" onclick="sendOutline()" >
    </form>
  </div>
COntent here
=======
  <table>
      <tr>
      <td id="content">
        <div id="divContent" class="courseOutline">

          <form id="outline" class="outline" name="outline" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <div > <input type="hidden" id="tablerows" name="tablerows" ></div>
            <div> <div class='headers'> Course Id </div><input type="text" length="30" name="courseId" id="course_id"> </div>
            <div> <div class='headers' > Course Name </div> <input type="text" length="30" name="courseName" id="course_name"></div>
            <div id='dept_selector' name='dept_select'><div class='headers'> Course Department</div>
             </div>
             <div class='headers'>
             <select id="course_dept" name="courseDepartment" class="browser-default">
              <option value='none'>-select department- </option>
              <option value='cs'> Computer Science</option>
              <option value='ba'> Business </option>
              <option value='as'> Arts and Sciences</option>
              <option value='eng'> Engineering</option>
            </select>
          </div>

            <p><div> <div class='headers'> Course Objectives </div><textarea class='css' col="10" row="20" id="course_objective" name="courseObjective"></textarea></div>
            </p>
            <p><div> <div class='headers'> Course Description </div> <textarea class='css' col="10" row="20" id="course_description" name="courseDescription"></textarea></div>
            </p>
            <div> <div class='headers'> Learning Goals </div> <textarea class='css' col="20" row="10" id="learning_goals" name="learningGoals"></textarea></div>
      
              </p>
              <p>
                <div> <div class='headers'> Course Evaluations </div> <textarea class='css' col="10" row="10" id="course_evaluations" name="courseEvaluation"></textarea></div>
              </p>
              <p>
                <div> <div class='headers'> Course Readings </div> <textarea class='css' col="10" row="10" id="course_readings" name="courseReadings"></textarea></div>
              </p>
              <div> <input type="submit" value="Save"></div>
            </form>
            
          </div>
        </td>
      </tr>
>>>>>>> 63a632b9fd282cc640870b6e4aad431c17d7e226

    </table>


  
</div>


<footer class="page-footer blue lighten-4">
    <div class="row">
      <div class="col l6 s12" style=" float:left;">
        <h5 class="black-text">Contact Us</h5>
        <p class="black-text text-lighten-4">Software Engineering<br>
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
      © 2015 Group 9 - All Rights Reserved 
      <!-- <a class="black-text text-lighten-4 right" href="#!">More Links</a> -->
    </div>
    </div>
</footer>
</div>


<!--Import jQuery before materialize.js-->
<script type="text/javascript" src="js/jquery-2.1.1.min.js"></script>
<script type="text/javascript" src="js/materialize.js"></script>
<script type="text/javascript" src="js/myjs.js"> </script>
<script type="text/javascript">


</script>
</body>

</html>