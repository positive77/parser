<div class="view">
	<b><?php echo CHtml::encode($data->getAttributeLabel('alias')); ?>:</b>
	<?php echo CHtml::encode($data->alias); ?>
        <?php echo CHtml::image('/images/delete.png','Удалить псевдоним',
                array('onclick'=>'daleteAlias('.$data->id.');',
                      'style'=>'cursor:pointer;'));?>
</div>

