<?php
/* @var $this LineController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Lines',
);

$this->menu=array(
	array('label'=>'Create Line', 'url'=>array('create')),
	array('label'=>'Manage Line', 'url'=>array('admin')),
);
?>

<h1>Lines</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
