Sweet Routes for Laravel 
====

Visualise your routes in sweet format with datatables or without.

![Sweet Routes](https://raw.githubusercontent.com/gboquizosanchez/sweet-routes/master/screenshot.png)

# Installation

```bash
composer require gboquizo/sweet-routes
```

If your using autodiscovery in Laravel, it should just work.

Otherwise - add to your `config/app.php` providers array to where all your package providers are (before your app's providers):

```php
Sweet\Routes\ServiceProvider::class,
```

By default the package exposes a `/routes` url. If you wish to configure this, publish the config.

```bash
php artisan vendor:publish --provider="Sweet\Routes\ServiceProvider"
```

If accessing `/routes` isn't working, ensure that you've included the provider within the same area as all your package providers (before all your app's providers) to ensure it takes priority.

By default pretty routes only enables itself when `APP_DEBUG` env is true. You can configure this on the published config as above, or add any custom middlewares.

### Known issues

If you use a version previous to Laravel 6, add this line to config\app.php

```php
'Arr' => Illuminate\Support\Arr::class,
```

