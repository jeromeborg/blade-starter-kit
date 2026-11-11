# Blade Starter Kit

A minimal Laravel starter kit built with **Blade**, **Tailwind CSS 4** and plain JavaScript (no Livewire, no Inertia, no front-end framework).
It mirrors the features and screens of the official Laravel Vue starter kit, with code that is easy to read and extend, which makes it a good fit for learning Laravel.

## Features

- **Home page** and a protected **dashboard**
- **Authentication**: login (with "remember me"), registration, forgotten password / password reset, logout
- **Settings**
  - Profile: update name and email address, delete account
  - Password: change password
  - Appearance: light, dark or system theme (stored in the browser, applied without flicker)
- Optional **email verification** (disabled by default, see below)
- **PHPUnit feature tests** for every feature above

Two-factor authentication is intentionally not included.

## Requirements

- PHP 8.3 or higher
- [Composer](https://getcomposer.org)
- Node.js 20+ and npm
- The [Laravel installer](https://laravel.com/docs/installation) (optional)

The default database is SQLite, so no database server is needed.

## Installation

### With the Laravel installer

```bash
laravel new my-app --using=jeromeborg/blade-starter-kit
cd my-app
npm install && npm run build
composer run dev
```

### With Composer

```bash
composer create-project jeromeborg/blade-starter-kit my-app
cd my-app
npm install && npm run build
composer run dev
```

`create-project` copies `.env.example` to `.env`, generates the application key, creates `database/database.sqlite` and runs the migrations.

### From a clone of this repository

```bash
git clone <repository-url> my-app
cd my-app
composer run setup
composer run dev
```

The application is then available at [http://localhost:8000](http://localhost:8000).

## Testing the starter kit locally (before publishing)

To check what a new project created from the kit looks like, without publishing it on Packagist:

```bash
# 1. Export a clean copy of the kit (only files tracked or not ignored by git)
git ls-files -co --exclude-standard | rsync -a --files-from=- . ../blade-starter-kit-export/

# 2. Create a new application from that copy
cd ..
composer create-project jeromeborg/blade-starter-kit my-test-app --stability=dev \
  --repository='{"type":"path","url":"../blade-starter-kit-export","options":{"symlink":false}}'

# 3. Build the assets, run the tests and start the application
cd my-test-app
npm install && npm run build
php artisan test
composer run dev
```

## Running the tests

```bash
php artisan test
```

Run a single file or test:

```bash
php artisan test tests/Feature/Auth/AuthenticationTest.php
php artisan test --filter=test_users_can_logout
```

## Emails (password reset)

The `.env.example` file uses the `log` mailer: emails are not sent but written to `storage/logs/laravel.log`.
To try the "Forgot your password?" flow, request a reset link, then open the log file and copy the link.

Configure the `MAIL_*` variables in `.env` to send real emails (or use a local tool such as Mailpit).

## Enabling email verification

Email verification is disabled by default. To enable it, edit `app/Models/User.php`:

```php
use Illuminate\Contracts\Auth\MustVerifyEmail;

class User extends Authenticatable implements MustVerifyEmail
```

New users then receive a verification email, and the dashboard (protected by the `verified` middleware) is only reachable once the address is verified.
The related tests in `tests/Feature/Auth/EmailVerificationTest.php` are skipped while the feature is disabled and run automatically once it is enabled.

## Project structure

| Path | Content |
|---|---|
| `routes/web.php` | Home and dashboard routes |
| `routes/auth.php` | Authentication routes |
| `routes/settings.php` | Settings routes (profile, password, appearance) |
| `app/Http/Controllers/Auth` | Authentication controllers |
| `app/Http/Controllers/Settings` | Profile and password controllers |
| `app/Http/Requests` | Form requests (login, profile update) |
| `resources/views/auth` | Login, register, password reset… pages |
| `resources/views/settings` | Settings pages |
| `resources/views/components` | Reusable Blade components (`x-button`, `x-input`, layouts…) |
| `resources/js/app.js` | Dark mode, dropdowns, mobile menu and dialogs |
| `tests/Feature` | PHPUnit feature tests |

## Code style

```bash
vendor/bin/pint
```

## License

This starter kit is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
