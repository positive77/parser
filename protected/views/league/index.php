<?php
/* @var $this LeagueController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Лиги',
);

$this->menu=array(
	array('label'=>'Создать лигу', 'url'=>array('create')),
	array('label'=>'Управление лигами', 'url'=>array('admin')),
);
?>

<h3>Лиги</h3>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
