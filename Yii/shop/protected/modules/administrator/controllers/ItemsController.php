<?php

class ItemsController extends Controller
{
	public function actionIndex()
	{
		$this->render('index');
	}

    public function filters()
    {
        return array(
            'accessControl', // perform access control for CRUD operations
        );
    }

    public function accessRules()
    {
        return array(
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions'=>array('manage'),
                'users'=>array('admin'),
            ),
            array('deny',  // deny all users
                'users'=>array('*'),
            ),
        );
    }

    public function actionManage() {
        $item = new Item();
        $itemList = $item->findAll();

        $form = new ItemForm();

        $category = new Category();
        $categoryList =  $category->findAll();

        $post = Yii::app()->request->getPost('ItemForm');
        if (isset($post)) {
            $form->attributes = $post;
            if($form->validate()) {
                $form->save();
            }
        }

        $this->render('manage', array('itemList'=>$itemList, 'form'=>$form, 'categoryList'=>$categoryList));
    }
}