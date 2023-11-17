<?php
/* @var $this MedicinesController */
/* @var $model Medicines */

$this->breadcrumbs=array(
	'Medicines'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Medicines', 'url'=>array('index')),
	array('label'=>'Manage Medicines', 'url'=>array('admin')),
);
?>

<h1>Create Medicines</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>