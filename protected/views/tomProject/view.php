<?php
/* @var $this TomProjectController */
/* @var $model TomProject */

$this->breadcrumbs=array(
	'Tom Projects'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=> Yii::t('app', 'Submit New Report'), 'url'=>array('tomreport/create')),
	array('label'=>Yii::t('app', 'View All Reports'), 'url'=>array('tomreport/index')),
);
?>

<h1><?php echo Yii::t('app', 'Project # {id}', array('{id}'=>$model->id));?></h1>

<div class="progress">
  <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="<?php echo $percentDone;?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $percentDone;?>%"></div>
</div>
<?php echo Yii::t('app', 'Project {id} is {percentDone} % complete.', array('{percentDone}'=>$percentDone, '{id}'=>$model->id));?>
<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
	),
)); ?>
