<?php
/* @var $this TomReportController */
/* @var $model TomReport */

$this->breadcrumbs=array(
	'Tom Reports'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>Yii::t('app', 'Submit New Report'), 'url'=>array('tomreport/create')),
	array('label'=>Yii::t('app', 'Edit Report'), 'url'=>array('tomreport/update', 'id'=>$model->id)),
);
?>

<h1><?php echo Yii::t('app', 'Report # {id}', array('{id}'=>$model->id));?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'task_id',
		'name',
		'percent_done',
	),
)); ?>
