Yii2Shop
===================================

This is e-commerce application built on Yii2. It is not full e-commerce - it is showcase

This project has been temporary stopped. For actual code see [app built on this shop](https://github.com/CyanoFresh/solomashka)
===================================

FEATURES
--------

Because it's only e-commerce showcase - only several features available:
* Admin Panel - Backend
* Home page with latest products
* Catalog with sorting and product preview
* Categories support
* SEO-friendly URLs (with slugs like domain.com/categoryname/productname)
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

Run in the command line:

`git clone https://github.com/CyanoFresh/yii2shop.git yii2shop`

Go to the application dir and run:

`php requirements.php`

to check application requirements and run:

`composer install`

to install dependencies.

After you install the application, you have to conduct the following steps to initialize
the installed application. You only need to do these once for all.

1. Run command `php init` to initialize the application with a specific environment.
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
