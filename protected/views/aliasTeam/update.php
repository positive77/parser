<?php
/* @var $this AliasTeamController */
/* @var $model AliasTeam */

$this->breadcrumbs=array(
	'Alias Teams'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List AliasTeam', 'url'=>array('index')),
	array('label'=>'Create AliasTeam', 'url'=>array('create')),
	array('label'=>'View AliasTeam', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage AliasTeam', 'url'=>array('admin')),
);
?>

<h1>Update AliasTeam <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>