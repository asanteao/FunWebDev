/* add valiation checks here */
$(function () {
	//$('#errors').hide();
	$('form').on('submit', function (e) {

		/*In case of an error add the relevant error message to the <div> with id='errors' and then toggle
		 * the visibility of this <div>. You can add class errors to the container element. This will change
		 * the color of the input element. */

		var error = false;
		$('#errorMessages').empty();
	
		/*first and last name should be non-blank*/
		var first = $('div #firstname').val();
		var namePattern = /^[\s]*[a-zA-Z]+-*[a-zA-Z]+[\s]*$/;
		if(!first.match(namePattern)) {
			$('div #firstnamecontainer').addClass('error');
			let p = $('<p></p>');
			p.html('Please a enter proper first name');
			$('#errorMessages').append(p);
			error = true;
		//	e.preventDefault();
		} else {
			$('div #firstnamecontainer').removeClass('error');
		}
	
		var last = $('div #lastname').val();
		if(!last.match(namePattern)) {
			$('div #lastnamecontainer').addClass('error');
			let p = $('<p></p>');
			p.html('Please a enter proper last name');
			$('#errorMessages').append(p);
			error = true;
		//	e.preventDefault();
		} else {
			$('div #lastnamecontainer').removeClass('error');
		}

		/*Phone number should be in format ###-###-####*/
		var phone = $('div #phone').val();
		var phonePatt = /(^[1-9]{1}[0-9]{2}\-[0-9]{3}\-[0-9]{4}$)|(^\([1-9]{1}[0-9]{2}\) [0-9]{3}\-[0-9]{4}$)/;
		if(!phone.match(phonePatt)) {
			$('#phonecontainer').addClass('error');
			let p = $('<p></p>');
			p.html('Please a enter proper phone number');
			$('#errorMessages').append(p);
			error = true;
		//	e.preventDefault();
		} else {
			$('#phonecontainer').removeClass('error');
		}
	
		/*The email email must be of a valid format*/
		var email = $('#email').val();
		var emailPatt = /^\w{1,}@\w{1,}\.\w{1,}$/
		if(!email.match(emailPatt)) {
			$('#emailcontainer').addClass('error');
			let p = $('<p></p>');
			p.html('Please a enter proper email');
			$('#errorMessages').append(p);
			error = true;
		//	e.preventDefault();
		} else {
			$('#emailcontainer').removeClass('error');
		}
	
		/*The passwords must be identical and between 8 to 16 characters long*/
		var pass1 = $('#password1').val();
		var passPatt = /^.{8,16}$/;
		if(!pass1.match(passPatt)) {
			$('#password1container').addClass('error');
			let p = $('<p></p>');
			p.html('Please a enter proper password');
			$('#errorMessages').append(p);
			error = true;
		//	e.preventDefault();
		} else {
			$('#password1container').removeClass('error');
		}

		var pass2 = $('#password2').val();
		if(pass1 !== pass2) {
			$('#password2container').addClass('error');
			let p = $('<p></p>');
			p.html('Passwords do not match');
			$('#errorMessages').append(p);
			error = true;
		//	e.preventDefault();
		} else {
			$('#password2container').removeClass('error');
		}
		
		/*The agreement to terms and conditions must be checked*/
		if(!$('#agree').prop('checked')) {
			$('#agreecontainer').addClass('error');
			let p = $('<p></p>');
			p.html('You must agree to the terms to register');
			$('#errorMessages').append(p);
			error = true;
		//	e.preventDefault();
		} else {
			$('#agreecontainer').removeClass('error');
		}
		
		if(error) $('#errors').show();
	
	});
});
