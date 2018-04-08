<?php
/* @var $this LineController */
/* @var $model Line */

$this->breadcrumbs=array(
	'Lines'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Line', 'url'=>array('index')),
	array('label'=>'Create Line', 'url'=>array('create')),
	array('label'=>'Update Line', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Line', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Line', 'url'=>array('admin')),
);
?>

<h1>View Line #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'team_home',
		'draw',
		'team_away',
		'event_id',
		'count_points',
		'bet_type_id',
		'created',
		'updated',
	),
)); ?>
