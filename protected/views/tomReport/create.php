<?php
/* @var $this TomReportController */
/* @var $model TomReport */

$this->breadcrumbs=array(
	'Tom Reports'=>array('index'),
	'Create',
);
$this->menu=array(
	array('label'=>Yii::t('app', 'View All Reports'), 'url'=>array('tomreport/index')),
);
?>

<h1><?php echo Yii::t('app', 'Create Report');?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>