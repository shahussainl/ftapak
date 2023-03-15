<?php
	if(!empty($this->session->flashdata('danger')))
	{
?>
<br>
<div class="alert alert-danger alert-dismissible">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
<strong><i class="icon fa fa-trash"></i></strong>
<?= $this->session->flashdata('danger'); ?>
</div>
<br>
<?php
	}
?>
<?php
	if(!empty($this->session->flashdata('success')))
	{
?>
<br>
<div class="alert alert-success alert-dismissible">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
<strong><i class="icon fa fa-success"></i></strong>
<?= $this->session->flashdata('success'); ?>
</div>
<br>
<?php
	}
?>