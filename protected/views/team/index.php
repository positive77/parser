<?php
/* @var $this TeamController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Команды',
);

$this->menu=array(
	array('label'=>'Создать команду', 'url'=>array('create')),
	array('label'=>'Управление командами', 'url'=>array('admin')),
);
?>

<h3>Команды</h3>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
