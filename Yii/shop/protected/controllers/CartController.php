<?php

class CartController extends Controller
{
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
                'actions'=>array('show'),
                'users'=>array('@'),
            ),
            array('deny',  // deny all users
                'users'=>array('*'),
            ),
        );
    }

    public function actionShow() {
        $purchase = new Purchase();
        $itemList = $purchase->load();
        $this->render('cart', array('purchase'=>$purchase, 'itemList'=>$itemList));
    }
}