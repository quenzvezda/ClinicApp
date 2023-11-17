<?php
/* @var $this MedicinesController */
/* @var $model Medicines */

$this->breadcrumbs=array(
	'Medicines'=>array('index'),
	$model->medicine_id=>array('view','id'=>$model->medicine_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Medicines', 'url'=>array('index')),
	array('label'=>'Create Medicines', 'url'=>array('create')),
	array('label'=>'View Medicines', 'url'=>array('view', 'id'=>$model->medicine_id)),
	array('label'=>'Manage Medicines', 'url'=>array('admin')),
);
?>

<h1>Update Medicines <?php echo $model->medicine_id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>