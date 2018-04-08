<?php
/* @var $this LeagueController */
/* @var $model League */

$this->breadcrumbs=array(
	'Лиги'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'Список лиг', 'url'=>array('index')),
	array('label'=>'Создать лигу', 'url'=>array('create')),
	array('label'=>'Редактировать лигу', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Удалить лигу', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Управление лигами', 'url'=>array('admin')),
);
?>

<h3>Просмотр лиги "<?php echo $model->name; ?>"</h3>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		array('name'=>'sport_id',
                      'value'=>$model->sport->name,
                    ),
	),
)); ?>
