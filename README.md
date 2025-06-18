# Google Sheets for Laravel Demo project

Demo site

https://sheets.kawax.biz/

https://docs.google.com/spreadsheets/d/1SUNw7QzAMx-xXUwr5s-mJrZC9NGFRl4RqyzSL6CogkQ/edit?usp=sharing

https://github.com/invokable/laravel-google-sheets

The current implementation is a sample code for service account authentication using Laravel 12 and Livewire (no authentication required).

## Features

- Laravel 12 with Livewire 3
- Google Sheets API integration using service account authentication
- Simple form to add entries to Google Sheets
- Real-time display of recent entries
- No user authentication required

## Branches
| Branch        | Laravel    | Starter Kit            | Google API Authentication Method    |
|---------------|------------|------------------------|-------------------------------------|
| `6.x`         | Laravel 6  | Old `make:auth`        | OAuth authentication with Socialite |
| `8.x`         | Laravel 8  | Breeze, Livewire       | Service account authentication      |
| `11.x`        | Laravel 11 | Breeze, Livewire       | Service account authentication      |
| `12.x-breeze` | Laravel 12 | Breeze, Livewire       | Service account authentication      |
| `main`        | Laravel 12 | Livewire Starter Kit   | Service account authentication      |
