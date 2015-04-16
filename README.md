Yii2shop project
===================================

This is a e-commerce showcase CMS built on Yii2 Advanced Application Template. It includes some main features from big
e-commerce CMSs like OpenCart

# Attention! This is an alpha build! Not recommended to use in the production

FEATURES
--------
Because it's only e-commerce showcase only several features available:
* Admin Panel - Backend
* Home page with latest products
* Catalog with sorting and product preview
* Categories support
* SEO-friendly URLs (with slugs like domain.com/category-name/product-name)
* Special statuses for products (example: In stock, Discount, etc.)
* Image gallery in product view
* And a lot of! See demo for more details, maybe I forget something

DEMO
----
[FrontEnd Demo](http://yii2shop.solomaha.me/)
[BackEnd Demo](http://admin.yii2shop.solomaha.me/)
Backend user:
Login: `admin`
Password: `admin`


DIRECTORY STRUCTURE
-------------------

```
common
    config/              contains shared configurations
    mail/                contains view files for e-mails
    models/              contains model classes used in both backend and frontend
console
    config/              contains console configurations
    controllers/         contains console controllers (commands)
    migrations/          contains database migrations
    models/              contains console-specific model classes
    runtime/             contains files generated during runtime
backend
    assets/              contains application assets such as JavaScript and CSS
    config/              contains backend configurations
    controllers/         contains Web controller classes
    models/              contains backend-specific model classes
    runtime/             contains files generated during runtime
    views/               contains view files for the Web application
    web/                 contains the entry script and Web resources
frontend
    assets/              contains application assets such as JavaScript and CSS
    config/              contains frontend configurations
    controllers/         contains Web controller classes
    models/              contains frontend-specific model classes
    runtime/             contains files generated during runtime
    views/               contains view files for the Web application
    web/                 contains the entry script and Web resources
    widgets/             contains frontend widgets
vendor/                  contains dependent 3rd-party packages
environments/            contains environment-based overrides
tests                    contains various tests for the advanced application
    codeception/         contains tests developed with Codeception PHP Testing Framework
```


REQUIREMENTS
------------

The minimum requirement by this application template that your Web server supports PHP 5.4.0.


INSTALLATION
------------

### Install from an Archive File

Extract the archive file downloaded from [github.com](https://github.com/CyanoFresh/yii2shop/archive/master.zip) to
a directory named `yii2shop` that is directly under the Web root.

Then follow the instructions given in "GETTING STARTED".


### Install via Composer

If you do not have [Composer](http://getcomposer.org/), you may install it by following the instructions
at [getcomposer.org](http://getcomposer.org/doc/00-intro.md#installation-nix).

You can then install the application using the following command:

~~~
php composer.phar global require "fxp/composer-asset-plugin:1.0.0"
php composer.phar create-project --prefer-dist --stability=dev cyanofresh/yii2shop yii2shop
~~~


GETTING STARTED
---------------

After you install the application, you have to conduct the following steps to initialize
the installed application. You only need to do these once for all.

1. Run command `init` to initialize the application with a specific environment.
2. Create a new database and adjust the `components['db']` configuration in `common/config/main-local.php` accordingly.
3. Apply migrations with console command `yii migrate`. This will create tables needed for the application to work.
4. Set document roots of your Web server:

- for frontend `/path/to/yii2shop/frontend/web/` and using the URL `http://yii2shop.com/`
- for backend `/path/to/yii2shop/backend/web/` and using the URL `http://admin.yii2shop.com/`

To login into the application, you need to use:

Username: `admin` <br> 
Password: `admin`

You can change it at the `backend/config/params.php` (`users` array)
