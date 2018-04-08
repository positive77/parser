<?php
/* @var $this BannedLeagueController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Banned Leagues',
);

$this->menu=array(
	array('label'=>'Create BannedLeague', 'url'=>array('create')),
	array('label'=>'Manage BannedLeague', 'url'=>array('admin')),
);
?>

<h1>Banned Leagues</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
