<?php
/* @var $this EmployeesController */
/* @var $model Employees */

$this->breadcrumbs=array(
	'Employees'=>array('index'),
	$model->employee_id,
);

$this->menu=array(
	array('label'=>'List Employees', 'url'=>array('index')),
	array('label'=>'Create Employees', 'url'=>array('create')),
	array('label'=>'Update Employees', 'url'=>array('update', 'id'=>$model->employee_id)),
	array('label'=>'Delete Employees', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->employee_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Employees', 'url'=>array('admin')),
);
?>

<h1>View Employees #<?php echo $model->employee_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'employee_id',
		'employee_name',
		'region_id',
	),
)); ?>
