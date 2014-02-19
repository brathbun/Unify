<div id="container">

	<h1>My To Do App</h1>

	<h2>Add your task below</h2>

	<!-- Same as <form action="http://localhost/todo/create-task" method="post" accept-charset="utf-8"> -->
	<?php echo form_open('create-task'); ?> 
		<!-- Same as Label and Text Input -->	
		<?php echo form_label('Task','task') . ' ' . form_input('task'); ?>
		<!-- Same as Submit Button -->	
		<?php echo form_submit('submit','Add Task'); ?>
	<!-- Same as </form> -->
	<?php echo form_close(); ?>

</div>