<!-- Main content -->
<div id="container" class="large-12 columns">

	<div class="row"><div class="large-6 large-centered columns"><h2>Add your event</h2></div></div>

	<form data-abide action="createEvent" method="post" accept-charset="utf-8">
		<div class="row">	
			<div class="large-6 large-centered columns">
				<div class="row collapse">
					<div class="small-3 large-centered columns">
						<span class="prefix radius">Event Name</span>
					</div>
					<div class="small-9 large-centered columns">
						<input type="text" required name="eventname" placeholder="e.g. Rhadley's Sunday Night Hearthstone Event" maxlength="100">
						<small class="error">Username is required.</small>	
					</div>
				</div>
			</div>
		</div>
		
		<div class="row">	
			<div class="large-6 large-centered columns">
				<div class="row collapse">
					<div class="small-3 large-centered columns">
						<span class="prefix radius">Game Type</span>
					</div>
					<div class="small-9 large-centered columns">
						<?php echo form_dropdown('category', $dropdown); ?>
					</div>
				</div>		
			</div>
		</div>

		<div class="row"><div class="large-3 large-centered columns">
			<button type="submit">Submit it to the World!</button>
		</div></div>	


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
