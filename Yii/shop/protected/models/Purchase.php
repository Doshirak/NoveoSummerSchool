<?php

class Purchase extends CFormModel
{
    public $username;
    public $itemId;

    public function rules()
    {
        return array(
            array('username, itemId', 'required'),
        );
    }

    public function save($id) {

        $key = 'array'.$this->username;
        $array = Yii::app()->session->get($key);
        if (!isset($array)) {
            Yii::app()->session->add($key, array());
            $array = Yii::app()->session->get($key);
        }

        array_push($array, $id);

        Yii::app()->session->add($key, $array);
    }

    public function load() {

        $key = 'array'.$this->username;
        $array = Yii::app()->session->get($key);
        if (!isset($array)) {
            return null;
        }

        $result = array();
        $items = new Item();
        foreach($array as $id) {
            $item = $items->findByPk($id);
            array_push($result, $item);
        }

        return $result;
    }
}
