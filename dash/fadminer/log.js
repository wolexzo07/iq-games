$(document).ready(function(e){

	$("#uploadiq").on('submit',(function(e) {
			$("#gallery").show("slow");
			e.preventDefault();
			$.ajax({
	        	url: "processiqcsv",
				type: "POST",
				data:  new FormData(this),
				contentType: false,
	    	    cache: false,
				processData:false,
				success: function(data){
				$("#gallery").html(data);
				$("#file").val("");
				$("#slect").val("");
			    },
			  	error: function(){}
		   });
		}));


$("#uploadscrm").on('submit',(function(e) {
	$("#gallo").show("slow");
	e.preventDefault();
	$.ajax({
		url: "process_word",
		type: "POST",
		data:  new FormData(this),
		contentType: false,
		cache: false,
		processData:false,
		success: function(data){
		$("#gallo").html(data);
		$("#file").val("");
		$("#slect").val("");
		},
		error: function(){}
   });
}));

$("#creditme").on('submit',(function(e) {
		$("#gallery").show("slow");
		e.preventDefault();
		$.ajax({
        	url: "creditme",
			type: "POST",
			data:  new FormData(this),
			contentType: false,
    	    cache: false,
			processData:false,
			success: function(data){
			$("#gallery").html(data);
			document.getElementById("amount").value='';
		    },
		  	error: function(){}
	   });
	}));

	$("#gameplay").on('submit',(function(e) {
		$("#gallery").show("slow");
		e.preventDefault();
		$.ajax({
        	url: "gamepro",
			type: "POST",
			data:  new FormData(this),
			contentType: false,
    	    cache: false,
			processData:false,
			success: function(data){
			$("#gallery").html(data);
			document.getElementById("amount").value='';
		    },
		  	error: function(){}
	   });
	}));


	$("#gameplayer").on('submit',(function(e) {
		$("#gallery").show("slow");
		e.preventDefault();
		$.ajax({
        	url: "gamedemopro",
			type: "POST",
			data:  new FormData(this),
			contentType: false,
    	    cache: false,
			processData:false,
			success: function(data){
			$("#gallery").html(data);
			document.getElementById("amount").value='';
		    },
		  	error: function(){}
	   });
	}));


		$("#topitup").on('submit',(function(e) {
		$("#galleryy").show("slow");
		e.preventDefault();
		$.ajax({
        	url: "topitup.php",
			type: "POST",
			data:  new FormData(this),
			contentType: false,
    	    cache: false,
			processData:false,
			success: function(data){
			$("#galleryy").html(data);

			document.getElementById("amount").value='';
			document.getElementById("pin").value='';
		    },
		  	error: function(){}
	   });
	}));

		$("#testifynow").on('submit',(function(e) {
		$("#gallery").show("slow");
		e.preventDefault();
		$.ajax({
        	url: "textus",
			type: "POST",
			data:  new FormData(this),
			contentType: false,
    	    cache: false,
			processData:false,
			success: function(data){
			$("#gallery").html(data);
			document.getElementById("pdes").value='';
			document.getElementById("pin").value='';
		    },
		  	error: function(){}
	   });
	}));

		$("#updatenow").on('submit',(function(e) {
		$("#gallery").show("slow");
		$("#gallery").fadeIn(400).html('<center><img src="../image/load.gif" /></center>');
		e.preventDefault();
		$.ajax({
        	url: "completeprofile",
			type: "POST",
			data:  new FormData(this),
			contentType: false,
    	    cache: false,
			processData:false,
			success: function(data){
			$("#gallery").fadeIn(400).html(data);
		    },
		  	error: function(){}
	   });
	}));
});
