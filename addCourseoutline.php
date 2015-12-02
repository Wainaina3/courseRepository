<!DOCTYPE html>
<html>

<head>
  <!--Import materialize.css-->
  <link type="text/css" rel="stylesheet" href="css/materialize.css"  media="screen,projection"/>
  <link type="text/css" rel="stylesheet" href="css/style.css"/>

  <!--Let browser know website is optimized for mobile-->
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
  
  <script type="text/javascript">
  //   function check(){
  //     var dob = "<?php //echo $_SESSION['jwi_user_dob']; ?>";
  //     var des = "<?php //echo $_SESSION['jwi_user_description']; ?>";
  //     var con = "<?php //echo $_SESSION['jwi_user_contact']; ?>";
  //     var cv = "<?php //echo $_SESSION['jwi_user_cv']; ?>";
  //     if(dob=="0000-00-00"||des=="null"||con=="null"||cv=="null"){
  //      Materialize.toast("Please try to complete your profile details.", 4000);  
  //    }
  //  }
  //  function logout(){
  //    $.get("user_con.php",{act:2},
  //     function(data){
  //      if(data){
  //       window.location="index.php"; 
  //     }
  //   });
  //  }

  //  function php() {
  //   var image = "<?php //echo $_SESSION['jwi_user_propic']; ?>";
  //   if(image=="null"){
  //     image = "images/default-user.png";
  //   }
  //   document.getElementById('pic').setAttribute('src',image);
  //   document.getElementById('pics').setAttribute('src',image);
  // }
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
      <li><a href="addCourseoutline.php" class="blue-text">Add</a></li>
      <li class="divider"></li>
      <li><a href="courseview.php" class="blue-text">View</a></li>
    </ul>
    <ul id="department" class="dropdown-content ">
      <li><a href="addDepartment.php" class="blue-text">Add</a></li>
      <li class="divider"></li>
      <li><a href="departmentview.php" class="blue-text">View</a></li>
    </ul>
    <ul id="faculty" class="dropdown-content ">
      <li><a href="addFaculty.php" class="blue-text">Add</a></li>
      <li class="divider"></li>
      <li><a href="facultyview.php" class="blue-text">View</a></li>
    </ul>
    <nav>
      <div class="nav-wrapper" >
        <a href="#!" class="brand-logo"><img src="images/25.png" width="80px" height="50px"></a>
        <a href="#" data-activates="mobile-demo" class="button-collapse black-text"><i class="mdi-navigation-menu"></i></a>
        <ul class="right hide-on-med-and-down" >
          <li><a href="" class="blue-text">Home</a></li>
          <li><a href="" class="blue-text dropdown-button" data-beloworigin="true" data-activates="courseout">Courseoutline</a></li>
          <li><a href="" class="blue-text dropdown-button" data-beloworigin="true" data-activates="department">Department</a></li>
          <li><a href="" class="blue-text dropdown-button" data-beloworigin="true" data-activates="faculty">Faculty</a></li>
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

<!-- <div id="modal1" class="modal">

  <div class="modal-content">
    <h4> Add Faculty Member</h4>
    <form id="addFaculty" method="POST" enctype="multipart/form-data">
        <label for="facultyId">Faculty ID:</label>
        <input type="text" id="facultyId" name="facultyId">
        <label for="facultyUsername">Faculty Username:</label>
        <input type="text" id="facultyUsername" name="facultyUsername">
        <label for="facultyFirstName"> First Name:</label>
        <input type="text" id="facultyFirstName" name="facultyFirstName">
        <label for="facultyLastName"> Last Name:</label>
        <input type="text" id="facultyLastName" name="facultyLastName">

         <div class="input-field col s12">
            <select id="departmentId" name="departmentId">
            <option value="" selected>Choose Department</option>
            <option value="CS"> CS</option>
            <option value="BA"> BA</option>
            <option value="Eng">Eng</option>
            <option value="Arts">Arts</option>

            </select>
            <label> DepartmentID</label>
        </div>

    </form>
  </div>
  <div class="modal-footer">
     <a href="#!" onclick="addFaculty()" class=" btn modal-action modal-close waves-effect waves-green btn-flat">Save Faculty</a>
  </div>

</div> -->


<div class="row" id="userform">
 <!--  <div id="myOutline">
    <form id="courseOutline" method="POST" enctype="multipart/form-data">
      <label for="courseTitle"> Course Title</label>
      <input id="courseTitle" type="text">
      <input type="button" value="submit" onclick="sendOutline()" >
    </form>
  </div> -->
  
  <div id="divContent" class="courseOutline col s12 m12 l12">

    <form id="outline" class="outline" name="outline" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">

      <div > <input type="hidden" id="tablerows" name="tablerows" ></div>

      <div class="input-field col s6">
        <input length="30" name="courseId" id="course_id" type="text" class="validate">
        <label for="courseId" >Course ID </label>
      </div>
      <div class="input-field col s6">
        <input length="30" name="courseName" id="course_name" type="text" class="validate">
        <label for="courseTitle" id="titleLabel">Course Name</label>
      </div>

      <div class="input-field col s6">
        <select id="course_dept" name="courseDepartment">
         <option value="" disabled selected>select department</option>
         <option value='cs'> Computer Science</option>
         <option value='ba'> Business </option>
         <option value='as'> Arts and Sciences</option>
         <option value='eng'> Engineering</option>
       </select>
       <label>Course Department</label>
     </div>

     <div class="input-field col s6">
      <textarea id="course_objective" name="courseObjective" class="materialize-textarea"></textarea>
      <label for="course_objective">Course Objective</label>
    </div>
    <div class="input-field col s6">
      <textarea id="course_description" name="courseDescription" class="materialize-textarea"></textarea>
      <label for="course_description">Course Description</label>
    </div>

    <div class="input-field col s6">
      <textarea id="learning_goals" name="learningGoals" class="materialize-textarea"></textarea>
      <label for="course_objective">Learning Goals</label>
    </div>
    <div class="input-field col s6">
      <textarea id="course_evaluations" name="courseEvaluation" class="materialize-textarea"></textarea>
      <label for="course_description">Course Evaluations</label>
    </div>
    <div class="input-field col s6">
      <textarea id="course_readings" name="courseReadings" class="materialize-textarea"></textarea>
      <label for="course_description">Course Readings</label>
    </div>

    <button class="btn waves-effect waves-light" type="submit" name="action">Submit
      <!-- <i class="material-icons right">send</i> -->
    </button>

  </form>

</div>
<ul>
  <li class="divider">OR</li>
</ul>
<div id="uploading">
  <form id="fileUpload" method="post" enctype="multipart/form-data">
    <div class="input-field col s6">
      <input id="courseId" name="courseId" type="text" class="validate">
      <label for="courseId" id="cidLabel">Course ID: </label>
    </div>
    <div class="input-field col s6">
      <input id="courseTitle" name="courseTitle" type="text" class="validate">
      <label for="courseTitle" id="titleLabel"> Course Title </label>
    </div>
    <div class="input-field col s6">
      <input id="facultyId" name="facultyId"  type="text" class="validate">
      <label for="facultyID" id="fidLabel"> Faculty ID </label>
    </div>

    <div class="input-field col s6">
      <select id="semester" name="semester">
        <option value="" disabled selected>Choose Semester</option>
        <option value="Fall">Fall</option>
        <option value="Spring">Spring</option>
      </select>
      <label>Semester</label>
    </div>

    <div class="input-field col s12">
      <div class="file-field input-field">
        <div class="btn">
          <span>File</span>
          <input type="file">
        </div>
        <div class="file-path-wrapper">
          <input class="file-path validate" type="text" placeholder="Upload one file" >           
        </div>
      </div>

      <button class="btn waves-effect waves-light" type="submit" name="action">Submit
        <!-- <i class="material-icons right">send</i> -->
      </button>

    </div>
   <!--  <input type="file" id="myFile" name="myFile" accept="applications/pdf">
    <br>
    <input type="button" value="Upload" onclick="uploadFile()"> -->

  </form>
</div>
</div>

<!-- <div id="deleteTest">
  <button id="deleteButton" onclick="deleteCourse('12')">Delete</button>
</div>

</div> -->
<!--  Add viewing here-->
<!-- <table id="course_outlines" name="course_outlines" border="1px" >

  <tr class="theaders" id="theaders" name="theaders" style="background-color:black;color:white;"> 
    <td> <b>Course ID<b> </td>
    <td><b> Course Name<b></td>
    <td> <b>Course Department<b></td>
    
  </tr>

</table> -->
<!--end of view  -->
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
<script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
<script type="text/javascript" src="js/materialize.js"></script>
<script type="text/javascript" src="js/my_js.js"></script>
<script type="text/javascript">
  $( document ).ready(function(){
    //courseOutlines();
    $('select').material_select();
    $(".button-collapse").sideNav();
    $(".modal-trigger").leanModal();

    var orginalWidth = $(window).height();
    $('.slider').slider({full_width: true, height: (orginalWidth/2)});
  });
  // $(function() {
  //   $(window).resize(function() {
  //      var orginalWidth = $(window).height();
  //    $('.slider').slider({height: (orginalWidth/2)});

  //   });
  // });
</script>

</body>

</html>