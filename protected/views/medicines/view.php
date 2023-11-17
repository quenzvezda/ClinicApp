<?php
/* @var $this MedicinesController */
/* @var $model Medicines */

$this->breadcrumbs=array(
	'Medicines'=>array('index'),
	$model->medicine_id,
);

$this->menu=array(
	array('label'=>'List Medicines', 'url'=>array('index')),
	array('label'=>'Create Medicines', 'url'=>array('create')),
	array('label'=>'Update Medicines', 'url'=>array('update', 'id'=>$model->medicine_id)),
	array('label'=>'Delete Medicines', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->medicine_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Medicines', 'url'=>array('admin')),
);
?>

<h1>View Medicines #<?php echo $model->medicine_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'medicine_id',
		'medicine_name',
		'price',
	),
)); ?>
