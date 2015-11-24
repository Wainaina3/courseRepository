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