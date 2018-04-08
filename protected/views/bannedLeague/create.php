<?php
/* @var $this BannedLeagueController */
/* @var $model BannedLeague */

$this->breadcrumbs=array(
	'Banned Leagues'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List BannedLeague', 'url'=>array('index')),
	array('label'=>'Manage BannedLeague', 'url'=>array('admin')),
);
?>

<h1>Create BannedLeague</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>