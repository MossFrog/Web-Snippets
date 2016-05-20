$(document).ready(function() 
{

	$('#firstname').on('input', function() 
	{
		var input=$(this);
		var is_name=input.val();
		if(is_name){input.removeClass("invalid").addClass("valid");}
		else{input.removeClass("valid").addClass("invalid");}
	});


	$('#lastname').on('input', function() 
	{
		var input=$(this);
		var is_name=input.val();
		if(is_name){input.removeClass("invalid").addClass("valid");}
		else{input.removeClass("valid").addClass("invalid");}
	});


	$('#email_section').on('input', function() 
	{
		var input=$(this);
		var re = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
		var is_email=re.test(input.val());
		if(is_email){input.removeClass("invalid").addClass("valid");}
		else{input.removeClass("valid").addClass("invalid");}
	});

	$('#comment').keyup(function(event) 
	{
		var input=$(this);
		var message=$(this).val();
		console.log(message);
		if(message){input.removeClass("invalid").addClass("valid");}
		else{input.removeClass("valid").addClass("invalid");}	
	});

	$("#submit_button button").click(function(event)
	{
		var error_free=true;


		var element=$('#comment');
		var valid=element.hasClass("valid");
		var error_element=$("span", element.parent());
		if (!valid){error_element.removeClass("error").addClass("error_show"); error_free=false;}
		else{error_element.removeClass("error_show").addClass("error");}


		var element=$('#firstname');
		var valid=element.hasClass("valid");
		var error_element=$("span", element.parent());
		if (!valid){error_element.removeClass("error").addClass("error_show"); error_free=false;}
		else{error_element.removeClass("error_show").addClass("error");}

		var element=$('#lastname');
		var valid=element.hasClass("valid");
		var error_element=$("span", element.parent());
		if (!valid){error_element.removeClass("error").addClass("error_show"); error_free=false;}
		else{error_element.removeClass("error_show").addClass("error");}


		var element=$('#email_section');
		var valid=element.hasClass("valid");
		var error_element=$("span", element.parent());
		if (!valid){error_element.removeClass("error").addClass("error_show"); error_free=false;}
		else{error_element.removeClass("error_show").addClass("error");}

		
		var element=$('#agreetick')
		var valid=element.hasClass("valid");
		var error_element=$("span", element.parent());
		if($("#agreetick").is(':checked')) 
		{
		    error_element.removeClass("error_show").addClass("error");
		} 
		else 
		{
		    error_element.removeClass("error").addClass("error_show"); error_free=false;
		}

		if (!error_free)
		{
			event.preventDefault(); 
			alert('Missing Input Data.')
		}
		else
		{
			alert('No errors detected: Form will be submitted. (No backend script in place, will be provided upon request.');
		}


	});

});