<?php
/* @var $this LineController */
/* @var $model Line */

$this->breadcrumbs=array(
	'Lines'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Line', 'url'=>array('index')),
	array('label'=>'Create Line', 'url'=>array('create')),
	array('label'=>'View Line', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Line', 'url'=>array('admin')),
);
?>

<h1>Update Line <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>