<?php

class MyModel extends CFormModel {

	public $username;
	public $email;
	public $comment;

	public function rules()
	{
		return array(
			array('comment, username, email', 'required'),
			array('array', 'safe')
		);
	}

	public function save() {
		$array = Yii::app()->session->get('array');
		if (!isset($array)) {
			Yii::app()->session->add('array', array($this));
			$array = Yii::app()->session->get('array');
			// var_dump($array);
		}

		array_push($array, $this);
		// array_push($array[1], $this->email);
		// array_push($array[2], $this->comment);

		Yii::app()->session->add('array', $array);
	}

	public function load() {

		// $array = Yii::app()->session->get('array');

		$models = Yii::app()->session->get('array');

		// $usernames = $array[0];
		// $emails = $array[1];
		// $comments = $array[2];

		// for($i = 0;$i < count($array);++$i) {
		// 	$models[$i] = new MyModel();
		// 	$models[$i]->username = $usernames[$i];
		// 	$models[$i]->email = $emails[$i];
		// 	$models[$i]->comment = $comments[$i];
		// }

		return $models;
	}
}