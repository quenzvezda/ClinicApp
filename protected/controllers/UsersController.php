<?php

class UsersController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

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
				'users'=>array('admin'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('admin'),
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
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	// public function actionCreate()
	// {
	// 	$model=new Users;

	// 	// Uncomment the following line if AJAX validation is needed
	// 	// $this->performAjaxValidation($model);

	// 	if(isset($_POST['Users']))
	// 	{
	// 		$model->attributes=$_POST['Users'];
	// 		if($model->save())
	// 			$this->redirect(array('view','id'=>$model->user_id));
	// 	}

	// 	$this->render('create',array(
	// 		'model'=>$model,
	// 	));
	// }

	public function actionCreate() {
		$model = new Users;
	
		// Mengambil daftar roles dari authitem
		$roles = CHtml::listData(AuthItem::model()->findAll('type=:type', array(':type'=>2)), 'name', 'name');

		$employees = CHtml::listData(Employees::model()->findAll(), 'employee_id', function($employee) {
			return $employee->employee_name . ' (' . $employee->email . ')';
		});
	
		if (isset($_POST['Users'])) {
			$model->attributes = $_POST['Users'];
	
			// Hash password sebelum menyimpan ke database
			$model->password = CPasswordHelper::hashPassword($model->password);
	
			if ($model->save()) {
				// Jika berhasil menyimpan user, tambahkan role
				$role = $_POST['role'];
				$auth = Yii::app()->authManager;
				$auth->assign($role, $model->user_id);
	
				$this->redirect(array('view', 'id' => $model->user_id));
			}
		}
	
		// Kirim daftar roles ke view
		$this->render('create', array(
			'model' => $model,
			'roles' => $roles,
			'employees' => $employees,
		));
	}
	




	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);
		$employees = CHtml::listData(Employees::model()->findAll(), 'employee_id', function($employee) {
			return $employee->employee_name . ' (' . $employee->email . ')';
		});

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Users']))
		{
			$model->attributes=$_POST['Users'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->user_id));
		}

		$this->render('update',array(
			'model'=>$model,
			'employees' => $employees,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Users');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Users('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Users']))
			$model->attributes=$_GET['Users'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Users the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Users::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Users $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='users-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
