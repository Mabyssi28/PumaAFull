$(function(){
	window.onload = function(){
		$('#btn_login').attr('disabled', true);
	}

	$('#btn_next').click(function(){
		var code = $('#code').val();

		$.ajax({
			url: "Php/Select/code.php",
			type: "post",
			data: {code: code},
			success: function(r) {
				if (r == "true") {
					$('#container_form_1').attr('style', 'display: none;');
					$('#container_form_2').attr('style', 'display: block;');
					$('#name').focus();
					$('#error_code').html('');
					$('#code_send').val(code);
				}else if (r == "false") {
					$('#error_code').html('El código no es válido<br>');
				}
			}
		})
	})

	$('#btn_register').click(function(){
		var name = $('#fieldName').val(),
			lastname = $('#fieldyuhdyky').val(),
			email = $('#fieldEmail').val(),
			confirm_email = $('#fieldyuhdykj').val(),
			phone = $('#fieldyuhdykt').val(),
			checkbox = $('#cm-privacy-consent'),
			expresion = /\w+@\w+\.+[a-z]/;

		if (checkbox.is(':checked')) {
			if (name && lastname && email && confirm_email && phone != "") {
				if (email == confirm_email) {
					if (!expresion.test(email)) {
						$('#error_form_info').html('No es un correo válido<br><br>');
					}else {
						$('#error_form_info').html('');
						$.ajax({
							url: "Php/Insert/user.php",
							type: "post",
							data: {code: $('#code').val(), name: name, lastname: lastname, email: email, phone: phone},
							success: function(r) {
								$("#error_form_info").html(r);
							}
						})
						$('#subForm').submit();
					}
				}else {
					$('#error_form_info').html('Los correos no son idénticos<br><br>');
				}
			}else {
				$('#error_form_info').html('Por favor complete todos los datos<br><br>');
			}
		}else {
			$('#error_form_info').html('Por favor acepta los términos y condiciones<br><br>');
		}
	})

	$('#btn_login').click(function(){
		var user = $('#user').val(),
			pass = $('#pass').val();

		if (user && pass != "") {
			$.ajax({
				url: "Php/Select/admin.php",
				type: "post",
				data: {user:user, pass:pass},
				success: function(r) {
					$('#error_code_login').html(r + '<br><br>');
				}
			})
		}else {
			$('#error_code_login').html('Por favor complete los campos <br><br>');
		}
	})

	$('#select_pais').change(function(){
		$('#btn_sortear').removeAttr('disabled');
	})
})