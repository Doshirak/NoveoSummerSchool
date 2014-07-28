<?php

class CartController extends Controller
{
    public function actionShow() {
        $purchase = new Purchase();
        $itemList = $purchase->load();
        $this->render('cart', array('purchase'=>$purchase, 'itemList'=>$itemList));
    }
}