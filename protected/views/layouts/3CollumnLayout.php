<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="language" content="en">

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/3collumn.css">
	<!--boostrap-->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>

<div id="header">
	<h2><?php echo Yii::t('app', 'Work App');?></h2>
</div>

<div class="column-container">
	<div class="column side">
		<h4><?php echo Yii::t('app', 'Menu')?></h4>
		<?php $projects = TomProject::model()->findAll();?>
		<?php $projectArr = array(array('label'=>Yii::t('app', 'View All'), 'url'=>array('/tomproject/index')));?>
		<?php foreach($projects as $project):?>
			<?php array_push($projectArr,array('label'=>$project->name, 'url'=>array('/tomproject/'.$project->id)));?>
		<?php endforeach;?>
		<div id="mainmenu">
			<?php $this->widget('zii.widgets.CMenu',array(
				'items'=>$projectArr,
			)); ?>
		</div>
  	</div>
  
  	<div class="column middle">
    	<?php echo $content;?>
  	</div>
  
  	<div class="column side">
  		<h4><?php echo Yii::t('app', 'Actions');?></h4>
    	<?php
			$this->widget('zii.widgets.CMenu', array(
				'items'=>$this->menu,
			));
		?>
  	</div>
</div>

<div id="footer">
    <p><?php echo Yii::t('app', 'Created by Kiril Tofiloski, May 2022');?></p>
</div>

</body>
</html>