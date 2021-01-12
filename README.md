# Bana

Bana is a smart home web app that connects to devices in your home. Control lighting in your room from your phone. The devices are NodeMCUs that react to HTTP requests.
## Installation(Windows)

Download this project as ZIP, or clone it. Then cd into the project and follow these steps;

This project is made in [Laravel](https://laravel.com/docs/8.x).

```bash
composer install
```

The `.env` file is committed to source control for security reasons. But there is a `.env.example` which is a template of the `.env` file that the project expects us to have. So we will make a copy of the `.env.example` file and create a `.env` file that we can start to fill out to do things like database configuration in the next few steps.

```bash
copy .env.example .env
```

```bash
php artisan key:generate
```
Now configure the DB connection in the `.env` file with your database credentials.

Once your credentials are in the `.env` file, now you can migrate your database.

```bash
php artisan migrate
```

## Usage

Serve the application
```bash
php artisan serve
```

## License
[MIT](https://choosealicense.com/licenses/mit/)
