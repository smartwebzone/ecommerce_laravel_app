

## File Tree of Grace Layout

```
GRACE Company
├── app/
│   	├── Composers/*
│   	│   	├── Admin/*
│   	│   	│   	└── MenuComposer.php
│   	│   	├── ArticleComposer.php
│   	│   	├── CartComposer.php
│   	│   	├── MenuComposer.php
│   	│   	├── NewsComposer.php
│   	│   	└── SettingComposer.php
│   	├── Console/*
│   	│   	├── Commands
│   	│   	│   	└── AppCommand.php
│   	│   	└── kernel.php
│   	├── Ecommerce/*
│   	│   	├── Billing/*
│   	│   	├── generators.php
│   	│   	└── helpers.php
│   	├── Events/*
│   	│   	└── Event.php
│   	├── Exceptions/*
│   	│   	├── Validation/*
│   	│   	│   	└── ValidationException.php
│   	│   	└── Handler.php
│   	├── Feeder/*
│   	├── Helper/*
│   	│   	├── generators.php
│   	│   	└── helpers.php
│   	├── Http/*
│   	│   	├── Controllers/*
│	│	│	├── Admin/*
│	│	│	│	├── ArticleController.php
│	│	│	│	├── AuthController.php
│	│	│	│	├── CategoryController.php
│	│	│	│	├── DashboardController.php
│	│	│	│	├── FaqController.php
│	│	│	│	├── FormPostController.php
│	│	│	│	├── LanguageController.php
│	│	│	│	├── MenuController.php
│	│	│	│	├── NewsController.php
│	│	│	│	├── PageController.php
│	│	│	│	├── PhotoGalleryController.php
│	│	│	│	├── ProjectController.php
│	│	│	│	├── RoleController.php
│	│	│	│	├── SettingController.php
│	│	│	│	├── SliderController.php
│	│	│	│	├── UserController.php
│	│	│	│	└── VideoController.php
│	│	│	├── API/*
│	│	│	│	└── DealerAPIController.php
│	│	│	├── AppBaseController.php
│	│	│	├── ArticleController.php
│	│	│	├── CartController.php
│	│	│	├── CategoryController.php
│	│	│	├── Controller.php
│	│	│	├── CouponController.php
│	│	│	├── DealerController.php
│	│	│	├── EcomController.php
│	│	│	├── EcomUserController.php
│	│	│	├── FaqController.php
│	│	│	├── FormPostController.php
│	│	│	├── HomeController.php
│	│	│	├── LanguageController.php
│	│	│	├── LiveSiteController.php
│	│	│	├── LocationController.php
│	│	│	├── MaillistController.php
│	│	│	├── MessageController.php
│	│	│	├── NewsController.php
│	│	│	├── OrderController.php
│	│	│	├── PageController.php
│	│	│	├── PaypalController.php
│	│	│	├── PhotoGalleryController.php
│	│	│	├── ProductCategoryController.php
│	│	│	├── ProductController.php
│	│	│	├── ProjectController.php
│	│	│	├── RssController.php
│	│	│	├── SearchController.php
│	│	│	├── SectionController.php
│	│	│	├── TagController.php
│	│	│	├── UserController.php
│	│	│	└── VideoController.php
│   	│   	├── Middleware/*
│   	│   	├── Requests/*
│   	│   	├── api_routes.php
│   	│   	├── breadcrumbs.php
│   	│   	├── dev_routes.php
│   	│   	├── FlashAlert.php
│   	│   	├── Kernel.php
│   	│   	├── live_custom_routes.php
│   	│   	├── new_routes.php
│   	│   	└── routes.php
│   	├── Interfaces/*
│   	│   	└── ModelInterface.php
│   	├── Jobs/*
│   	├── Listeners/*
│   	├── Models/*
│   	├── Policies/*
│   	├── Providers/*
│   	├── Repositories/*
│   	│   	├── Article/
│   	│   	│   	├──AbstractArticleDecorator.php
│   	│   	│   	├──ArticleInterface.php
│   	│   	│   	├──ArticleRepository.php
│   	│   	│   	└── CacheDecorator.php
│   	│   	├── Category/
│   	│   	│   	├──AbstractCategoryDecorator.php
│   	│   	│   	├──CategoryInterface.php
│   	│   	│   	├──CategoryRepository.php
│   	│   	│   	└── CacheDecorator.php
│   	│   	├── Faq/
│   	│   	│   	├──AbstractFaqDecorator.php
│   	│   	│   	├──FaqInterface.php
│   	│   	│   	├──FaqRepository.php
│   	│   	│   	└── CacheDecorator.php
│   	│   	├── Menu/
│   	│   	│   	├──AbstractMenuDecorator.php
│   	│   	│   	├──MenuInterface.php
│   	│   	│   	├──MenuRepository.php
│   	│   	│   	└── CacheDecorator.php
│   	│   	├── News/
│   	│   	│   	├──AbstractNewsDecorator.php
│   	│   	│   	├──NewsInterface.php
│   	│   	│   	├──NewsRepository.php
│   	│   	│   	└── CacheDecorator.php
│   	│   	├── Page/
│   	│   	│   	├──AbstractPageDecorator.php
│   	│   	│   	├──PageInterface.php
│   	│   	│   	├──PageRepository.php
│   	│   	│   	└── CacheDecorator.php
│   	│   	├── PhotoGallery/
│   	│   	│   	├──AbstractPhotoGalleryDecorator.php
│   	│   	│   	├──PhotoGalleryInterface.php
│   	│   	│   	├──PhotoGalleryRepository.php
│   	│   	│   	└── CacheDecorator.php
│   	│   	├── Project/
│   	│   	│   	├──AbstractProjectDecorator.php
│   	│   	│   	├──ProjectInterface.php
│   	│   	│   	├──ProjectRepository.php
│   	│   	│   	└── CacheDecorator.php
│   	│   	├── Setting/
│   	│   	│   	├──AbstractSettingDecorator.php
│   	│   	│   	├──SettingInterface.php
│   	│   	│   	├──SettingRepository.php
│   	│   	│   	└── CacheDecorator.php
│   	│   	├── Slider/
│   	│   	│   	├──AbstractSliderDecorator.php
│   	│   	│   	├──SliderInterface.php
│   	│   	│   	├──SliderRepository.php
│   	│   	│   	└── CacheDecorator.php
│   	│   	├── Tag/
│   	│   	│   	├──AbstractTagDecorator.php
│   	│   	│   	├──TagInterface.php
│   	│   	│   	├──TagRepository.php
│   	│   	│   	└── CacheDecorator.php
│   	│   	├── AbstractValidator.php*
│   	│   	├── BaseRepository.php*
│   	│   	├── CrudableInterface.php*
│   	│   	├── DealerRepository.php*
│   	│   	├── LocationRepository.php*
│   	│   	├── RepositoryAbstract.php*
│   	│   	└── RepositoryInterface.php*
│   	├── search/*
│   	└── Services/*
├── bootstrap/*
├── config/*
├── database/*
│   	├── factories/*
│   	├── migrations/*
│   	└── seeds/*
├── public/*
├── resources/*
│   	├── assets/*
│   	├── lang/*
│   	└── views/*
├── screenshots/*
├── storage/*
├── tests/*
├── vendor/*
├── README.md
├── server.php
├── .bowerrc
├── .editorconfig
├── .env
├── .env.example
├── .gitattributes
├── .gitignore
├── artisan
├── gulpfile.js
├── package.json
└── composer.json
```