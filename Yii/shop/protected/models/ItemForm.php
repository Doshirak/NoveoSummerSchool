<?php

/**
 * LoginForm class.
 * LoginForm is the data structure for keeping
 * user login form data. It is used by the 'login' action of 'SiteController'.
 */
class ItemForm extends CFormModel
{
    public $id;
    public $name;
    public $price;

    /**
     * Declares the validation rules.
     * The rules state that username and password are required,
     * and password needs to be authenticated.
     */
    public function rules()
    {
        return array(
            array('id, name, price', 'required'),
        );
    }

    public function save() {
        $item = new Item();
        $item = $item->findByPk($this->id);
        $item->name = $this->name;
        $item->price = $this->price;
        $item->save();
    }
}
