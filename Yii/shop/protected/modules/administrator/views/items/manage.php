<?php
/* @var $this DefaultController */

$this->breadcrumbs = array(
    $this->module->id,
);
?>
<?php

if (isset($itemList)) {
    foreach ($itemList as $item) {
        echo '<div class="form edit">';
        echo '<b>' . CHtml::label($item->name, false);
        echo CHtml::label($item->price, false);
        echo CHtml::beginForm();
        echo CHtml::activeHiddenField($form,'id', array('value' => $item->id));
        echo '<div class="row">';
        echo '<b>' . CHtml::label('Title', false);
        echo CHtml::activeTextField($form,'name');
        echo '</div>';
        echo '<div class="row">';
        echo '<b>' . CHtml::label('Price', false);
        echo CHtml::activeTextField($form,'price');
        echo '</div>';
        echo '<div class="row">';
        echo CHtml::submitButton('Править');
        echo '</div>';
        echo CHtml::endForm();
        echo '</div>';
    }
}
?>