<?php
/* @var $this LeagueController */
/* @var $model League */

$this->breadcrumbs=array(
	'Лиги'=>array('index'),
	'Управление лигами',
);

$this->menu=array(
	array('label'=>'Список лиг', 'url'=>array('index')),
	array('label'=>'Создать лигу', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#league-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h3>Управление лигами</h3>

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
	'id'=>'league-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		array(
                    'name'=>'id',                    
                    'htmlOptions'=>array('width'=>'40px'),
                ),
		'name',
                array('name'=>'sport_id',
                      'value'=>'$data->sport->name',
                    ),		
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
