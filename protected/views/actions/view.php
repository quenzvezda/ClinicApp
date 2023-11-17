<?php
/* @var $this ActionsController */
/* @var $model Actions */

$this->breadcrumbs=array(
	'Actions'=>array('index'),
	$model->action_id,
);

$this->menu=array(
	array('label'=>'List Actions', 'url'=>array('index')),
	array('label'=>'Create Actions', 'url'=>array('create')),
	array('label'=>'Update Actions', 'url'=>array('update', 'id'=>$model->action_id)),
	array('label'=>'Delete Actions', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->action_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Actions', 'url'=>array('admin')),
);
?>

<h1>View Actions #<?php echo $model->action_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'action_id',
		'action_name',
		'action_cost',
	),
)); ?>
