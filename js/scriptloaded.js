$(document).ready(function(e){
$("#processreg").on('submit',(function(e) {
		$("#gallery").show("slow");
		e.preventDefault();
		$.ajax({
        	url: "processrequest",
			type: "POST",
			data:  new FormData(this),
			contentType: false,
    	    cache: false,
			processData:false,
			success: function(data){
			$("#gallery").html(data);
			$("#full").val("");
			$("#mobile").val("");
			$("#email").val("");
			$("#pass").val("");
			$("#plan").val("");
		    },
		  	error: function(){} 	        
	   });
	}));


$("#processlog").on('submit',(function(e) {
		$("#gallery").show("slow");
		e.preventDefault();
		$.ajax({
        	url: "processlog",
			type: "POST",
			data:  new FormData(this),
			contentType: false,
    	    cache: false,
			processData:false,
			success: function(data){
			$("#gallery").html(data);
			$("#pass").val("");
			$("#email").val("");
		    },
		  	error: function(){} 	        
	   });
	}));


		$("#bankForm").on('submit',(function(e) {
		$("#gallery").show("slow");
		e.preventDefault();
		$.ajax({
        	url: "bankpro",
			type: "POST",
			data:  new FormData(this),
			contentType: false,
    	    cache: false,
			processData:false,
			success: function(data){
			$("#gallery").html(data);
			document.getElementById("acname").value='';
			document.getElementById("acnumb").value='';
			document.getElementById("pin").value='';
		    },
		  	error: function(){} 	        
	   });
	}));
	
});

