<div class="row">
	<div class="large-6 column">
		<div class="panel dash-item" style="border-color:#e74c3c">
			<h1>Welcome!</h1>
			<p> You are currently logged in as <strong> <?php echo $this->session->userdata('username'); ?> </strong> with a role of <strong> <?php echo ucfirst($this->session->userdata('active_role')); ?> </strong> </p>
		</div>

		<div class="panel dash-item" style="border-color:#f1c40f">
			<?php $this->load->view('faculty/_notifications'); ?>
		</div>

		<div class="panel dash-item" style="border-color:#0066dd">
			<?php $this->load->view('faculty/_experiments_summary'); ?>
		</div>
	</div>


	<div class="large-6 column">
		<div class="panel dash-item" style="border-color:#0066dd">
			<?php $this->load->view('faculty/_laboratory_summary'); ?>
		</div>

		<div class="panel dash-item" style="border-color:#2ecc71">
			<?php $this->load->view('faculty/_statistics'); ?>
		</div>
	</div>
</div>