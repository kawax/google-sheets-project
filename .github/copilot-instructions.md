# Onboarding Guide: Google Sheets Laravel Demo Project

## Overview

The **Google Sheets Laravel Demo Project** is a demonstration application that showcases real-time integration between Laravel and Google Sheets using service account authentication. This project serves as a practical example of how to build applications that can read from and write to Google Sheets using modern Laravel features.

**Target Users**: Laravel developers learning Google Sheets integration, particularly those working with Livewire and modern Laravel stack.

**Key Features**:
- **Laravel 12 Framework**: Latest Laravel features with modern PHP 8.2+ support
- **Livewire 3 Integration**: Real-time UI updates using standard Livewire components (not Volt)
- **Google Sheets API**: Service account authentication for server-to-server communication
- **Flux UI Components**: Modern, reactive user interface with Livewire Starter Kit
- **Real-time Data Sync**: Form submissions instantly appear in both Google Sheets and the application

**Primary Use Cases**:
- Learning Google Sheets API integration patterns
- Understanding service account authentication workflows
- Building data collection applications with Google Sheets as backend
- Creating real-time dashboards that sync with spreadsheet data

## Copilot Environment Restrictions

⚠️ **CRITICAL**: Connections to Google APIs (such as `www.googleapis.com`) will fail in the Copilot environment due to firewall restrictions.

- **Google Sheets API calls will NOT work** in the Copilot development environment
- This includes any attempt to use `php artisan serve` with real Google API integration
- The application will fail when trying to connect to Google's servers from within Copilot
- **Workaround**: Use mock data or skip Google API-dependent code when developing in Copilot
- **Real API testing**: Must be done in GitHub Actions, local development environments, or production

**Development Strategy in Copilot**:
1. Focus on UI development and Livewire component logic
2. Use the existing mock patterns from the test suite (see `tests/Feature/ExampleTest.php`)
3. Work with static/dummy data instead of live Google Sheets data
4. Test API integration functionality via GitHub Actions or locally outside Copilot

**Note**: The project already includes proper mock testing patterns that demonstrate how to work around API connectivity issues.

## Project Structure

This Laravel 12 demo application uses a clean, modern architecture with the following key components:

### Main Application Components

- **`app/Livewire/Sheets/Form.php`** - Handles the form for adding entries to Google Sheets
  - Validates user input (name and message fields)
  - Appends data to the configured Google Sheet
  - Dispatches events for real-time UI updates

- **`app/Livewire/Sheets/Posts.php`** - Displays recent entries from Google Sheets
  - Retrieves and transforms spreadsheet data
  - Shows the latest 10 entries in reverse chronological order
  - Updates automatically when new posts are added

### Configuration Files

- **`config/sheets.php`** - Project-specific Google Sheets configuration
  - `POST_SPREADSHEET_ID` - Target spreadsheet identifier
  - `POST_SHEET_ID` - Specific sheet/tab within the spreadsheet

- **`config/google.php`** - Google API client configuration
  - Service account authentication settings
  - API credentials and access scopes

### Frontend & UI

- **Livewire Starter Kit** - Modern Laravel frontend scaffolding
- **Flux UI Components** - Reactive UI components for forms and data display
- **Tailwind CSS** - Utility-first CSS framework for styling

### Testing Infrastructure

- **PHPUnit** - Unit and feature testing
- **Mockery** - API mocking for Google Sheets interactions
- **Laravel Pint** - Code style enforcement

## Setup Instructions

### 1. Environment Configuration

Copy the environment template and configure your local settings:

```bash
cp .env.example .env
```

### 2. Google API Credentials Setup

**Note**: This step cannot be fully tested in Copilot due to API restrictions.

1. Create a Google Cloud Project at [Google Cloud Console](https://console.cloud.google.com/)
2. Enable the Google Sheets API and Google Drive API
3. Create a Service Account and download the JSON credentials file
4. Place the JSON file in `storage/sheets-service-account.json`
5. Configure the following environment variables:

```env
GOOGLE_SERVICE_ENABLED=true
GOOGLE_SERVICE_ACCOUNT_JSON_LOCATION="storage/sheets-service-account.json"
```

### 3. Google Sheets Configuration

1. Create a new Google Spreadsheet
2. Share it with your service account email (found in the JSON credentials)
3. Copy the spreadsheet ID from the URL
4. Configure environment variables:

```env
POST_SPREADSHEET_ID=your_spreadsheet_id_here
POST_SHEET_ID=Sheet1
```

### 4. Application Setup

Install dependencies and generate application key:

```bash
# Install PHP dependencies
composer install

# Install JavaScript dependencies
npm install

# Generate application encryption key
php artisan key:generate

# Build frontend assets (for production)
npm run build

# Or run development server (for development)
npm run dev
```

### 5. Run the Application

```bash
# Start Laravel development server
php artisan serve

# In another terminal, start Vite for asset compilation
npm run dev
```

**Important**: API functionality will not work in Copilot. For full testing, use GitHub Actions or a local environment.

## Testing

The project includes comprehensive testing strategies that work around API limitations:

### Running Tests

```bash
# Run all tests
php artisan test

# Run with coverage (if available)
vendor/bin/phpunit --coverage-html coverage

# Lint code style
composer run lint
```

### Mock Testing Pattern

The project demonstrates proper mocking of Google Sheets API calls:

```php
// Example from tests/Feature/ExampleTest.php
Sheets::expects('spreadsheet->sheet->get')
    ->andReturn(collect([
        ['John Doe', 'Hello World', '2023-10-01'],
        ['Jane Doe', 'Goodbye World', '2023-10-02'],
    ]));

Sheets::expects('collection')
    ->andReturn(collect([
        ['name' => 'John Doe', 'message' => 'Hello World', 'created_at' => '2023-10-01'],
        ['name' => 'Jane Doe', 'message' => 'Goodbye World', 'created_at' => '2023-10-02'],
    ]));
```

This pattern allows you to develop and test the application logic without requiring live API connections.

## Glossary of Project-Specific Terms

**Service Account** - `config/google.php`  
A Google Cloud service account that provides server-to-server authentication without requiring user interaction. The JSON credentials file contains the private key and client information.

**Livewire Component** - `app/Livewire/Sheets/`  
Laravel Livewire components that handle server-side rendering and real-time UI updates. This project uses standard PHP class components, not Volt functional components.

**POST_SPREADSHEET_ID** - Environment variable  
The unique identifier of the Google Spreadsheet, extracted from the spreadsheet URL. Format: `1SUNw7QzAMx-xXUwr5s-mJrZC9NGFRl4RqyzSL6CogkQ`

**POST_SHEET_ID** - Environment variable  
The name or ID of the specific sheet/tab within the spreadsheet where data will be written. Usually "Sheet1" for new spreadsheets.

**Sheets Facade** - `Revolution\Google\Sheets\Facades\Sheets`  
Laravel facade providing static access to Google Sheets operations like `get()`, `append()`, `update()`, and `collection()`.

**revolution/laravel-google-sheets** - Composer package  
Third-party Laravel package that simplifies Google Sheets API integration with fluent interface methods and Laravel-specific features.

**Flux Components** - `livewire/flux`  
Modern UI component library for Livewire applications, providing pre-built form elements, buttons, and layout components.

**GOOGLE_SERVICE_ENABLED** - Environment variable  
Boolean flag that enables service account authentication mode in the Google API client configuration.

**GOOGLE_SERVICE_ACCOUNT_JSON_LOCATION** - Environment variable  
File path to the JSON credentials file downloaded from Google Cloud Console for service account authentication.

**append()** - `Sheets::spreadsheet()->sheet()->append()`  
Method that adds new rows to the end of a Google Sheet, used in the Form component to add new entries.

**get()** - `Sheets::spreadsheet()->sheet()->get()`  
Method that retrieves all data from a Google Sheet, used in the Posts component to display recent entries.

**collection()** - `Sheets::collection()`  
Helper method that transforms raw spreadsheet data into Laravel Collections with named keys based on header rows.

**majorDimension** - Google Sheets API parameter  
Controls whether data is organized by ROWS or COLUMNS. This project uses ROWS (default) for typical table-like data.

**spreadsheet()** - Fluent method  
Selects a specific Google Spreadsheet by ID for subsequent operations.

**sheet()** - Fluent method  
Selects a specific sheet/tab within the spreadsheet for data operations.

**Livewire Starter Kit** - Laravel scaffolding  
Modern Laravel frontend scaffolding that provides authentication, layouts, and component structure using Livewire 3.

**dispatch('postAdded')** - Livewire event  
Custom event dispatched when a new post is added, triggering real-time updates in the Posts component.

**#[Computed]** - Livewire attribute  
PHP attribute that marks a method as a computed property, automatically cached and updated when dependencies change.

**#[On('postAdded')]** - Livewire attribute  
PHP attribute that registers an event listener, causing the method to execute when the specified event is dispatched.

**#[Validate]** - Livewire attribute  
PHP attribute that defines validation rules for component properties, automatically validated on form submission.

**now()->toDateTimeString()** - Laravel helper  
Carbon method that returns the current timestamp in database-compatible format (Y-m-d H:i:s).