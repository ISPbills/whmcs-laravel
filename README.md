Laravel WHMCS
======

An interface for interaction with the WHMCS API in Laravel.

## Installation

Install the package through [Composer](http://getcomposer.org/). Run the Composer require command from the Terminal:

```bash
composer require i4e/laravel-whmcs
```

Package will be installed automaticlly through composer package discovery. If not, then you need to register 
the `i4e\Whmcs\WhmcsService` service provider in your config/app.php.

Optionally, you can add the alias if you prefer to use the Facade

```php
'Whmcs' => i4e\Whmcs\Facades\Whmcs::class
```

## Configuration

To get started, you'll need to publish all vendor assets.

```bash
php artisan vendor:publish --provider=i4e\Whmcs\WhmcsServiceProvider
```

Then open `config\whmcs.php` to fill your WHMCS api credentials in

Now you can use the WHMCS API in your Laravel project.

### Lumen

Copy the config file from the package to your projects config directory:

```bash
cp vendor/i4e/laravel-whmcs/config/whmcs.php config/whmcs.php
```

Then open `config\whmcs.php` to fill your WHMCS api credentials in.

To finish this, register the config file and the service provider in `bootstrap/app.php`:

```php
$app->configure('whmcs');
$app->register(i4e\Whmcs\WhmcsServiceProvider::class);
```

Now you can use the WHMCS API in your Lumen project.

## Basic Usage

You can call your WHMCS API directly by calling the `\WHMCS::{WHMCSAPIFUNCTION}` facade.

If you prefer dependency injection, you can inject the manager like this:

```php
use i4e\Whmcs\WhmcsManager;

class WhmcsController extends Controller
{
    private $whmcsManager;

    public function __construct(WhmcsManager $whmcsManager)
    {
        $this->whmcsManager = $whmcsManager;
    }

    public function index()
    {
        $this->whmcsManager->execute('GetInvoice', ['invoiceid' => '1337']);
    }
}
```
**Hint**: The execute command will also support your self-created WHMCS api commands.


### Examples

Obtain a list of client purchased products:

```php
\Whmcs::GetClientsProducts([
    'clientid' => '12345'
]);
```

Retrieve a specific invoice:

```php
\Whmcs::GetInvoice([
    'invoiceid' => '1337'
]);
```

