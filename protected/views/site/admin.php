<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name . ' - Admin';
$this->breadcrumbs=array(
    'Admin',
);

?>

<h1>Welcome to Admin Dashboard</h1>
<ul>
    <li><a href="<?php echo Yii::app()->createUrl('users/admin'); ?>">Manage Users</a></li>
    <li><a href="<?php echo Yii::app()->createUrl('regions/admin'); ?>">Manage Regions</a></li>
    <li><a href="<?php echo Yii::app()->createUrl('employees/admin'); ?>">Manage Employees</a></li>
    <li><a href="<?php echo Yii::app()->createUrl('medicines/admin'); ?>">Manage Medicines</a></li>
    <li><a href="<?php echo Yii::app()->createUrl('actions/admin'); ?>">Manage Actions</a></li>
</ul>


<p>This is the admin dashboard. Place the admin functionalities here.</p>

<!-- Anda bisa menambahkan link ke berbagai bagian dari CRUD master di sini -->
