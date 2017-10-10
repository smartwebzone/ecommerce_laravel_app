Grace Manager & CMS
=============

### Laravel 5.1 Content Managment System

## not stable!

![productmanager](https://cloud.githubusercontent.com/assets/12836331/19670638/2ea59aca-9a26-11e6-9cfd-49828c1ba079.png)

## Features

* Laravel 5.1
  * Bootstrap
  * Authentication Sentinel
  * Bootstrap Code Prettify
  * Full Tranlation Implementation
  * File Manager
  * Dropzone.js
  * Backend
  * Manage menu (nested)
  * Manage article (category, tag)
  * Manage tag
  * Manage article category
  * Manage page
  * Manage news
  * Careers
  * FAQs
    * interactive forms
  * Chat Comming Soon
  * Users
    * Roles
    * permissions
    * account management
  * Warehouse
    * manager
    * storage
    * products
    * identifiers
    * quantity
  * eCommerce shop coupons best_sellers etc
    * HR manager
    * Product Manager
    * Combo Product Manager
      * dealer manager
  * locations
  * Google analytics
  * schema Implementation
    * microdata
    * json-ltd
  * Standard SEO Implementation
  * Google tag manager Implementation
  * Manage photo gallery
  * SummerTime Editor for post creation and editing (filemanager)
  * Form post manage
  * Site settings
  * Log view page
* Frontend
  * Blog
  * Page
  * News
  * Contact Form
  * Tutorials
  * FAQs
  * Community
  * Social Networks
  * Shop
  * Chat Comming Soon
  * Photo Gallery (Lazy load image, responsive fancybox)
  * Breadcrumbs


## Screenshots

![managerlogin](https://cloud.githubusercontent.com/assets/12836331/19670641/2ea71ef4-9a26-11e6-891c-a987afd5a7e7.png)
![graceadmin](https://cloud.githubusercontent.com/assets/12836331/19670639/2ea59200-9a26-11e6-939d-70ddebe543b4.png)
![blogmanager](https://cloud.githubusercontent.com/assets/12836331/19670642/2ea9cef6-9a26-11e6-9af5-dd1117f39423.png)
![productmanager](https://cloud.githubusercontent.com/assets/12836331/19670638/2ea59aca-9a26-11e6-9cfd-49828c1ba079.png)
![developerlogviewer](https://cloud.githubusercontent.com/assets/12836331/19670637/2ea520fe-9a26-11e6-8ee6-2f26e4f9fa95.png)
![developer-tool-route-reference-by-phillip-madsen](https://cloud.githubusercontent.com/assets/12836331/19670640/2ea5d044-9a26-11e6-8ab7-1ea5371f19bc.png)

## Layout Overview TreeView

  [GitHub]/gracecompany/develop/GraceWebsiteTreeLayout.md

## Task List
- [] Finish Cart and Checkout
- [] Add These Pages
  - [] Qni 21"
  - [] Qni Features
  - [] Luminescent

## Requirements

- php 7.0
- git
  - git-lfs


## Installation
1. git clone https://github.com/gracecompany/develop
2. Add the following packages to your composer.json if they are not already there.

    ```json
        "require": {
            "php": ">=5.5.9",
            "laravel/framework": "5.1.*",
            "laravelcollective/html": "5.1.*",
            "cartalyst/sentinel": "2.0.*",
            "mcamara/laravel-localization": "1.0.*",
            "davejamesmiller/laravel-breadcrumbs": "3.0.*",
            "sseffa/video-api": "2.0.*",
            "laracasts/flash": "^1.3",
            "rap2hpoutre/laravel-log-viewer": "^0.5.3",
            "cviebrock/eloquent-sluggable": "^3.1",
            "intervention/image": "^2.3",
            "caffeinated/menus": "^2.3",
            "doctrine/dbal": "^2.5",
            "webpatser/laravel-uuid": "^2.0",
            "stripe/stripe-php": "3.*",
            "sentry/sentry-laravel": "^0.3.0",
            "barryvdh/reflection-docblock": "^2.0",
            "milon/barcode": "^5.2",
            "paypal/rest-api-sdk-php": "*",
            "roumen/sitemap": "^2.6",
            "prettus/l5-repository": "^2.6",
            "jlapp/swaggervel": "dev-master",
            "beaudierman/ups": "^1.1"
     }
```


3. Update your packages

    ```bash
    composer update
    ````
4. Add the service providers to the providers array in `{root}\config\app.php`

    ```php

       /*
        |--------------------------------------------------------------------------
        | phillips custom Service Providers
        |--------------------------------------------------------------------------*/

        App\Providers\RepositoryServiceProvider::class,
        App\Providers\ComposerServiceProvider::class,
        App\Providers\FeederServiceProvider::class,
        App\Providers\SearchServiceProvider::class,

        /*
        |--------------------------------------------------------------------------
        | phillips custom services
        |--------------------------------------------------------------------------*/

        Cartalyst\Sentinel\Laravel\SentinelServiceProvider::class,
        Intervention\Image\ImageServiceProvider::class,
        Mcamara\LaravelLocalization\LaravelLocalizationServiceProvider::class,
        Barryvdh\Debugbar\ServiceProvider::class,
        Cviebrock\EloquentSluggable\SluggableServiceProvider::class,
        DaveJamesMiller\Breadcrumbs\ServiceProvider::class,
        Laracasts\Flash\FlashServiceProvider::class,
        Rap2hpoutre\LaravelLogViewer\LaravelLogViewerServiceProvider::class,
        Sseffa\VideoApi\VideoApiServiceProvider::class,
        Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider::class,
        Caffeinated\Menus\MenusServiceProvider::class,
        Beaudierman\Ups\UpsServiceProvider::class,

    ```
5. Add the following aliases in `{root}\config\app.php`

    ```php
        'HTML'                => Collective\Html\HtmlFacade::class,
        'Html'                => Collective\Html\HtmlFacade::class,
        'Activation'          => Cartalyst\Sentinel\Laravel\Facades\Activation::class,
        'Reminder'            => Cartalyst\Sentinel\Laravel\Facades\Reminder::class,
        'Sentinel'            => Cartalyst\Sentinel\Laravel\Facades\Sentinel::class,
        'Image'               => Intervention\Image\Facades\Image::class,
        'LaravelLocalization' => Mcamara\LaravelLocalization\Facades\LaravelLocalization::class,
        'Debugbar'            => Barryvdh\Debugbar\Facade::class,
        'Breadcrumbs'         => DaveJamesMiller\Breadcrumbs\Facade::class,
        'Flash'               => Laracasts\Flash\Flash::class,
        'VideoApi'            => Sseffa\VideoApi\Facades\VideoApi::class,
        'Feeder'              => App\Feeder\Facade\Feeder::class,
        'Search'              => App\Search\Facade\Search::class,
        'Str'                 => Illuminate\Support\Str::class,
        'Ups'                 => Beaudierman\Ups\Facades\Ups::class,
        'Menu'                => Caffeinated\Menus\Facades\Menu::class,
        'Uuid'                => Webpatser\Uuid\Uuid::class,
    ```

## Contributing
Just let me know your ideas and let's work together

### Coding style
It would be great if we follow the PSR-2 coding standard and the PSR-4 autoloading standard.

### License
This package is licensed under the [MIT license](http://opensource.org/licenses/MIT)
