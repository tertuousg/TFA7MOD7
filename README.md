# TFA7 - Making It Editable in Laravel

A standalone Laravel 12 POS account-management example for IT0049. This is **not** a merge of your TFA6 application; merge its controllers, models and routes if you already have TFA6 POS features.

## Features
- Customer listing, create, edit and update with required name and valid email.
- User listing, create, edit and update with required unique username and full name.
- Old form input and field-specific validation errors.
- Optional user avatar on edit: validated image (JPEG, PNG, WebP), max 2 MB, resized/cropped to 240x240 JPEG using Intervention Image v3 with GD, stored on the Laravel `public` disk. Only the relative path is saved in `users.avatar`.
- Placeholder avatar when no image is uploaded.

**Confirm with your instructor that Intervention Image is an approved image package.** PHP GD must be enabled.

## Requirements
PHP 8.2+, Composer, PHP extensions pdo_sqlite, fileinfo, GD. This archive intentionally excludes vendor dependencies and app secrets.

## Windows PowerShell setup
```powershell
composer install
Copy-Item .env.example .env
New-Item database/database.sqlite -ItemType File -Force
php artisan key:generate
php artisan migrate:fresh --seed
php artisan storage:link
php artisan serve
```
If `database/database.sqlite` already exists, the New-Item command is optional. `migrate:fresh` erases existing tables; use only for a fresh database.

Set `APP_TIMEZONE=Asia/Manila` and `DB_CONNECTION=sqlite` in `.env`. For hosting, configure a persistent database and writable storage. Do not commit `.env` or secret keys.

## Routes
`/customers`, `/customers/create`, `/customers/{customer}/edit`, `/users`, `/users/create`, `/users/{user}/edit`.

## Tests
```powershell
php artisan test
```

## Notes
- This project demonstrates the specified customer/user account workflows, not inventory or sales transactions from TFA6.
- Uploaded files are stored at `storage/app/public/avatars` and served through `public/storage` after `storage:link`.
- Avatar processing requires the GD extension and the Intervention Image v3 package installed by Composer.
- Public avatars are publicly viewable; do not upload sensitive documents.
- This is a coursework demo without authentication. Add authorization before production deployment.
- Upload your source files to GitHub and deploy separately for the required live link.
