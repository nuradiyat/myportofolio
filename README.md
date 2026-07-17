
# Website Portofolio Perofile

Website Portofolio Perofile😎😎😎
You're ready to go! Visit the url in your browser, and login with:

-   **Username:** admin@gmail.com
-   **Password:** admin

## Dashboard

![Filament Demo](https://drive.google.com/uc?export=view&id=1YjuM7nXwh686NTP0yqa1vAmGUVsjJKe9)

## Website

![Preview Portfolio](https://drive.google.com/uc?export=view&id=1B7PafCByd0NDaxXmId5mNIKHaRa3eVjt)

## Installation

Clone the repo locally:

```sh
git clone https://github.com/nuradiyat/myportofolio.git
```

Masuk teks editor Install PHP dependencies:

```sh
composer install
```

Setup configuration:

```sh
cp .env.example .env
```

Generate application key:

```sh
php artisan key:generate
```

Create an SQLite database. You can also use another database (MySQL, Postgres), simply update your configuration accordingly.

```sh
touch database/database.sqlite
```

Run database migrations:

```sh
php artisan migrate
```

Run database seeder:

```sh
php artisan db:seed
```

> **Note**  
> If you get an "Invalid datetime format (1292)" error, this is probably related to the timezone setting of your database.  
> Please see https://dba.stackexchange.com/questions/234270/incorrect-datetime-value-mysql


Create a symlink to the storage:

```sh
php artisan storage:link
```

Update APP_URL:

```sh
APP_URL=http://127.0.0.1:8000
```

Run the dev server (the output will give the address):

```sh
php artisan serve
```
