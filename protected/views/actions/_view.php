<?php
/* @var $this ActionsController */
/* @var $data Actions */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('action_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->action_id), array('view', 'id'=>$data->action_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('action_name')); ?>:</b>
	<?php echo CHtml::encode($data->action_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('action_cost')); ?>:</b>
	<?php echo CHtml::encode($data->action_cost); ?>
	<br />


</div>