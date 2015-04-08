<?php
namespace common\components;

use Yii;
use yii\grid\ActionColumn;
use yii\helpers\Html;

/**
 * ActionButtonColumn is a ActionColumn for the [[GridView]] widget that displays buttons for viewing and manipulating the items.
 * Buttons are appended into btn class
 *
 * To add an ActionButtonColumn to the gridview, add it to the [[GridView::columns|columns]] configuration as follows:
 *
 * ```php
 * 'columns' => [
 *     // ...
 *     [
 *         'class' => ActionButtonColumn::className(),
 *         // you may configure additional properties here
 *     ],
 * ]
 * ```
 *
 * @author Alex Solomaha <cyanofresh@gmail.com>
 */
class ActionButtonColumn extends ActionColumn
{
    protected function initDefaultButtons()
    {
        if (!isset($this->buttons['view'])) {
            $this->buttons['view'] = function ($url, $model, $key) {
                return Html::a('<span class="glyphicon glyphicon-eye-open"></span>', $url, array_merge([
                    'title' => Yii::t('yii', 'View'),
                    'data-pjax' => '0',
                    'class' => 'btn btn-success btn-xs',
                ], $this->buttonOptions));
            };
        }
        if (!isset($this->buttons['update'])) {
            $this->buttons['update'] = function ($url, $model, $key) {
                return Html::a('<span class="glyphicon glyphicon-pencil"></span>', $url, array_merge([
                    'title' => Yii::t('yii', 'Update'),
                    'data-pjax' => '0',
                    'class' => 'btn btn-primary btn-xs',
                ], $this->buttonOptions));
            };
        }
        if (!isset($this->buttons['delete'])) {
            $this->buttons['delete'] = function ($url, $model, $key) {
                return Html::a('<span class="glyphicon glyphicon-trash"></span>', $url, array_merge([
                    'title' => Yii::t('yii', 'Delete'),
                    'class' => 'btn btn-danger btn-xs',
                    'data-confirm' => Yii::t('yii', 'Are you sure you want to delete this item?'),
                    'data-method' => 'post',
                    'data-pjax' => '0',
                ], $this->buttonOptions));
            };
        }
    }
}