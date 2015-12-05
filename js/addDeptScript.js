//Author: Daniel Osei
//Date: 5/12/2015 @ 9:50 am

/**
*This method takes in url and sends the request accordingly
*@param string u The url of the request to be sent
*
*/
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

//controls the button with id addDept.
// this button helps to add the department records
$(function(){
 $('#addDept').click(function(e){
 	alert("hey")
 	addDept();
 });
});

function addDept(){
	var deptId=$('#deptId').val();
	var deptName=$('#deptName').val();
	var hodId=$('#hodId').val();
	//validating input
	if(deptId==""){
		alert("Need to Enter the Department's ID");
		return;
	}
	else if(deptName==""){
		alert("Need to Enter the Department's Name");
		return;
	}
	else if(hodId==""){
		alert("Need to Enter the HOD's ID");
		return;
	}
	//if every detail is provided
	else{
		var obj=sendRequest("departmentControl.php?cmd=1");
		if(obj.result==1){
			document.getElementById('dsr').innerHTML=obj.message;
			document.getElementById("deptId").value="";
			document.getElementById("deptName").value="";
			document.getElementById("hodId").value="";
			return;
		}
		else{
			document.getElementById('dsr').innerHTML=obj.message;
			return;
		}
	}
}