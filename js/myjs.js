function sendOutline(){
	alert("called");
	var form=document.getElementById("courseOutline");
	var formData = new FormData(form);
<<<<<<< HEAD
=======
	var cname=$("#courseName").val();
	var cid=$("#courseId").val();
	var cobj=$("#courseObjective").val();
	var cread=$("#courseReadings").val();
	var cdes=$("#courseDescription").val();
	var cev=$("#courseEvaluation").val();
	var lgoals=$("#learningGoals").val();
	var cdept=$("#courseDepartment").val();

	alert(formData);
>>>>>>> 63a632b9fd282cc640870b6e4aad431c17d7e226

	$.ajax({
		url: "phpController/courseOutlineControl.php?cmd=1",
		type: "POST",
		data: formData,
		dataType: "json",
		contentType: false,
		processData: false,
		success: function(data){
<<<<<<< HEAD
			alert("data from server" + data.results + data.message + data.received);
=======
			alert("data from server" + data.received);
>>>>>>> 63a632b9fd282cc640870b6e4aad431c17d7e226
		},
		error: function(data){
			alert("error");
		}
	});
}