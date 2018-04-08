<?php
/* @var $this AliasLeagueController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Alias Leagues',
);

$this->menu=array(
	array('label'=>'Create AliasLeague', 'url'=>array('create')),
	array('label'=>'Manage AliasLeague', 'url'=>array('admin')),
);
?>

<h1>Alias Leagues</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
