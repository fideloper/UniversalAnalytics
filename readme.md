# Google Universal Analytics - Measurement Protocol

This implements Google's [Measurement Protocol](https://developers.google.com/analytics/devguides/collection/protocol/v1/). This protocol is a REST api which you can use to send data from your client or server side.

This is a server-side implementation, which you might want to use to send analytics to Google that's related to your application - server metrics, exception tracking, etc.

Google developer docs can be found [here](https://developers.google.com/analytics/devguides/collection/protocol/v1/devguide).

## Install

This is available via Packagist. You can install this by adding a dependency in your `composer.json` file.

```json
{
    "require": {
        "fideloper/universalanalytics": "dev-master"
    },
}
```

Then run:

    $ composer install  # or composer update

**Note:** Composer will now [install the dev dependencies by default](http://seld.be/notes/composer-installing-require-dev-by-default). For this project, those are [phpunit](https://github.com/sebastianbergmann/phpunit/) and [mockery](https://github.com/padraic/mockery).

## Basic Usage

Here is some basic usage:

```php
<?php

$ua = new \UniversalAnalytics\UA(array(
    'v' => 1,
    'tid' => 'UX-XXXX-XXX',
    'cid' => 555,
));

$event = new \UniversalAnalytics\Track\Event;
$event->category = 'Video';
$event->action = 'Play';
$event->label = 'Cat Video 42';
$event->value = '0';

$response = $ua->send($event);
```

## Laravel 4

### Binding to your app

You'll likely want to put this into some sort of IoC. How that looks will depend on your application. Here's an example for [Laravel 4](http://laravel.com).

Set up a config file:

```php
// app/config/ga.php

<?php

return array(
    'trackingid' => 'UX-XXXX-XXX',
);
```

Then in your Laravel code, perhaps a `start.php` file:

```php
App::bind('ga', function() {
    return new \UniversalAnalytics\UA(array(
        'v' => 1, // This likely won't change anytime soon
        'tid' => Config::get('ga.trackingid')
    ));
});

// Later, somewhere in your code...

$ga = App::make('ga');

$ga->client(Auth::user()->id); // Pass in some sort of session-based user id

$event = new \UniversalAnalytics\Track\Event;
$event->category = 'Video';
$event->action = 'Play';
$event->label = 'Cat Video 42';
$event->value = '0';

$response = $ua->send($event);
```

### Using the Laravel Facade

MORE STUFF COMING