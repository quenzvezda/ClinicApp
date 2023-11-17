<?php
/* @var $this RegionsController */
/* @var $data Regions */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('region_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->region_id), array('view', 'id'=>$data->region_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('region_name')); ?>:</b>
	<?php echo CHtml::encode($data->region_name); ?>
	<br />


</div>