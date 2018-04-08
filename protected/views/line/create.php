<?php
/* @var $this LineController */
/* @var $model Line */

$this->breadcrumbs=array(
	'Lines'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Line', 'url'=>array('index')),
	array('label'=>'Manage Line', 'url'=>array('admin')),
);
?>

<h1>Create Line</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>