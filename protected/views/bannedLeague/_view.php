<?php
/* @var $this BannedLeagueController */
/* @var $data BannedLeague */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('alias')); ?>:</b>
	<?php echo CHtml::encode($data->alias); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('bets_provider_id')); ?>:</b>
	<?php echo CHtml::encode($data->bets_provider_id); ?>
	<br />


</div>