<?php
/* @var $this LeagueController */
/* @var $model League */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'league-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('style'=>'width:400px;','maxlength'=>255)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'sport_id'); ?>
		<?php echo $form->dropDownList($model,'sport_id',
                        CHtml::listData(Sport::model()->findAll(),'id','name'),array('empty'=>'--Вид спорта--','style'=>'width:406px;',)); ?>
		<?php echo $form->error($model,'sport_id'); ?>
	</div>
        <?php if ($model->isNewRecord){?>
        <div class="row">
                <?php echo CHtml::label('Псевдоним','alias')?>
	        <?php echo CHtml::textField('AliasLeague[alias]',isset($_POST['AliasLeague']['alias'])?$_POST['AliasLeague']['alias']:'',array('style'=>'width:400px;','maxlength'=>255)).'<br>'?>
        </div>
        <?php } ?>        
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Добавить' : 'Сохранить'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
<?php if(!$model->isNewRecord){?>
<?php $criteria = new CDbCriteria;
      $aliasModel = new AliasLeague();
      $criteria->compare('league_id',$model->id);
      $dataProvider = new CActiveDataProvider($aliasModel, array(
			'criteria'=>$criteria,
		));
      ?>
<div class="alias-list">
    <h2>Псевдонимы</h2>
    <div class="add-alias-form">
        <div class="row">
		<?php echo CHtml::textField('alias','',array('style'=>'width:400px;','maxlength'=>255)); ?>	
		<?php echo CHtml::submitButton('Добавить',array('onclick'=>'addAlias($("#alias").val(),'.$model->id.')')); ?>
	</div>
    </div>
        <?php $this->widget('zii.widgets.CListView', array(
                'dataProvider'=>$dataProvider,
                'itemView'=>'alias_league_view',
                'id'=>'list-alias',
                'template'=>'{items}{pager}'
        )); ?>
</div>
<script>
function addAlias(alias,league_id){
    $.ajax({
      method: "POST",
      url: "<?php echo Yii::app()->createUrl('league/createalias');?>",
      data: {'AliasLeague[alias]':alias,'AliasLeague[league_id]':league_id}
    })
      .done(function( msg ) {
         if (msg == ''){
             $("#alias").val('');
                }
         $.fn.yiiListView.update('list-alias');
      })
      .fail(function(){
          alert('Ошибка');
      });
  }
  
  function daleteAlias(id){
    $.ajax({
      method: "GET",
      url: "<?php echo Yii::app()->createUrl('league/deletealias');?>",
      data: {'id':id}
    })
      .done(function( msg ) {
         $.fn.yiiListView.update('list-alias');
      })
      .fail(function(){
          alert('Ошибка');
      });
  }
</script>
<?php }