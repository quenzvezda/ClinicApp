<?php
/* @var $this UsersController */
/* @var $model Users */

$this->breadcrumbs=array(
	'Users'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Users', 'url'=>array('index')),
	array('label'=>'Manage Users', 'url'=>array('admin')),
);

$this->renderPartial('_form', array(
    'model' => $model,
    'roles' => $roles, // Tambahkan ini
	'employees'=>$employees,
));
?>