<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>

<h3>Отчеты парсера</h3>
<div class="view">
<?php $report = ParseReport::model()->find('bet_provider_id = :bpid',array(':bpid'=>BetsProvider::LEONBETS));?>
<div class="portlet-decoration">
    <div class="portlet-title">
        Отчет по парсингу 
        <?php echo CHtml::link($report->betProvider->name,$report->betProvider->base_url,array('target'=>'_blank'));?>
        | Создано: <?php echo $report->count_created;?> линий
        | Обновлено: <?php echo $report->count_updated;?> линий
        | Дата последнего обхода: <?php echo date("d.m.Y H:i:s",  strtotime($report->date));?>
    </div>
</div>
    <?php echo ParseReport::model()->find('bet_provider_id = :bpid',array(':bpid'=>BetsProvider::LEONBETS))->body;?>
</div>