<?php
/* @var $this LeagueController */
/* @var $model League */

$this->breadcrumbs=array(
	'Лиги'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Редактировать',
);

$this->menu=array(
	array('label'=>'Список лиг', 'url'=>array('index')),
	array('label'=>'Создать лигу', 'url'=>array('create')),
	array('label'=>'Просмотр лиги', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Управление лигами', 'url'=>array('admin')),
);
?>

<h3>Редактировать лигу "<?php echo $model->name; ?>"</h3>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>