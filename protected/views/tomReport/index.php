<?php
/* @var $this TomReportController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Tom Reports',
);
$this->menu=array(
	array('label'=> Yii::t('app', 'Submit New Report'), 'url'=>array('tomreport/create')),
);
?>

<h1><?php echo Yii::t('app', 'Reports');?></h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
