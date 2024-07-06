<?php

namespace akiraz2\blog\assets;

use yii\web\AssetBundle;

class AppAsset extends AssetBundle
{
    public $sourcePath = '@vendor/akiraz2/yii2-blog/assets/default';
    public $baseUrl = '@web';
    public $css = [
        'css/blog-style.css',
    ];
    public $js = [
    ];
    public $depends = [
        'yii\bootstrap\BootstrapAsset',
        '\rmrevin\yii\fontawesome\AssetBundle'
    ];
}
