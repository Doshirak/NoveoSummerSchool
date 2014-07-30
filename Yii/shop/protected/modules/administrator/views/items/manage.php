<?php
/* @var $this DefaultController */

$this->breadcrumbs = array(
    $this->module->id,
);
?>
<?php

if (isset($itemList)) {
    foreach ($itemList as $item) {
        echo '<b>' . CHtml::label($item->name, false) . '</b><br>';
        echo CHtml::label($item->price, false) . '<br>';

        echo '<div class="form">';
        echo CHtml::beginForm();
//        echo CHtml::textField($item,'name');
//        echo CHtml::textField($item,'price');
        echo CHtml::submitButton('Править');
        echo CHtml::endForm();
        echo '</div>';
    }
}
?>