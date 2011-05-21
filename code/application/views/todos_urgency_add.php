<?php $this->load->view('common/head');?>
<?php $this->load->view('common/header');?>
<?php $this->load->view('common/nav');?>

<?php echo validation_errors(); ?>
<?php echo form_open('todos/add_urgency'); ?>
	<fieldset>
		<legend>Urgency details</legend>
		<p>
			<label for="urgency_name">Urgency name (ie today, high, medium, backburner)</label>
			<input type="text" class="text" name="urgency_name" />
		</p>
	</fieldset>
	<p>
		<input type="submit" />
	</p>
</form>
<?php $this->load->view('common/footer'); ?>