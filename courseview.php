
<!DOCTYPE html>
<html>

<head>
  <!--Import materialize.css-->
  <link type="text/css" rel="stylesheet" href="css/materialize.css"  media="screen,projection"/>
  <link type="text/css" rel="stylesheet" href="css/style.css"/>
  <script type="text/javascript" src="js/my_js.js"></script>
  <!--Let browser know website is optimized for mobile-->
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
  
  <script type="text/javascript">
  function getCourseData(){
    $.get( 
     "phpController/courseOutlineControl.php", {cmd: 7},
     function(data) {
      for (var i=0; i<data.outlines.length; i++) {
        var row = stage.insertRow();  

        var cell = row.insertCell();
        cell.innerHTML= data.outlines[i]["courseId"];

        var cell = row.insertCell();
        cell.innerHTML= data.outlines[i]["courseTitle"];

        var cell = row.insertCell();
        cell.innerHTML="<li style='list-style-type:none;'><a  href='#' onclick='modal("+data.outlines[i]["courseId"]+")'>Details</a></li>";

        var cell = row.insertCell();
        cell.innerHTML= "<li style='list-style-type:none;'><a href=update_job_ad.php?jid="+data.outlines[i]["courseId"]+">Update</a></li>";

        var cell = row.insertCell();
        cell.innerHTML= "<li style='list-style-type:none;'><a href=# onclick='delrow(); deletejob("+data.outlines[i]["courseId"]+") '>Delete</a></li>";
      }
    },"json");
  }

  function modal(id){
    $.get( 
     "phpController/courseOutlineControl.php", {cmd: 6,courseId:id},
     function(data) {
      // console.log("here " +data.outlines["courseId"]);
      document.getElementById('modhed').innerHTML = data.outlines[0]["courseTitle"];
      document.getElementById('moddet').innerHTML = "Objectives: "+data.outlines[0]["courseObjectives"];
    },"json");
    $('#modal1').openModal();          
  }

</script>

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
    <ul id="faculty" class="dropdown-content ">
      <li><a href="#" class="blue-text">Add</a></li>
      <li class="divider"></li>
      <li><a href="facultyview.php" class="blue-text">View</a></li>
    </ul>
    <nav>
      <div class="nav-wrapper" >
        <a href="#!" class="brand-logo"><img src="images/25.png" width="80px" height="50px"></a>
        <a href="#" data-activates="mobile-demo" class="button-collapse black-text"><i class="mdi-navigation-menu"></i></a>
        <ul class="right hide-on-med-and-down" >
          <li><a href="home.php" class="blue-text">Home</a></li>
          <li><a href="job_ads.php" class="blue-text dropdown-button" data-beloworigin="true" data-activates="courseout">Courseoutline</a></li>
          <li><a href="events.php" class="blue-text dropdown-button" data-beloworigin="true" data-activates="department">Department</a></li>
           <li><a href="events.php" class="blue-text dropdown-button" data-beloworigin="true" data-activates="faculty">Faculty</a></li>
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

<div class="row" id="userform">
  <div class="col l4">&nbsp;</div>
  <div class="col s12 m6 l4" align="center"><h4>List of Courseoutlines</h4></div>
  <table class="bordered centered highlight">
    <thead>
      <tr>
        <th data-field="id">Course Id</th>
        <th data-field="name">Course Title</th>
      </tr>
    </thead>

    <tbody id="stage">

    </tbody>
  </table>
  <!-- Modal Trigger -->
  <!-- <a class="modal-trigger waves-effect waves-light btn" href="#modal1">Modal</a> -->

  <!-- Modal Structure -->
  <div id="modal1" class="modal modal-fixed-footer">
    <div class="modal-content">
      <h4 id="modhed"></h4>
      <p id="moddet"></p>
    </div>
    <div class="modal-footer">
      <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat ">Ok</a>
    </div>
  </div>
  
</div>


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
      © 2015 Group 9 - All Rights Reserved 
      <!-- <a class="black-text text-lighten-4 right" href="#!">More Links</a> -->
    </div>
  </div>
</footer>
</div>


<!--Import jQuery before materialize.js-->
<script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
<script type="text/javascript" src="js/materialize.js"></script>
<script type="text/javascript">
  $( document ).ready(function(){
   getCourseData();
   $('.modal-trigger').leanModal();
   $(".button-collapse").sideNav();

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