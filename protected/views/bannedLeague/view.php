<?php
/* @var $this BannedLeagueController */
/* @var $model BannedLeague */

$this->breadcrumbs=array(
	'Banned Leagues'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List BannedLeague', 'url'=>array('index')),
	array('label'=>'Create BannedLeague', 'url'=>array('create')),
	array('label'=>'Update BannedLeague', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete BannedLeague', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage BannedLeague', 'url'=>array('admin')),
);
?>

<h1>View BannedLeague #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'alias',
		'bets_provider_id',
	),
)); ?>
