<?php

class TomProjectController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/3CollumnLayout';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
			'percentDone'=>$this->getCompletedPercent($id),
		));
	}


	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('TomProject');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
			'percentDone'=>$this->getCompletedPercent(1),
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return TomProject the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=TomProject::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param TomProject $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='tom-project-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

	//Returns completed percentage of given project
	public function getCompletedPercent($project_id)
	{
		$sumOfReportsSQL = "SELECT SUM(tom_report.percent_done) FROM tom_task INNER JOIN tom_report 
							ON tom_task.id=tom_report.task_id AND tom_task.project_id=:project_id GROUP BY tom_task.project_id;";
		$commandReports = Yii::app()->db->createCommand($sumOfReportsSQL);
		$commandReports->bindParam(":project_id", $project_id, PDO::PARAM_INT);
		$sumOfReports=$commandReports->queryScalar();
		$maxReports = TomTask::model()->getMaxPercentForProject($project_id);
		//get actual percentage by dividing combined by maximum posible
		if($maxReports > 0){
			$actual_percentage = ($sumOfReports / $maxReports) * 100;
		}
		else{
			$actual_percentage = 0;
		}
		return $actual_percentage;
	}
}
