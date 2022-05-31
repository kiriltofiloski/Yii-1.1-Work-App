<?php
/* @var $this TomProjectController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Tom Projects',
);
$this->menu=array(
	array('label'=> Yii::t('app', 'Submit New Report'), 'url'=>array('tomreport/create')),
	array('label'=>Yii::t('app', 'View All Reports'), 'url'=>array('tomreport/index')),
);
?>

<h1>Projects</h1>

<div class="progress">
  <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="<?php echo $percentDone;?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $percentDone;?>%"></div>
</div>

<?php echo Yii::t('app', 'Project 1 is {percentDone} % complete.', array('{percentDone}'=>$percentDone));?>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
