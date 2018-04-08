<?php
/* @var $this LineController */
/* @var $model Line */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'team_home'); ?>
		<?php echo $form->textField($model,'team_home'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'draw'); ?>
		<?php echo $form->textField($model,'draw'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'team_away'); ?>
		<?php echo $form->textField($model,'team_away'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'event_id'); ?>
		<?php echo $form->textField($model,'event_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'count_points'); ?>
		<?php echo $form->textField($model,'count_points'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'bet_type_id'); ?>
		<?php echo $form->textField($model,'bet_type_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'created'); ?>
		<?php echo $form->textField($model,'created'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'updated'); ?>
		<?php echo $form->textField($model,'updated'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->