# Max Murage — Laravel Portfolio Application

A production-ready **Laravel MVC Web Application** representing the software development and healthcare IT portfolio of Max Murage.

## Architecture & Features

- **Framework**: Laravel 13 (PHP 8.5+)
- **Structured Data Repository**: `config/portfolio.php` stores bio, experience timeline, technical arsenal, engineering case studies, and certification records.
- **Controllers & Routes**:
  - `GET /` -> `PortfolioController@index`: Renders dynamic portfolio sections via clean Blade templates.
  - `POST /contact` -> `PortfolioController@contact`: Validates and processes interactive contact form submissions with AJAX and session feedback.
- **Blade Templating**:
  - `resources/views/layouts/app.blade.php` (Master layout)
  - `resources/views/partials/navbar.blade.php` (Navigation bar)
  - `resources/views/partials/footer.blade.php` (Footer & social links)
  - `resources/views/portfolio/index.blade.php` (Portfolio landing view)
- **Universal Assets**: Assets (`build/assets/...` and `images/...`) use clean relative paths so they work seamlessly both on dynamic Laravel servers and static CDN/Surge hosting.

---

## Running Locally (Dynamic Laravel Server)

1. Ensure PHP 8.2+ and Composer are installed.
2. Start the Laravel development server:
   ```powershell
   php artisan serve
   ```
3. Open `http://127.0.0.1:8000` in your browser.

---

## Updating & Exporting Static Page for Surge

To render the latest Blade templates into the `public/index.html` file for static deployment:

```powershell
php artisan tinker --execute="file_put_contents('public/index.html', app(\App\Http\Controllers\PortfolioController::class)->index()->render()); echo 'Exported successfully';"
```

To deploy the `public/` folder to Surge:

```powershell
npx surge public max-murage-portfolio.surge.sh
```
