## Features:

* Blog Post with image banner, **seo** tags, [imperavi redactor 2 widget](https://github.com/yiidoc/yii2-redactor)
* Blog Category (nested) with image banner, seo tags
* Blog Tags
* Blog Comment (can be disabled)
* email in comments are masked (`a*i*a*@bk.ru`)
* all models has Status (_Inactive_, _Active_, _Archive_)
* Inactive comments are truncated (and strip tags)
* also added **semantic** [OpenGraph](http://ogp.me/)
* backendControllers can be **protected** by your CustomAccessControl (roles or rbac)
* frontend and backend are translated (i18n)



# Table of Contents
1. [Installation](#installation)
2. [Configuration](#configuration)
3. [Usage](#usage)



## Installation

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require --prefer-dist akiraz2/yii2-blog "~1.3"
```


to the require section of your `composer.json` file.

> ** Note ** If you got composer Error `it does not match your minimum-stability`, please change your composer settings to `"minimum-stability": "dev",`

## Configuration

By default, all images from Imperavi-widget module are uploaded to dir `@frontend/web/img/blog/upload`.
Be sure, this directory is created manually with proper file permissions (chmod).

Add `'bootstrap' => [\user\blog\Bootstrap::class],` to your config (common/config/main.php)

Config *common* modules in `common/config/main.php`

```php
    'modules' => [
        'blog' => [
            'class' => user\blog\Module::class,
            'urlManager' => 'urlManager',// 'urlManager' by default, or maybe you can use own component urlManagerFrontend
            'imgFilePath' => '@frontend/web/img/blog/',
            'imgFileUrl' => '/img/blog/',
            'userModel' => \common\models\User::class,
            'userPK' => 'id', //default primary key for {{%user}} table
            'userName' => 'username', //uses in view (may be field `username` or `email` or `login`)
        ],
     ],    
```

Config *url rewrite* in `common/config/main.php` (or separately frontend/backend apps)
```php
    'timeZone' => 'Europe/Moscow', //time zone affect the formatter datetime format
    'components' => [
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [               
            ],
        ],
        'formatter' => [ //for the showing of date datetime
            'dateFormat' => 'yyyy-MM-dd',
            'datetimeFormat' => 'yyyy-MM-dd HH:mm:ss',
            'decimalSeparator' => '.',
            'thousandSeparator' => ' ',
            'currencyCode' => 'EUR',
        ],
    ],
```

Config *backend modules* in `backend/config/main.php`

```php
    'modules' => [
        'blog' => [
            'class' => 'user\blog\Module',
            'controllerNamespace' => 'user\blog\controllers\backend',
            //'adminAccessControl' => 'common\components\AdminAccessControl', // null - by default 
        ],
    ],
```

Config *frontend modules* in `frontend/config/main.php`

```php
    //'defaultRoute' => 'blog', //set blog as default route
    'modules' => [
        'blog' => [
            'class' => 'user\blog\Module',
            'controllerNamespace' => 'user\blog\controllers\frontend',
            'blogPostPageCount' => 6,
            'blogCommentPageCount' => 10, //20 by default
            'enableComments' => true, //false by default
            'schemaOrg' => [ // empty array [] by default! 
                'publisher' => [
                    'logo' => '/img/logo.png',
                    'logoWidth' => 191,
                    'logoHeight' => 74,
                    'name' => 'My Company',
                    'phone' => '+1 800 488 80 85',
                    'address' => 'City, street, house'
                ]
            ]
        ],
    ],
```
> **NOTE:** Module Yii2-Blog use model `common\models\User`

### Migration

> **NOTE:** Module uses table `{{%user}}` with PK `id` (You can use [own user model](#user-model) with table and PK) Make sure you have table before applying these migrations.

Migration run after config module

```php
./yii migrate --migrationPath=@user/blog/migrations
```

or full path:

```php
./yii migrate --migrationPath=@vendor/user/yii2-blog/migrations
```


### Access Url
1. backend : http://backend.you-domain.com/blog (Empty view)
   - Category : http://backend.you-domain.com/blog/blog-category (create first category)
   - Post : http://backend.you-domain.com/blog/blog-post
   - Comment : http://backend.you-domain.com/blog/blog-comment
   - Tag : http://backend.you-domain.com/blog/blog-tag
2. frontend : http://you-domain.com/blog
