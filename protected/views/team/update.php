<?php
/* @var $this TeamController */
/* @var $model Team */

$this->breadcrumbs=array(
	'Команды'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Редактировать',
);

$this->menu=array(
	array('label'=>'Список команд', 'url'=>array('index')),
	array('label'=>'Создать команду', 'url'=>array('create')),
	array('label'=>'Просмотр команды', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Управление командами', 'url'=>array('admin')),
);
?>

<h3>Редактировать команду "<?php echo $model->name; ?>"</h3>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>