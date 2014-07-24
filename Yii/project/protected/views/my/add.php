<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle=Yii::app()->name . ' - Add Comment';
$this->breadcrumbs=array(	
	'Add Comment',
);
?>

<div class="row">
<?php
// var_dump($array);
foreach ($array as $row) {
	// var_dump($row);
	echo CHtml::label($row->username,false).'<br>'; 
	echo CHtml::label($row->email,false).'<br>';
	echo CHtml::label($row->comment,false).'<br>'.'<br>';
}
?>
</div>

<h1>Add comment</h1>

<div class="form">
<?php echo CHtml::beginForm(); ?>
 
<?php echo CHtml::errorSummary($model); ?>
 
<div class="row">
<?php echo CHtml::activeLabel($model,'comment'); ?>
<?php echo CHtml::activeTextField($model,'comment'); ?>
</div>

<div class="row">
<?php echo CHtml::activeLabel($model,'username'); ?>
<?php echo CHtml::activeTextField($model,'username'); ?>
</div>
 
<div class="row">
<?php echo CHtml::activeLabel($model,'email'); ?>
<?php echo CHtml::activeTextField($model,'email'); ?>
</div>
 
<div class="row submit">
<?php echo CHtml::submitButton('Войти'); ?>
</div>
 
<?php echo CHtml::endForm(); ?>
</div><!-- form -->
