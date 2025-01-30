# 🚀 Concurrent Laravel - Execute Multiple API Requests in Parallel  

[![Latest Version](https://img.shields.io/packagist/v/aswin/concurrent-laravel.svg)](https://packagist.org/packages/aswin/concurrent-laravel)  
[![Laravel](https://img.shields.io/badge/Laravel-9%2B-blue)](https://laravel.com)  
[![License](https://img.shields.io/github/license/aswinsasi/concurrent-laravel)](LICENSE)  

## 📖 Introduction  
**Concurrent Laravel** is a Laravel package that enables you to execute multiple API requests **concurrently** using Guzzle, significantly reducing response times and improving performance.  

### **🔹 Features**  
✅ **Concurrent API Execution** –
✅ **Supports GET & POST Methods** – Pass request data for POST requests.  
✅ **Handles Large API Requests** – Process 100+ API calls efficiently.  
✅ **Error Handling** – Returns failed responses with error messages.  

---

## 📌 Installation  
Require the package via Composer:  
```bash
composer require aswin/concurrent-laravel
```

Laravel will **automatically register** the service provider and facade.  
If auto-discovery is disabled, manually add the following to `config/app.php`:  

```php
'providers' => [
    Vendor\ConcurrentLaravel\ConcurrentServiceProvider::class,
],

'aliases' => [
    'ConcurrentExecutor' => Vendor\ConcurrentLaravel\Facades\ConcurrentExecutor::class,
],
```

---

## ⚡ Usage Example  
### **Basic Example: Execute Multiple API Calls**  
```php
use ConcurrentExecutor;

$requests = [
    ['method' => 'GET', 'url' => 'https://jsonplaceholder.typicode.com/posts'],
    ['method' => 'GET', 'url' => 'https://jsonplaceholder.typicode.com/users']
];

$responses = ConcurrentExecutor::execute($requests);

print_r($responses);
```

---

## 📡 API Integration Example  
### **Controller Example**
Create a controller to **fetch multiple APIs concurrently**:  
```php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use ConcurrentExecutor;

class ConcurrentApiController extends Controller
{
    public function fetchConcurrentApis()
    {
        $requests = [
            ['method' => 'GET', 'url' => 'https://jsonplaceholder.typicode.com/posts'],
            ['method' => 'GET', 'url' => 'https://jsonplaceholder.typicode.com/users']
        ];

        $responses = ConcurrentExecutor::execute($requests);

        return response()->json($responses);
    }
}
```

### **Define API Route**
```php
Route::get('/fetch-concurrent-apis', [ConcurrentApiController::class, 'fetchConcurrentApis']);
```

Now, making a **GET request** to `/api/fetch-concurrent-apis` will execute API calls **concurrently**.

---

## 🚀 Advanced Usage: Dynamic API Requests  
If you have **multiple dynamic API calls**, you can generate them dynamically:

```php
$apiUrls = [
    'https://jsonplaceholder.typicode.com/posts',
    'https://jsonplaceholder.typicode.com/users',
    'https://jsonplaceholder.typicode.com/comments'
];

$requests = array_map(fn ($url) => ['method' => 'GET', 'url' => $url], $apiUrls);

$responses = ConcurrentExecutor::execute($requests);
```

---

## 🏗 Contributing  
We welcome contributions! Please **submit an issue** for bug reports or **open a pull request**.

---

## 📝 License  
This package is open-source and licensed under the [MIT License](LICENSE).  

---

## 📡 Contact & Support  
- **GitHub Issues**: [https://github.com/aswinsasi/concurrent-laravel/issues](https://github.com/aswinsasi/concurrent-laravel/issues)  
- **Email**: [aswin@example.com](mailto:aswinfear@gmail.com)  

🚀 **Speed up your Laravel API calls with Concurrent Laravel!** 🔥  
```

---

## **📌 Summary of Features in This README**
✅ **Includes description, installation, and usage**  
✅ **Example for API calls (basic & dynamic)**  
✅ **Route definition for API integration**  
✅ **Contribution & license section**  
✅ **GitHub-friendly formatting**  

---

### **🚀 Next Steps**
- **Do you need a `CHANGELOG.md` for version tracking?**  
- **Want to add GitHub Actions for automatic testing?**  

Let me know if you need further modifications! 🚀🔥