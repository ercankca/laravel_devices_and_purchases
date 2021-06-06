<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

# Getting Started

`git clone https://github.com/ercankca/laravel_devices_and_purchases.git`

# mobile devices in-app-purchase

# Installation

 `composer install` 
 
  `php artisan migrate` 
  
  `php artisan migrate --seed` 
 
`php artisan key:generate`

# Routing 

<table>
<thead>
<tr>
<th>Provider</th>
<th>URI</th>
<th>Name</th>
</tr>
</thead>
<tbody>
<tr>
<td>Google Play</td>
<td><code>/purchases/subscriptions/google</code></td>
<td><code>purchase.serverNotifications.google</code></td>
</tr>
<tr>
<td>App Store</td>
<td><code>/purchases/subscriptions/apple</code></td>
<td><code>purchase.serverNotifications.apple</code></td>
</tr>
</tbody>
</table>
# Running the tests

`vendor/bin/phpunit`

now your project is ready to serve:

`php artisan serve`

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
