

	function sendRequest(u){
		// Send request to server
		//u a url as a string
		//async is type of request
		var obj=$.ajax({url:u,async:false});
		//Convert the JSON string to object
		var result=$.parseJSON(obj.responseText);
		//	alert("request sent");
		return result;	//return object

	}
	//activate select element in materialize
	// $(document).ready(function() {
	// 	$('select').material_select();
	// });

	function courseOutlines(){

		var results=sendRequest("courseOutlineControl.php?cmd=7");
		var tbl= document.getElementById("course_outlines");

		if(results.result!=0){		

			for(i=0;i<results.outlines.length;i++){
				

				tblrows=tbl.rows.length;
				row=tbl.insertRow(tblrows);
			
				if(i%2==0){
					row.style="background-color:#EEEEEE";
				}
				cid=row.insertCell(0);
				cname=row.insertCell(1);
				cdept=row.insertCell(2);
				cid.innerHTML="<a href='viewCourses.php?id="+results.outlines[i].courseId +"'>"+results.outlines[i].courseId +"</a>";;
				cname.innerHTML="<a href='viewCourses.php?id="+results.outlines[i].courseId +"'>"+results.outlines[i].courseTitle +"</a>";
				cdept.innerHTML="<a href='viewCourses.php?id="+results.outlines[i].courseId +"'>"+results.outlines[i].courseDepartment +"</a>";


			}
		}
	}

	function displayCourse(){
		
		var c_id=document.getElementById("space").value;
		alert(c_id);
		var conRow=sendRequest("phpController/courseOutlineControl.php?cmd=1&courseId="+c_id);
		var table=sendRequest("phpController/courseOutlineControl.php?cmd=4&courseId="+c_id);
		if(conRow.result==1){
			var courseCon=conRow.Outline;
			var taCon=table.schedule;
			var conHTML="";
			for(var i=0;i<courseCon.length;i++){
				conHTML+='<b>Course ID</b>:<input type="text" length="30" name="cid" id="cid" value='+courseCon[i]['courseId']+' readonly><br><b>Course Title</b>:<input type="text" length="30" name="cid" id="cid" value='+courseCon[i]['courseTitle']+'><br><b>Course Department</b>:<input type="text" length="30" name="cid" id="cid" value='+courseCon[i]['courseDepartment']+'><b>Course Objective</b><br><textArea>'+courseCon[i]['courseObjectives']+'</textArea><div><b>Course Description</b></div><br><textArea>'+courseCon[i]['courseDescription']+'</textArea><br><b>Course Learning Goals</b>:<textArea>'+courseCon[i]['learninggoals']+'</textArea><br><b>Course Semester</b>:<input type="text" length="30" name="cid" id="cid" value='+courseCon[i]['courseSemester']+'><br>';
				conHTML+='<div class="headers" id="scheduler" name="scheduler"> <b>COURSE SCHEDULER</b><table id="schedule" name="schedule" border="1" width="50%"" align="center"><div id="schedule_header" name="schedule_header"> <thead id="table_headers" name="table_headers" width="50%"><th><b>Weeks</b></th><th><b>Topics</b></th><th><b>Readings</b></th><th><b>Milestones</b></th></thead></div><tbody id="thetab">';
				for(var j=0;j<taCon.length;j++){
					conHTML+='<tr  align="center" contenteditable="true"><td>'+taCon[j]['weeks']+'</td><td>'+taCon[j]['topics']+'</td><td>'+taCon[j]['readings']+'</td><td>'+taCon[j]['milestones']+'</td></tr></tbody></table></div><br>';
				}
			}
			document.getElementById('contentShow').innerHTML=conHTML;
			return;
		}
		alert(conRow.message);
		return;
	}
	







/*
*This function sends a request to delete a course outline via ajax call
* The requests returns a success or failure message in json format.
* Json object contains result (int) and message (string) properties
 */
	function deleteCourse(courseId)
	{
		var request="http://localhost:8000/server/courseRepository/phpController/courseOutlineControl.php?cmd=5&courseId="+courseId;
		var result =sendRequest(request);

	}

	/*
	*This function sends an ajax request to upload a file to server
	* The file information are also uploaded to the database
	* The processing of this upload is done by the uploadControl.php file
	*
	 */
	function uploadFile(){
		var formElement = document.getElementById("fileUpload");
		var fd = new FormData(formElement);

		$.ajax({
			url: "phpController/uploadControl.php?cmd=1",
			type: "POST",
			data: fd,
			//dataType: 'json',
			contentType: false,
			processData:false,
			success: function(data)
			{

				alert(data + " " + "Message from request");
			},
			error: function(data){


			}
		});
	}

	/*
	* This function will get add faculty form from the web page and send it to the controller for processing
	 */

	function addFaculty(){
		alert("called");

		var formElement = document.getElementById("addFaculty");
		var fd = new FormData(formElement);

		$.ajax({
			url: "phpController/facultyControl.php?cmd=1",
			type: "POST",
			data: fd,
			//dataType: 'json',
			contentType: false,
			processData:false,
			success: function(data)
			{

				alert(data + " " + "Message from request");
			},
			error: function(data){


			}
		});
	}
function sendOutline(){
	alert("called");
	var form=document.getElementById("courseOutline");
	var formData = new FormData(form);

	$.ajax({
		url: "phpController/courseOutlineControl.php?cmd=1",
		type: "POST",
		data: formData,
		dataType: "json",
		contentType: false,
		processData: false,
		success: function(data){
			alert("data from server" + data.results + data.message + data.received);
		},
		error: function(data){
			alert("error");
		}
	});
}


function viewDepartment(){

	var results=sendRequest("phpController/departmentControl.php?cmd=5");
		var deptable= document.getElementById("departmentstable");

		if(results.result!=0){		
		for(i=0;i<results.departments.length;i++){
			
				deptablerows=deptable.rows.length;
				row=deptable.insertRow(deptablerows);
				deptid=row.insertCell(0);
				deptname=row.insertCell(1);
				depthod=row.insertCell(2);
				
				deptid.innerHTML='<div onclick="viewDepartCourses('+results.departments[i].departmentId+')"><a href="">'+results.departments[i].departmentId+'</a> </div>';

				deptname.innerHTML=results.departments[i].departmentName;
				depthod.innerHTML=results.departments[i].deparmentHOD;
								
		
			}
		}

}

function viewDepartCourses(dept){

	var results=sendRequest("phpController/departmentControl.php?cmd=6&deptid="+dept);
		var deptable= document.getElementById("departmentcourses");

		if(results.result!=0){		
		for(i=0;i<results.courses.length;i++){
			
				deptablerows=deptable.rows.length;
				row=deptable.insertRow(deptablerows);
				coursetid=row.insertCell(0);
				coursename=row.insertCell(1);
				coursefaculty=row.insertCell(2);
				
				deptid.innerHTML='<a href="">'+results.courses[i].courseId+'</a>';

				deptname.innerHTML=results.courses[i].courseName;
				depthod.innerHTML=results.courses[i].deparmentHOD;
								
		
			}
		}
}

function jimmy(v){
alert("woiih" + v); 	 	
}
