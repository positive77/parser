<?php
/* @var $this LineController */
/* @var $data Line */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('team_home')); ?>:</b>
	<?php echo CHtml::encode($data->team_home); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('draw')); ?>:</b>
	<?php echo CHtml::encode($data->draw); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('team_away')); ?>:</b>
	<?php echo CHtml::encode($data->team_away); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('event_id')); ?>:</b>
	<?php echo CHtml::encode($data->event_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('count_points')); ?>:</b>
	<?php echo CHtml::encode($data->count_points); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('bet_type_id')); ?>:</b>
	<?php echo CHtml::encode($data->bet_type_id); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('created')); ?>:</b>
	<?php echo CHtml::encode($data->created); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('updated')); ?>:</b>
	<?php echo CHtml::encode($data->updated); ?>
	<br />

	*/ ?>

</div>