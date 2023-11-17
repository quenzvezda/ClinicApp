<?php
/* @var $this EmployeesController */
/* @var $data Employees */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('employee_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->employee_id), array('view', 'id'=>$data->employee_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('employee_name')); ?>:</b>
	<?php echo CHtml::encode($data->employee_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('email')); ?>:</b>
	<?php echo CHtml::encode($data->email); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('region_id')); ?>:</b>
	<?php echo CHtml::encode($data->region_id); ?>
	<br />


</div>