<?php
/* @var $this UsersController */
/* @var $data Users */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('user_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->user_id), array('view', 'id'=>$data->user_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('username')); ?>:</b>
	<?php echo CHtml::encode($data->username); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('password')); ?>:</b>
	<?php echo CHtml::encode($data->password); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('employee name')); ?>:</b>
    <?php echo CHtml::encode($data->employee ? $data->employee->employee_name : "No employee linked"); ?>
    <br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('role')); ?>:</b>
    <?php echo CHtml::encode($data->getRoleName()); ?>
    <br />

</div>