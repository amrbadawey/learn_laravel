## Service Providers

This directory contains the service providers for the application.

### RepositoryServiceProvider

The `RepositoryServiceProvider` is used to bind the repository and service interfaces to their implementations. To enable this service provider, you need to add it to the `providers` array in your `config/app.php` file:

```php
'providers' => [
    // ...
    App\Providers\RepositoryServiceProvider::class,
],
```
