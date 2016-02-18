<!DOCTYPE HTML>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>CI AJax Demo View</title>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	
	<style type="text/css">
		.container-fluid {
			margin: 20px 2%;
		}
		.panel-body {
			border: 1px solid black;
			height: 250px;
			/*overflow-y: scroll;*/
		}

		textarea #note {
			border: 1px solid black;
			height: 250px;
			overflow-y: scroll,hidden;
			margin-bottom: 5px;
		}

		#note {
			border: 1px solid black;
			height: 250px;
			overflow-y: scroll, hidden;
			margin-bottom: 5px;
		}

		form p {
			margin-bottom: 20px;
		}

	</style>
	<script type="text/javascript">
		function addListener(){
			$('#edit_note',"#delete_note").submit(function(){
				console.log("post data from edit note from are "+$(this).serialize());
				$.post($(this).attr('action'),$(this).serialize(),function(res){
					$('#notes_go_here').html(res);
					addListener();
				});
				return false;
			});
		};

		$(document).ready(function(){

			$('form').on('submit',function(){
				$.post($(this).attr('action'),$(this).serialize(),function(res){
					$('#notes_go_here').html(res);
					$("#input_box").val('');
					addListener();
				});
				return false;
			})

			$('body').on('change','#note',function(){
				$(this).parent().submit();
				$(this).focus();
			})

			$(document).ajaxComplete(function(){
				window.location.reload(true);
			})
			
		});

	</script>
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">


</head>
<body>
	<div class='container-fluid'>
		<h1>My Posts:</h1>

		
		<div class='row' id='notes_go_here'>
<?php
			require('partial_view.php');
?>			
		</div>
	

		<div class='row'>
			<div class='form col-sm-3 col-xs-12'>
				<form id='add_new' role='form' action='/notes/create' method='post'>
					<div class='form-group'>
						<label for='description'>Add a note:</label>
						<textarea id='input_box' class='form-control' rows='5' name='description' placeholder='Enter note here.'></textarea>
					</div>					
					<button class='btn btn-primary' type='submit'>Post it!</button>
				</form>
			</div>
		</div>


	</div>
</body>
</html>