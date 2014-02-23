<div class="contain-to-grid">
  <nav class="top-bar" data-topbar>
    <ul class="title-area">
      <li class="name">
        <h1><a href="<?php echo base_url(); ?>">Rawcritics Unify Project</a></h1>
      </li>
      <li class="toggle-topbar menu-icon"><a href="#">Menu</a></li>
    </ul>

    <section class="top-bar-section">
      <!-- Right Nav Section -->
      <ul class="right">
        <li class="divider hide-for-small"></li>
        <li class="has-dropdown"><a href="#">Welcome <?php echo $username ?>!</a>
          <ul class="dropdown">

			<li><label>User Options</label></li>
				<?php if ($this->session->userdata('logged_in')) {
					echo '<li><a href="createEvent">Add an Event</a></li>';
					echo '<li><a href="logout">Sign Out</a></li>';
				} else {
					echo '<li><a href="signup">Sign Up</a></li>';
					echo '<li><a href="login">Sign In</a></li>';
				} ?>
			<li class="divider"></li>
			<li><label>Other Options</label></li>
			<li><a href="#">Dropdown Level 1d</a></li>

          </ul>
        </li>
      </ul>    

      <!-- Left Nav Section 
      <ul class="left">
        <li><a href="create-event">Add an Event</a></li>
      </ul>
      -->

    </section>
  </nav>
</div>