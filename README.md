Yii2Shop
===================================

Yii2Shop is a e-commerce showcase CMS built on Yii2 Advanced Application Template. It includes some features from big
e-commerce CMS like OpenCart

### This is an alpha build! Not recommended to use in production

You can help me by installing and testing this project and create issues for bugs

FEATURES
--------

Because it's only e-commerce showcase - only several features available:
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

Login: `admin`

Password: `admin`

Please don't clear shop content ^)


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

### Install via Git and Composer

Run in the command line:

`git clone https://github.com/CyanoFresh/yii2shop.git YOURDIRECTORY`

Then run:

`composer install`

Then follow the instructions given in "GETTING STARTED".


GETTING STARTED
---------------

After you install the application, you have to conduct the following steps to initialize
the installed application. You only need to do these once for all.

1. Run command `init` to initialize the application with a specific environment.
2. Create a new database and adjust the `components['db']` configuration in `common/config/main-local.php` accordingly.
3. Apply migrations with console command `yii migrate`. This will create tables needed for the application to work.
4. Configure your application by editing config files: 
⋅⋅* `common/config/main-local.php`
⋅⋅* `backend/config/main-local.php`
⋅⋅* `frontend/config/main-local.php`
If there are not needed options in the `*main-local.php` files you can copy them from `*main.php` and overwrite in the
`*main-local.php`
5. Set document roots of your Web server:

- for frontend `/path/to/yii2shop/frontend/web/` and using the URL `http://yii2shop.com/`
- for backend `/path/to/yii2shop/backend/web/` and using the URL `http://admin.yii2shop.com/`

To login into the application, you need to use:

Username: `admin` <br> 
Password: `admin`

You can change it at the `backend/config/params.php` (`users` array)
