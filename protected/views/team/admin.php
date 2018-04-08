<?php
/* @var $this TeamController */
/* @var $model Team */

$this->breadcrumbs=array(
	'Команды'=>array('index'),
	'Управление командами',
);

$this->menu=array(
	array('label'=>'Список команд', 'url'=>array('index')),
	array('label'=>'Создать команду', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#team-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h3>Управление командами</h3>

<p>
Вы можете дополнительно ввести оператор сравнения (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
или <b>=</b>) в начале каждого из значений поиска.
</p>

<?php echo CHtml::link('Расширенный поиск','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'team-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(		
                 array(
                    'name'=>'id',                    
                    'htmlOptions'=>array('width'=>'40px'),  
                     ),
		'name',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
