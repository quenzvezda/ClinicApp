<?php
/* @var $this RegionsController */
/* @var $model Regions */

$this->breadcrumbs=array(
	'Regions'=>array('index'),
	$model->region_id=>array('view','id'=>$model->region_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Regions', 'url'=>array('index')),
	array('label'=>'Create Regions', 'url'=>array('create')),
	array('label'=>'View Regions', 'url'=>array('view', 'id'=>$model->region_id)),
	array('label'=>'Manage Regions', 'url'=>array('admin')),
);
?>

<h1>Update Regions <?php echo $model->region_id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>