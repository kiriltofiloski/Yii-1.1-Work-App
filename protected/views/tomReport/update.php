<?php
/* @var $this TomReportController */
/* @var $model TomReport */

$this->breadcrumbs=array(
	'Tom Reports'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);
$this->menu=array(
	array('label'=> Yii::t('app', 'Submit New Report'), 'url'=>array('tomreport/create')),
	array('label'=>Yii::t('app', 'View All Reports'), 'url'=>array('tomreport/index')),
);
?>

<h1><?php echo Yii::t('app', 'Update Report # {id}', array('{id}'=>$model->id));?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>