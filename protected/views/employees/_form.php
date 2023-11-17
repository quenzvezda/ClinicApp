<?php
/* @var $this EmployeesController */
/* @var $model Employees */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'employees-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'employee_name'); ?>
		<?php echo $form->textField($model,'employee_name',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'employee_name'); ?>
	</div>

	<div class="row">
        <?php echo $form->labelEx($model,'email'); ?>
        <?php echo $form->textField($model,'email',array('size'=>60,'maxlength'=>255)); ?>
        <?php echo $form->error($model,'email'); ?>
    </div>

	<div class="row">
		<?php echo $form->labelEx($model,'region'); // Label untuk region ?>
		<?php
		$this->widget('zii.widgets.jui.CJuiAutoComplete', array(
			'name' => 'region_autocomplete',
			'sourceUrl' => array('regions/search'), // URL yang mengembalikan data JSON
			'options' => array(
				'select' => 'js:function(event, ui) {
					$("#hidden_region_id").val(ui.item.id);
				}'
			),
			'htmlOptions' => array(
				'size' => '40'
			),
		));
		?>
		<?php echo $form->hiddenField($model, 'region_id', array('id' => 'hidden_region_id')); ?>
		<?php echo $form->error($model,'region_id'); ?>
	</div>


	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->