<?php foreach ($experiments as $experiment):?>
	<?php $data['experiment'] = $experiment; ?>
	<div class="panel exp">
		<div class="titleholder">
			<div class="row full">
				<div class="large-12 column">
					<h3> <?php echo anchor('experiment/view/'.$experiment->eid, $experiment->title); ?> </h3>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="large-12 column">
				<div class="panel">
					<?php $this->load->view('faculty/_experiment_info',$data); ?>
				</div>
			</div>
		</div>
	</div>
<?php endforeach; ?>