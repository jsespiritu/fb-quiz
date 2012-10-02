var global = {
	redirect:function(url){
		window.location.href = url;
	},
	
	checkAnswer: function(formName, controller){
		$("html, body").animate({ scrollTop: 0 }, "slow");
		var aCount = $("input:checked").length;
		var qCount = $("#qCount").val();
		if(aCount == qCount){
			var form_data = JSON.stringify($('#'+formName).serializeArray());
			
		    $.ajax(controller, {
		    	type: 'post',
		    	data: {'data':form_data},
		        dataType: "json",
		        cache: false,
		        beforeSend: function(jqXHR, settings) {
		        	$('#message').html('');
		        	$('#message').removeClass('error');
		        	$('#message').removeClass('success');
		        	
		        	$('#message').html('<h3>Please wait</h3><p>Processing...</p>');
		        	$('#message').addClass('message');
		        	$('#message').addClass('info');
		        	$('#message').fadeIn();
		        },
		        complete: function(jqXHR, textStatus) {
		            var response = jQuery.parseJSON(jqXHR.responseText);  
		            if (response.status == 1){
		            	window.location.href = '/home/displayMessage/?message='+response.message;
		            	var html = '<p>' + response.message + '</p>';
		            	$('#message').html(html);
		            	$('#message').removeClass('error');
		            	$('#message').addClass('message');
		            	$('#message').addClass('success');
		            	$('#message').fadeIn().delay(10000).fadeOut('slow');
		            }
		            else{
		            	var html = '<p>Error: ' + response.message + '</p>';
		            	$('#message').html(html);
		            	$('#message').addClass('message');
		            	$('#message').addClass('error');
		            	$('#message').fadeIn().delay(10000).fadeOut('slow');
		            }
		        }
		    });
		}
		else{
			$("html, body").animate({ scrollTop: 0 }, "slow");
        	var html = '<p> Error: Please answer all questions, Thanks!</p>';
        	$('#message').html(html);
        	$('#message').addClass('message');
        	$('#message').addClass('error');
        	$('#message').fadeIn().delay(10000).fadeOut('slow');
		}
	},
	
	save:function(formName, controller, callback){
		var form_data = JSON.stringify($('#'+formName).serializeArray());
		var ans = $("#form-correct_answer").val();
		var q = $("#form-question").val();
		if(ans == ""){
			alert('Please enter Correct Answer!');
		}
		else if(q == ""){
			alert('Please enter Question');
		}
		else{
		    $.ajax(controller, {
		    	type: 'post',
		    	data: {'data':form_data},
		        dataType: "json",
		        cache: false,
		        beforeSend: function(jqXHR, settings) {
		        	$('#message').html('');
		        	$('#message').removeClass('error');
		        	$('#message').removeClass('success');
		        	
		        	$('#message').html('<h3>Please wait</h3><p>Processing...</p>');
		        	$('#message').addClass('message');
		        	$('#message').addClass('info');
		        	$('#message').fadeIn();
		        },
		        complete: function(jqXHR, textStatus) {
		            var response = jQuery.parseJSON(jqXHR.responseText);  
		            if (response.status == 1){
		            	if(callback != ""){
		            		window.location.href = callback;
		            	}
		            	else{
		            		window.location.href = '/cms/index';
		            	}
		            	var html = '<p>' + response.message + '</p>';
		            	$('#message').html(html);
		            	$('#message').removeClass('error');
		            	$('#message').addClass('message');
		            	$('#message').addClass('success');
		            	$('#message').fadeIn().delay(10000).fadeOut('slow');
		            }
		            else{
		            	var html = '<p>Error: ' + response.message + '</p>';
		            	$('#message').html(html);
		            	$('#message').addClass('message');
		            	$('#message').addClass('error');
		            	$('#message').fadeIn().delay(10000).fadeOut('slow');
		            }
		        }
		    });
		}

	},
	
	login:function(){
		var username = $('#form-username').val();
		var password = $('#form-password').val();
		$.ajax('/login/doLogin',{
			type: 'post',
			dataType: 'json',
			data: {'username':username, 'password':password},
			cache: false,
	        beforeSend: function(jqXHR, settings) {
	        	$('#message').html('');
	        	$('#message').removeClass('error');
	        	$('#message').removeClass('success');
	        	
	        	$('#message').html('<h3>Please wait</h3><p>Processing...</p>');
	        	$('#message').addClass('message');
	        	$('#message').addClass('info');
	        	$('#message').fadeIn();
	        },
	        complete: function(jqXHR, textStatus) {
	            var response = jQuery.parseJSON(jqXHR.responseText);  
	            if (response.status == 1){
            		window.location.href = '/cms/index';
	            	var html = '<p>' + response.message + '</p>';
	            	$('#message').html(html);
	            	$('#message').removeClass('error');
	            	$('#message').addClass('message');
	            	$('#message').addClass('success');
	            	$('#message').fadeIn().delay(10000).fadeOut('slow');
	            }
	            else{
	            	var html = '<p>Error: ' + response.message + '</p>';
	            	$('#message').html(html);
	            	$('#message').addClass('message');
	            	$('#message').addClass('error');
	            	$('#message').fadeIn().delay(10000).fadeOut('slow');
	            }
	        }			
		});
	}
}