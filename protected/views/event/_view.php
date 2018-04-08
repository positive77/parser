<?php
/* @var $this EventController */
/* @var $data Event */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('team_home')); ?>:</b>
	<?php echo CHtml::encode($data->team_home); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('team_away')); ?>:</b>
	<?php echo CHtml::encode($data->team_away); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('date')); ?>:</b>
	<?php echo CHtml::encode($data->date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('created')); ?>:</b>
	<?php echo CHtml::encode($data->created); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('league_id')); ?>:</b>
	<?php echo CHtml::encode($data->league_id); ?>
	<br />


</div>