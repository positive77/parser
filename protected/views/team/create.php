<?php
/* @var $this TeamController */
/* @var $model Team */

$this->breadcrumbs=array(
	'Команды'=>array('index'),
	'Создание',
);

$this->menu=array(
	array('label'=>'Список команд', 'url'=>array('index')),
	array('label'=>'Управление командами', 'url'=>array('admin')),
);
?>

<h3>Создать команду</h3>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>