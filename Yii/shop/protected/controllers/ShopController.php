<?php

class ShopController extends Controller
{
    public function actionBuy() {
        $purchase = new Purchase();
        $item = new Item();
        $itemList = $item->findAll();

        $post = Yii::app()->request->getPost('Purchase');
        if (isset($post)) {
            $purchase->attributes = $post;
            if($purchase->validate()) {
                $purchase->save($purchase->itemId);
            }
        }

        $this->render('shop', array('purchase'=>$purchase, 'itemList'=>$itemList));
    }
}