<?php if(isset($notification)): ?>
	<pre> <?php echo $notification; ?> </pre>
<?php endif; ?>

<h1> Sign In </h1>

<?php $this->load->view('signin/_form'); ?>