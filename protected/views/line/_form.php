<?php
/* @var $this LineController */
/* @var $model Line */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'line-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'team_home'); ?>
		<?php echo $form->textField($model,'team_home'); ?>
		<?php echo $form->error($model,'team_home'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'draw'); ?>
		<?php echo $form->textField($model,'draw'); ?>
		<?php echo $form->error($model,'draw'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'team_away'); ?>
		<?php echo $form->textField($model,'team_away'); ?>
		<?php echo $form->error($model,'team_away'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'event_id'); ?>
		<?php echo $form->textField($model,'event_id'); ?>
		<?php echo $form->error($model,'event_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'count_points'); ?>
		<?php echo $form->textField($model,'count_points'); ?>
		<?php echo $form->error($model,'count_points'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'bet_type_id'); ?>
		<?php echo $form->textField($model,'bet_type_id'); ?>
		<?php echo $form->error($model,'bet_type_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'created'); ?>
		<?php echo $form->textField($model,'created'); ?>
		<?php echo $form->error($model,'created'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'updated'); ?>
		<?php echo $form->textField($model,'updated'); ?>
		<?php echo $form->error($model,'updated'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->