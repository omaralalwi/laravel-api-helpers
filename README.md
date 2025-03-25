<p align="center">
  <h1 align="center">Laravel API Helpers 🚀</h1>
  <p align="center"> Laravel API Helpers is a collection of helper functions designed to streamline API development with Laravel. It enables you to easily detect API versions, validate requests, and access useful request details—all while keeping your code clean and maintainable. ✨</p>

  <p align="center">
    <a href="https://packagist.org/packages/omaralalwi/laravel-api-helpers">
      <img src="https://img.shields.io/packagist/v/omaralalwi/laravel-api-helpers" alt="Latest Version">
    </a>
    <a href="https://php.net">
      <img src="https://img.shields.io/badge/PHP-7.4%2B-blue" alt="PHP Version">
    </a>
    <a href="LICENSE.md">
      <img src="https://img.shields.io/badge/license-MIT-brightgreen" alt="License">
    </a>
  </p>

## 🌟 Features

- **API Version Detection:** Determine the API version from the request URL or headers.
- **API Version Validation:** Check if the current request matches or exceeds a specified API version.
- **API Request Identification:** Identify if a request is targeting the API.
- **Request Helpers:** Retrieve client IP, locale, token, content type, headers, and check for secure requests.
- **Authentication Helpers:** Determine API authentication status and retrieve the authenticated user.

## 📋 Requirements 

- PHP 7.4 or higher
- Laravel 7.x or higher

## 🛠️ Installation 

Install the package via Composer:

```bash
composer require omaralalwi/laravel-api-helpers
```

## 📦  Usage 

The helper functions are globally available throughout your Laravel application. You can call them anywhere—controllers, middleware, or routes or blade files.

---

## 📚 API Helper Functions Guide 

### 🔍 . `get_api_v()` 

Extracts the API version from the current request by inspecting the URL (e.g., `api/v4`) or the `Accept-Version` header.

```php
$apiVersion = get_api_v();
```

---

### ✅ . `is_api_v($version)`

Determines if the current request is for a specific API version by comparing the detected version with the provided one.

```php
// Check if the current API version is 3
if (is_api_v(3)) {
    echo "This is API version 3. ✅";
} else {
    echo "This is not API version 3. ❌";
}
```

---

### ⏫ . `api_v_at_least($version)`
 
Checks whether the current API version is at least a specified minimum version.

```php
// Verify that the API version is at least version 4
if (api_v_at_least(4)) {
    echo "API version is 4 or higher. 🚀";
} else {
    echo "API version is below 4. Please upgrade.";
}
```

---

### 🌐 . `is_api_request()`

Determines whether the current request is an API request by examining the URL, expected JSON responses, and the presence of specific API headers.

```php
if (is_api_request()) {
    echo "This is an API request. 🌐";
} else {
    echo "This is not an API request.";
}
```

---

### 📡 . `get_client_ip()` 

Retrieves the client's IP address from the current request.

```php
$clientIp = get_client_ip();
echo "Client IP: " . ($clientIp ?? "unknown");
```

---

### 🌍 . `get_request_locale()`

Gets the locale from the request's `Accept-Language` header. If not provided, it defaults to the application's locale.

```php
$locale = get_request_locale();
echo "Request locale: {$locale}";
```

---

### 🔑 . `get_request_token()` 

Returns the bearer token from the current request's authorization header.

```php
$token = get_request_token();
echo $token ? "Token: {$token}" : "No token found.";
```

---

### 📝 . `get_request_content_type()`

Retrieves the `Content-Type` header from the current request.

```php
$contentType = get_request_content_type();
echo $contentType ? "Content-Type: {$contentType}" : "No Content-Type provided.";
```

---

### 🔒 . `is_secure_request()` 

Checks whether the current request is made over a secure HTTPS connection.

```php
if (is_secure_request()) {
    echo "Secure HTTPS request detected. 🔒";
} else {
    echo "This is not a secure request.";
}
```

---

### 📋 . `get_request_headers()` 

Returns all headers from the current request as an associative array.

```php
$headers = get_request_headers();
print_r($headers); // Displays all request headers
```

---

### 🔐 . `is_api_authenticated()`
 
Determines whether the API user is authenticated using the `api` guard.

```php
if (is_api_authenticated()) {
    echo "API user is authenticated. 🔐";
} else {
    echo "API user is not authenticated.";
}
```

---

### 👤 . `get_auth_user()`

Retrieves the authenticated user from the default authentication guard.

```php
$user = get_auth_user();
echo $user ? "Authenticated user: {$user->name}" : "No authenticated user.";
```

---

### 👥 . `get_api_user()`

Returns the authenticated user using the `api` guard.

```php
$apiUser = get_api_user();
echo $apiUser ? "API User: {$apiUser->name}" : "No API user authenticated.";
```

---

### Comprehensive Example For All Functions

copy & past following block, then see outputs in log file

```php
$apiHelpers = [
    'API Version'             => get_api_v(),
    'Is API v3?'              => is_api_v(3),
    'API Version At Least 4?' => api_v_at_least(4),
    'Is API Request?'         => is_api_request(),
    'Client IP'               => get_client_ip(),
    'Request Locale'          => get_request_locale(),
    'Request Token'           => get_request_token(),
    'Request Content-Type'    => get_request_content_type(),
    'Is Secure Request?'      => is_secure_request(),
    'Request Headers'         => json_encode(get_request_headers()),
    'Is API Authenticated?'   => is_api_authenticated(),
    'Authenticated User'      => optional(get_auth_user())->name ?? 'No Authenticated User',
    'API Authenticated User'  => optional(get_api_user())->name ?? 'No API User Authenticated',
];

\Log::info('API Helper Functions Test:');

foreach ($apiHelpers as $key => $value) {
    \Log::info("{$key}: " . (is_array($value) ? json_encode($value) : $value));
}
```

---

## Changelog

See [CHANGELOG](CHANGELOG.md) for recent changes.

## Contributors ✨

Thanks to these wonderful people for contributing to this project! 💖

<table>
  <tr>
    <td align="center">
      <a href="https://github.com/omaralalwi">
        <img src="https://avatars.githubusercontent.com/u/25439498?v=4" width="100px;" alt="Omar Al Alwi"/>
        <br />
        <sub><b>Omar Al Alwi</b></sub>
      </a>
      <br />
      🏆 Creator
    </td>
  </tr>
</table>

Want to contribute? Check out the [contributing guidelines](./CONTRIBUTING.md) and submit a pull request! 🚀


## Security

If you discover any security-related issues, please email `omaralwi2010@gmail.com`.

## Credits

- [Omar Alalwi](https://github.com/omaralalwi)

## License

The MIT License (MIT). See [LICENSE](LICENSE.md) for more information.


---

## 📚 Helpful Open Source Packages & Projects

### Packages

- <a href="https://github.com/omaralalwi/lexi-translate"><img src="https://raw.githubusercontent.com/omaralalwi/lexi-translate/master/public/images/lexi-translate-banner.jpg" width="26" height="26" style="border-radius:13px;" alt="lexi translate" /> Lexi Translate </a> simplify managing translations for multilingual Eloquent models with power of morph relationships and caching .

- <a href="https://github.com/omaralalwi/Gpdf"><img src="https://raw.githubusercontent.com/omaralalwi/Gpdf/master/public/images/gpdf-banner-bg.jpg" width="26" height="26" style="border-radius:13px;" alt="Gpdf" /> Gpdf </a> Open Source HTML to PDF converter for PHP & Laravel Applications, supports Arabic content out-of-the-box and other languages.

- <a href="https://github.com/omaralalwi/laravel-taxify"><img src="https://raw.githubusercontent.com/omaralalwi/laravel-taxify/master/public/images/taxify.jpg" width="26" height="26" style="border-radius:13px;" alt="laravel Taxify" /> **laravel Taxify** </a> Laravel Taxify provides a set of helper functions and classes to simplify tax (VAT) calculations within Laravel applications.

- <a href="https://github.com/omaralalwi/laravel-api-helpers"><img src="https://raw.githubusercontent.com/omaralalwi/laravel-api-helpers/master/public/images/laravel-api-helpers.jpg" width="26" height="26" style="border-radius:13px;" alt="laravel Taxify" /> **laravel API Helpers** </a> Laravel API Helpers provides a set of helper of helpful helper functions for API Requests ..

- <a href="https://github.com/omaralalwi/laravel-deployer"><img src="https://raw.githubusercontent.com/omaralalwi/laravel-deployer/master/public/images/deployer.jpg" width="26" height="26" style="border-radius:13px;" alt="laravel Deployer" /> **laravel Deployer** </a> Streamlined Deployment for Laravel and Node.js apps, with Zero-Downtime and various environments and branches.

- <a href="https://github.com/omaralalwi/laravel-trash-cleaner"><img src="https://raw.githubusercontent.com/omaralalwi/laravel-trash-cleaner/master/public/images/laravel-trash-cleaner.jpg" width="26" height="26" style="border-radius:13px;" alt="laravel Trash Cleaner" /> **laravel Trash Cleaner** </a> clean logs and debug files for debugging packages.

- <a href="https://github.com/omaralalwi/laravel-time-craft"><img src="https://raw.githubusercontent.com/omaralalwi/laravel-time-craft/master/public/images/laravel-time-craft.jpg" width="26" height="26" style="border-radius:13px;" alt="laravel Time Craft" /> **laravel Time Craft** </a> simple trait and helper functions that allow you, Effortlessly manage date and time queries in Laravel apps.

- <a href="https://github.com/omaralalwi/php-builders"><img src="https://repository-images.githubusercontent.com/917404875/c5fbf4c9-d41f-44c6-afc6-0d66cf7f4c4f" width="26" height="26" style="border-radius:13px;" alt="PHP builders" /> **PHP builders** </a> sample php traits to add ability to use builder design patterns with easy in PHP applications.

- <a href="https://github.com/omaralalwi/php-py"> <img src="https://avatars.githubusercontent.com/u/25439498?v=4" width="26" height="26" style="border-radius:13px;" alt="PhpPy - PHP Python" /> **PhpPy - PHP Python** </a> Interact with python in PHP applications.

- <a href="https://github.com/omaralalwi/laravel-py"><img src="https://avatars.githubusercontent.com/u/25439498?v=4" width="26" height="26" style="border-radius:13px;" alt="Laravel Py - Laravel Python" /> **Laravel Py - Laravel Python** </a> interact with python in Laravel applications.

- <a href="https://github.com/deepseek-php/deepseek-php-client"><img src="https://avatars.githubusercontent.com/u/193405629?s=200&v=4" width="26" height="26" style="border-radius:13px;" alt="Deepseek PHP client" /> **deepseek PHP client** </a> robust and community-driven PHP client library for seamless integration with the Deepseek API, offering efficient access to advanced AI and data processing capabilities .

- <a href="https://github.com/deepseek-php/deepseek-laravel"><img src="https://github.com/deepseek-php/deepseek-laravel/blob/master/public/images/laravel%20deepseek%20ai%20banner.jpg?raw=true" width="26" height="26" style="border-radius:13px;" alt="deepseek laravel" /> **deepseek laravel** </a> Laravel wrapper for Deepseek PHP client to seamless deepseek AI API integration with Laravel applications.

- <a href="https://github.com/qwen-php/qwen-php-client"><img src="https://avatars.githubusercontent.com/u/197095442?s=200&v=4" width="26" height="26" style="border-radius:13px;" alt="Qwen PHP client" /> **Qwen PHP client** </a> robust and community-driven PHP client library for seamless integration with the Qwen API .

- <a href="https://github.com/qwen-php/qwen-laravel"><img src="https://github.com/qwen-php/qwen-laravel/blob/master/public/images/laravel%20qwen%20ai%20banner.jpg?raw=true" width="26" height="26" style="border-radius:13px;" alt="qwen laravel" /> **Laravel qwen** </a> wrapper for qwen PHP client to seamless Alibaba qwen AI API integration with Laravel applications..

### Dashboards

- <a href="https://github.com/omaralalwi/laravel-startkit"><img src="https://raw.githubusercontent.com/omaralalwi/laravel-startkit/master/public/screenshots/backend-rtl.png" width="26" height="26" style="border-radius:13px;" alt="Laravel Startkit" /> **Laravel Startkit** </a> Laravel Admin Dashboard, Admin Template with Frontend Template, for scalable Laravel projects.

- <a href="https://github.com/kunafaPlus/kunafa-dashboard-vue"><img src="https://github.com/kunafaPlus/kunafa-dashboard-vue/raw/master/public/screenshots/Home-LTR.png" width="26" height="26" style="border-radius:13px;" alt="Kunafa Dashboard Vue" /> **Kunafa Dashboard Vue** </a> A feature-rich Vue.js 3 dashboard template with multi-language support and full RTL/LTR bidirectional layout capabilities.

### References

- <a href="https://github.com/omaralalwi/clean-code-summary"><img src="https://avatars.githubusercontent.com/u/25439498?v=4" width="26" height="26" style="border-radius:13px;" alt="Clean Code Summary" /> **Clean Code Summary** </a> summarize and notes for books and practices about clean code.

- <a href="https://github.com/omaralalwi/solid-principles-summary"><img src="https://avatars.githubusercontent.com/u/25439498?v=4" width="26" height="26" style="border-radius:13px;" alt="SOLID Principles Summary" /> **SOLID Principles Summary** </a> summarize and notes for books about SOLID Principles.