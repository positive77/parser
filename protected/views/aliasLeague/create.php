<?php
/* @var $this AliasLeagueController */
/* @var $model AliasLeague */

$this->breadcrumbs=array(
	'Alias Leagues'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List AliasLeague', 'url'=>array('index')),
	array('label'=>'Manage AliasLeague', 'url'=>array('admin')),
);
?>

<h1>Create AliasLeague</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>