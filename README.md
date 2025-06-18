# Google Sheets for Laravel Demo project

Demo site

https://sheets.kawax.biz/

https://docs.google.com/spreadsheets/d/1SUNw7QzAMx-xXUwr5s-mJrZC9NGFRl4RqyzSL6CogkQ/edit?usp=sharing

https://github.com/invokable/laravel-google-sheets

The current implementation is a sample code for service account authentication using Laravel 12 and Livewire Starter Kit with standard components (non-Volt).

## Features

- Laravel 12 with Livewire 3 (standard components)
- Google Sheets API integration using service account authentication
- Simple form to add entries to Google Sheets
- Real-time display of recent entries
- No user authentication required
- Uses Livewire Starter Kit with traditional PHP class components (non-Volt)

## Branches
| Branch        | Laravel    | Starter Kit                                | Google API Authentication Method    |
|---------------|------------|--------------------------------------------|-------------------------------------|
| `6.x`         | Laravel 6  | Old `make:auth`                            | OAuth authentication with Socialite |
| `8.x`         | Laravel 8  | Breeze, Livewire                           | Service account authentication      |
| `11.x`        | Laravel 11 | Breeze, Livewire                           | Service account authentication      |
| `12.x-breeze` | Laravel 12 | Breeze, Livewire                           | Service account authentication      |
| `main`        | Laravel 12 | Livewire Starter Kit (standard components) | Service account authentication      |

## Project Structure

This project uses Laravel 12 with Livewire 3 in the standard component format (not Volt). The Livewire components are traditional PHP classes that extend the base `Component` class:

- `app/Livewire/Sheets/Form.php` - Handles the form for adding entries to Google Sheets
- `app/Livewire/Sheets/Posts.php` - Displays recent entries from Google Sheets

The project uses Livewire Starter Kit with Flux UI components for the frontend, providing a modern and reactive user interface without requiring Volt's functional component syntax.

## Setup

1. Copy `.env.example` to `.env` and configure your environment variables
2. Set up Google Sheets API credentials and service account authentication
3. Configure the `POST_SPREADSHEET_ID` and `POST_SHEET_ID` environment variables
4. Run `composer install` and `npm install`
5. Generate application key with `php artisan key:generate`
