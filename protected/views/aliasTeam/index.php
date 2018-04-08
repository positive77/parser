<?php
/* @var $this AliasTeamController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Alias Teams',
);

$this->menu=array(
	array('label'=>'Create AliasTeam', 'url'=>array('create')),
	array('label'=>'Manage AliasTeam', 'url'=>array('admin')),
);
?>

<h1>Alias Teams</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
