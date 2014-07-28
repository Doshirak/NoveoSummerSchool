<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm */

$this->pageTitle = Yii::app()->name . ' - Cart';
$this->breadcrumbs = array(
    'Cart',
);
?>

    <h1>Your cart</h1>

<?php
if(isset($itemList)) {
    foreach ($itemList as $item) {
        echo '<b>' . CHtml::label($item->name, false) . '</b><br>';
        echo CHtml::label($item->price, false) . '<br><br>';
    }
}
?>