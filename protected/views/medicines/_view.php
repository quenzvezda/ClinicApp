<?php
/* @var $this MedicinesController */
/* @var $data Medicines */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('medicine_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->medicine_id), array('view', 'id'=>$data->medicine_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('medicine_name')); ?>:</b>
	<?php echo CHtml::encode($data->medicine_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('price')); ?>:</b>
	<?php echo CHtml::encode($data->price); ?>
	<br />


</div>