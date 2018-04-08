<?php
/* @var $this TeamController */
/* @var $model Team */

$this->breadcrumbs=array(
	'Команды'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'Список команд', 'url'=>array('index')),
	array('label'=>'Создать команду', 'url'=>array('create')),
	array('label'=>'Редактировать команду', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Удалить команду', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Управление командами', 'url'=>array('admin')),
);
?>

<h3>Просмотр команды "<?php echo $model->name; ?>"</h3>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
	),
)); ?>
