<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm */

$this->pageTitle = Yii::app()->name . ' - Shop';
$this->breadcrumbs = array(
    'Shop',
);
?>

    <h1>Shop</h1>

<?php

if (isset($itemList)) {
    foreach ($itemList as $item) {
        echo '<b>' . CHtml::label($item->name, false) . '</b><br>';
        echo CHtml::label($item->price, false) . '<br>';

        if (!Yii::app()->user->isGuest) {
            echo '<div class="form">';
            echo CHtml::beginForm();
            echo CHtml::activeHiddenField($purchase, 'itemId', array('value' => $item->id));
            echo '<div class="row submit">';
            echo CHtml::submitButton('Добавить в корзину');
            echo '</div>';
            echo CHtml::endForm();
            echo '</div>';
        }
    }
}
?>