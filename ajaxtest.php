<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />	
	<script type="text/javascript" src="http://www.footballdream.net/resources/js/jquery.js"></script>

	</head>
	<body>
<div id="bla">
	"Pavle je ošo"
</div>

<select id="parcela">
	<option value="1">u bitriju</option>
	<option value="2">na WC</option>
</select>

<script type="text/javascript">

		$(document).ready(function() {
	
		$('#parcela').change(function(){

			$.post("ajax/ajax.php", {
				opcija: $('#parcela').val()
			}, function(response){
				setTimeout("finishAjax('bla', '"+escape(response)+"')", 400);
			});
			return false;
		});

		});

		function finishAjax(id, response){
	 	 $('#loader').hide();
	 	 $('#'+id).html(unescape(response));
	 	 $('#'+id).fadeIn();
		}
	</script>
	</body>
	</head>
<? php

?>


