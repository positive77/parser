<?php
/* @var $this AliasTeamController */
/* @var $model AliasTeam */

$this->breadcrumbs=array(
	'Alias Teams'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List AliasTeam', 'url'=>array('index')),
	array('label'=>'Manage AliasTeam', 'url'=>array('admin')),
);
?>

<h1>Create AliasTeam</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>