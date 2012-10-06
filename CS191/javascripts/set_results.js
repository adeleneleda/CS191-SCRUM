$(document).ready(function() {
	
	//automate term range for term text-boxes		
	//change first term to previous to prevent addition of ids
	//remember to correct when pressing suggestion stuff, this must also take effect
	$("#ayterm1").keyup(function () {
		
		if ( ($("#ayterm1").val().length) == 4){
		
			$("#ayterm2").attr('value', parseInt ( $("#ayterm1").val() ) +1);
		}
		else{
			
			$("#ayterm2").attr('value', '');
			
		}
	});
	
	//for two term ranges
	$("#ayterm3").keyup(function () {
		
		if ( ($("#ayterm3").val().length) == 4){
		
			$("#ayterm4").attr('value', parseInt ( $("#ayterm3").val() ) +1);
		}
		else{
			
			$("#ayterm4").attr('value', '');
			
		}
	});
	
});

	function load_instructors(instructors) {

		var opts = "<option value='default'>-- Please select an instructor to add --</option>";
	

		if (instructors ==0){
			 $("#opt_instructorid").html(opts);
			 return;
		} 

		$.each(instructors , function (key , instructor ) {
			opts += "<option value="+key+">"+instructors[key]+"</option>";

		});
		
	 	$("#opt_instructorid").html(opts);
	}
