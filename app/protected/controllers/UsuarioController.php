<?php

class UsuarioController extends GxController {#adicionar os filtros, regras e ações REST nos controladores
	/********RESTFUll*********/
	public function filters(){
		return array(
			'accessControl', // perform access control for CRUD operations
			array(
				'RestfullYii.filters.ERestFilter + REST.GET, REST.PUT, REST.POST, REST.DELETE'
			),
		);
	}

	public function actions(){
		return array(
			'REST.'=>'RestfullYii.actions.ERestActionProvider',
		);
	}

	public function accessRules(){
		return array(
			array('allow', 'actions'=>array('REST.GET', 'REST.PUT', 'REST.POST', 'REST.DELETE'),
				'users'=>array('*'),
			),
			array('allow', // deny all users
				'users'=>array('*'),
			),
		);
	}
/********RESTFUll*********/


	public function actionView($id) {
		$this->render('view', array(
			'model' => $this->loadModel($id, 'Usuario'),
		));
	}

	public function actionCreate() {
		$model = new Usuario;


		if (isset($_POST['Usuario'])) {
			$model->setAttributes($_POST['Usuario']);

			if ($model->save()) {
				if (Yii::app()->getRequest()->getIsAjaxRequest())
					Yii::app()->end();
				else
					$this->redirect(array('view', 'id' => $model->idusuario));
			}
		}

		$this->render('create', array( 'model' => $model));
	}

	public function actionUpdate($id) {
		$model = $this->loadModel($id, 'Usuario');


		if (isset($_POST['Usuario'])) {
			$model->setAttributes($_POST['Usuario']);

			if ($model->save()) {
				$this->redirect(array('view', 'id' => $model->idusuario));
			}
		}

		$this->render('update', array(
				'model' => $model,
				));
	}

	public function actionDelete($id) {
		if (Yii::app()->getRequest()->getIsPostRequest()) {
			$this->loadModel($id, 'Usuario')->delete();

			if (!Yii::app()->getRequest()->getIsAjaxRequest())
				$this->redirect(array('admin'));
		} else
			throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
	}

	public function actionIndex() {
		$dataProvider = new CActiveDataProvider('Usuario');
		$this->render('index', array(
			'dataProvider' => $dataProvider,
		));
	}

	public function actionAdmin() {
		$model = new Usuario('search');
		$model->unsetAttributes();

		if (isset($_GET['Usuario']))
			$model->setAttributes($_GET['Usuario']);

		$this->render('admin', array(
			'model' => $model,
		));
	}

}
