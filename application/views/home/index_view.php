<!-- Main content -->
<div id="container" class="large-12 columns">

	<div class="row"><div class="large-6 large-centered columns"><h3>Welcome <?php echo $username ?>!</h3></div></div>
	<div class="row"><div class="large-6 large-centered columns"><h5>Current listed events</h5></div></div>

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
