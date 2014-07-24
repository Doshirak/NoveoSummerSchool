<?php

class MyController extends Controller {

	public function actionShowComments() {
		
		$model = new MyModel();	
		$this->render('show', array('model' => $model));
	} 

	public function actionAddComment() {

		$model = new MyModel();
		$post = Yii::app()->request->getPost('MyModel');

		if (isset($post)) {
			$model->attributes = $post;	
			if($model->validate()) {
				$model->save();
			}
		}

		$this->render('add', array('model' => $model, 'array' => $model->load()));
	} 
}