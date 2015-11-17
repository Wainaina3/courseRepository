function sendOutline(){
	alert("called");
	var form=document.getElementById("courseOutline");
	var formData = new FormData(form);
	var ctitle=$("#courseTitle").val();
	alert(ctitle);
	alert(formData);

	$.ajax({
		url: "phpController/courseOutlineControl.php?cmd=1&courseTitle="+ctitle,
		type: "POST",
		data: formData,
		dataType: "json",
		contentType: false,
		processData: false,
		success: function(data){
			alert("data from server" + data.received);
		},
		error: function(data){
			alert("error");
		}
	});
}