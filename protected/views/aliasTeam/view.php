<?php
/* @var $this AliasTeamController */
/* @var $model AliasTeam */

$this->breadcrumbs=array(
	'Alias Teams'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List AliasTeam', 'url'=>array('index')),
	array('label'=>'Create AliasTeam', 'url'=>array('create')),
	array('label'=>'Update AliasTeam', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete AliasTeam', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage AliasTeam', 'url'=>array('admin')),
);
?>

<h1>View AliasTeam #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'alias',
		'team_id',
	),
)); ?>
