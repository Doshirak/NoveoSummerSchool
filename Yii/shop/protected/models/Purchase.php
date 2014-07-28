<?php

class Purchase extends CFormModel
{
    public $itemId;

    public function rules()
    {
        return array(
            array('itemId', 'required'),
        );
    }

    public function save($id) {

        $key = 'itemList';
        $itemList = Yii::app()->session->get($key);
        if (!isset($itemList)) {
            Yii::app()->session->add($key, array());
            $itemList = Yii::app()->session->get($key);
        }

        array_push($itemList, $id);

        Yii::app()->session->add($key, $itemList);
    }

    public function load() {

        $key = 'itemList';
        $itemList = Yii::app()->session->get($key);
        if (!isset($itemList)) {
            return null;
        }

        $result = array();
        $items = new Item();
        foreach($itemList as $id) {
            $item = $items->findByPk($id);
            array_push($result, $item);
        }

        return $result;
    }
}
