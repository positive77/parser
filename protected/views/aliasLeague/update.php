<?php
/* @var $this AliasLeagueController */
/* @var $model AliasLeague */

$this->breadcrumbs=array(
	'Alias Leagues'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List AliasLeague', 'url'=>array('index')),
	array('label'=>'Create AliasLeague', 'url'=>array('create')),
	array('label'=>'View AliasLeague', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage AliasLeague', 'url'=>array('admin')),
);
?>

<h1>Update AliasLeague <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>