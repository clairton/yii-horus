<?php

class MensagemController extends GxController {


	public function actionView($id) {
		$this->render('view', array(
			'model' => $this->loadModel($id, 'Mensagem'),
		));
	}

	public function actionCreate() {
		$model = new Mensagem;


		if (isset($_POST['Mensagem'])) {
			$model->setAttributes($_POST['Mensagem']);

			if ($model->save()) {
				if (Yii::app()->getRequest()->getIsAjaxRequest())
					Yii::app()->end();
				else
					$this->redirect(array('view', 'id' => $model->idmensagem));
			}
		}

		$this->render('create', array( 'model' => $model));
	}

	public function actionUpdate($id) {
		$model = $this->loadModel($id, 'Mensagem');


		if (isset($_POST['Mensagem'])) {
			$model->setAttributes($_POST['Mensagem']);

			if ($model->save()) {
				$this->redirect(array('view', 'id' => $model->idmensagem));
			}
		}

		$this->render('update', array(
				'model' => $model,
				));
	}

	public function actionDelete($id) {
		if (Yii::app()->getRequest()->getIsPostRequest()) {
			$this->loadModel($id, 'Mensagem')->delete();

			if (!Yii::app()->getRequest()->getIsAjaxRequest())
				$this->redirect(array('admin'));
		} else
			throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
	}

	public function actionIndex() {
		$dataProvider = new CActiveDataProvider('Mensagem');
		$this->render('index', array(
			'dataProvider' => $dataProvider,
		));
	}

	public function actionAdmin() {
		$model = new Mensagem('search');
		$model->unsetAttributes();

		if (isset($_GET['Mensagem']))
			$model->setAttributes($_GET['Mensagem']);

		$this->render('admin', array(
			'model' => $model,
		));
	}

}