# xhodos PHP  Web Framework by [Xcella-ng](https://github.com/Xcella-ng) 😁

Xhodos is a lightweight and expressive PHP framework designed for simplicity, speed, and extensibility. Inspired by Laravel's elegance and Blade's templating power, it enables rapid development with clean syntax and minimal overhead.

<br>

## 🚀 Features

🔧 Custom Templating Engine (with @if, @foreach, @include, @extends, @section, @csrf); featuring adding custom directives.

⚡ Compile-time View Caching

📦 Composer-based Autoloading

🛡️ CSRF Protection Helpers

🧩 Directive System for Extending Templating Logic

🧰 CLI Tool for Routing, Serving, and Compilation
<br>
<br>

## 📁 Project Structure

```
project-root/
├── app/
│   ├── Controllers/           # Application Controllers
│   └── Models/                # Eloquent-like Models
├── config/
│   ├── app.php
│   └── auth.php
├── public/
│   └── index.php              # Entry point
├── routes/
│   └── web.php                # Route definitions
├── system/
│   └── framework/
│       ├── cache/views/       # Cached compiled templates
│       └── logs/errors.log    # Error logging
├── views/                     # View files (*.xs.php)
├── .env                       # Environment configuration
├── composer.json
└── stack                      # CLI tool
```
<br>
<br>

## ⚙️ Installation

###### # Clone the repo
`$ git clone https://github.com/xhodos/xhodos.git`

###### # Navigate
`$ cd xhodos`

###### # Install dependencies
`$ composer install`

<br>

⚠️ Note: The CLI tool requires a working installation of PHP (v8.0 or higher). Use `php stack` to run commands.

### 📦 Usage

###### Run Dev Server

`php stack serve --host 127.0.0.1 --port 8000`

###### Compile Views

`php stack compile`

###### Clear View Cache

`php stack clear`

###### 🖌️ Writing Views
```
{{-- index.xs.php --}}
@extends("layouts.master")

@section("content")
    <h1>Welcome, {{ $user->name }}</h1>
    @if($user->isAdmin())
        <p>You have admin access</p>
    @endif
@endsection

{{-- Layout.xs.php --}}
<!DOCTYPE html>
<html>
<head><title>@yield("title")</title></head>
<body>
    @yield("content")
</body>
</html>
```
<br>
<br>

🛡️ CSRF Protection

The `@csrf` directive genrates `<input type="hidden" name="_token" value="<?= csrf_token() ?>">` for CSRF-Token generation
<br>
<br>

📜 License

MIT License © Xcella Insights Ltd.
