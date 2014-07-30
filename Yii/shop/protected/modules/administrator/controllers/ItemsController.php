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
                'users'=>array('administrator'),
            ),
            array('deny',  // deny all users
                'users'=>array('*'),
            ),
        );
    }

    public function actionManage() {
        $item = new Item();
        $itemList = $item->findAll();
        $category = new Category();
        $categoryList =  $category->findAll();

        $this->render('manage', array('itemList'=>$itemList, 'categoryList'=>$categoryList));
    }
}