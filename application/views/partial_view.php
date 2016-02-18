<?php
	foreach($all_notes as $each_note)
	{
?>
		<div class='col-sm-3'>
			<form id='edit_note' role='form' action='/notes/edit' method='post'>
				<input type='hidden' name='id' value='<?= $each_note['id'] ?>'>				
				<textarea id='note' class='form-control' name='description'><?= $each_note['description'] ?></textarea>
				<!-- <button class='btn btn-default' type='submit'>Edit</button>			 -->	
			</form>
			<form id='#delete_note' action='/notes/delete' method='post'>
				<input type='hidden' name='id' value='<?= $each_note['id'] ?>'>
				<p><input type='submit' class='btn btn-warning' value='Delete'></p>
			</form>
		</div>
<?php
	}
?>
	<div class='col-sm-3'>
		<div class='panel panel-default'>
			<div class='panel-body'>
				New posts goes here...
			</div>
		</div>
	</div>


