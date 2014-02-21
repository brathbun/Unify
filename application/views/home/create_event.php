<!-- Main content -->
<div id="container" class="large-12 columns">

	<div class="row"><div class="large-6 large-centered columns"><h2>Add your event</h2></div></div>

	<form action="create-event" method="post" accept-charset="utf-8">
		<div class="row">	
			<div class="large-6 large-centered columns">
				<div class="row collapse">
					<div class="small-9 large-centered columns">
						<?php echo form_input($eventname_field); ?>
					</div>
					<div class="small-3 large-centered columns">
						<span class="postfix radius">Event Name</span>
					</div>
				</div>
			</div>
		</div>
		
		<div class="row">	
			<div class="large-6 large-centered columns">
				<div class="row collapse">
					<div class="small-9 large-centered columns">
						<?php echo form_dropdown('category', $dropdown); ?>
					</div>
					<div class="small-3 large-centered columns">
						<span class="postfix radius">Game Type</span>
					</div>
				</div>		
			</div>
		</div>

		<div class="row">	
			<div class="large-6 large-centered columns">
				<?php echo form_submit('submit','Add Event'); ?>
			</div>
		</div>

		<div class="row">	
			<div class="large-8 large-centered columns">
				<?php echo form_error('event'); ?>
			</div>
		</div>
	</form>
	
	<div id="listevents" class="row">
		<div class="large-6 large-centered columns">
			<table>
				<tr>    
		          <th>Event Name</th>    
		          <th>Category</th>
				</tr>
				<?php if (!empty($events)) : ?>
						<?php foreach ($events['eventname'] as $k=>$v) :?>
						<tr>
							<td><?php echo $v; ?></td>
							<td><?php echo $events['category'][$k]; ?></td>
						</tr>
						<?php endforeach; ?>
				<?php else : ?>
					<tr><td>No tasks are available.</td></tr>
				<?php endif; ?>
			</table>
		</div>
	</div>
</div>
<!-- Main Content Stop -->
