<?php
use ijackua\sharelinks\ShareLinks;
use yii\helpers\Html;
use kartik\icons\Icon;

/* @var $this yii\web\View */

// FontAwesome icons
Icon::map($this, Icon::FA);
?>

<div class="socialShareBlock">
    <?= Html::a(Icon::show('facebook'),
        $this->context->shareUrl(ShareLinks::SOCIAL_FACEBOOK),
        [
            'title' => Yii::t('frontend/catalog', 'Share on Facebook'),
            'class' => 'btn btn-xs btn-default',
        ]
    ) ?>
    <?= Html::a(Icon::show('twitter'),
        $this->context->shareUrl(ShareLinks::SOCIAL_TWITTER),
        [
            'title' => Yii::t('frontend/catalog', 'Share on Twitter'),
            'class' => 'btn btn-xs btn-default',
        ]
    ) ?>
    <?= Html::a(Icon::show('google-plus'),
        $this->context->shareUrl(ShareLinks::SOCIAL_GPLUS),
        [
            'title' => Yii::t('frontend/catalog', 'Share on Google Plus'),
            'class' => 'btn btn-xs btn-default',
        ]
    ) ?>
    <?= Html::a(Icon::show('vk'),
        $this->context->shareUrl(ShareLinks::SOCIAL_VKONTAKTE),
        [
            'title' => Yii::t('frontend/catalog', 'Share on VK'),
            'class' => 'btn btn-xs btn-default',
        ]
    ) ?>
</div>