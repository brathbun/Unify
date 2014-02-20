<div id="container" class="large-12 columns">

	<div class="row"><div class="large-6 large-centered columns"><h1>My To Do App</h1></div></div>

	<div class="row"><div class="large-6 large-centered columns"><h2>Add your task below</h2></div></div>

	<form action="create-task" method="post" accept-charset="utf-8">
		<div class="row">	
			<div class="large-6 large-centered columns">
				<?php echo form_label('Task:','task') . ' ' . form_input('task'); ?>
			</div>
		</div>
		
		<div class="row">	
			<div class="large-6 large-centered columns">
				<?php echo form_dropdown('category', $dropdown); ?>
			</div>
		</div>

		<div class="row">	
			<div class="large-6 large-centered columns">
				<?php echo form_submit('submit','Add Task'); ?>
			</div>
		</div>

		<div class="row">	
			<div class="large-6 large-centered columns">
				<?php echo form_error('task'); ?>
	</form>
	
	<div id="tasks" class="row">
		<div class="large-8 large-centered columns">
			<table>
				<tr>    
		          <th>Task</th>    
		          <th>Category</th>
				</tr>
				<?php if (!empty($info)) : ?>
						<?php foreach ($info['task'] as $k=>$v) :?>
						<tr>
							<td><?php echo $v; ?></td>
							<td><?php echo $info['category'][$k]; ?></td>
						</tr>
						<?php endforeach; ?>
				<?php else : ?>
					<p>No tasks are available.</p>
				<?php endif; ?>
			</table>
		</div>
	</div>

</div>