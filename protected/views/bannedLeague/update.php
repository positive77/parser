<?php
/* @var $this BannedLeagueController */
/* @var $model BannedLeague */

$this->breadcrumbs=array(
	'Banned Leagues'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List BannedLeague', 'url'=>array('index')),
	array('label'=>'Create BannedLeague', 'url'=>array('create')),
	array('label'=>'View BannedLeague', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage BannedLeague', 'url'=>array('admin')),
);
?>

<h1>Update BannedLeague <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>