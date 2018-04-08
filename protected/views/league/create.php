<?php
/* @var $this LeagueController */
/* @var $model League */

$this->breadcrumbs=array(
	'Лиги'=>array('index'),
	'Создать',
);

$this->menu=array(
	array('label'=>'Список лиг', 'url'=>array('index')),
	array('label'=>'Управление лигами', 'url'=>array('admin')),
);
?>

<h3>Создать лигу</h3>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>