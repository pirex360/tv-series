# TV Series

## Description / Problem

Populate a MySQL (InnoDB) database with data from at least 3 TV Series using the following structure:

```
tv_series -> (id, title, channel, gender);
tv_series_intervals -> (id_tv_series, week_day, show_time);
```

* Provide the SQL scripts that create and populate the DB;

Using OOP, write a code that tells when the next TV Series will air based on the current time-date or and inputted time-date, and that can be optionally filtered by TV Series title.

## Installation

* Clone this repository: `https://github.com/pirex360/tv-series.git`
* `cd <tv-series>`
* `composer install`
* `npm install && npm run build`
* `cp .env.example .env`
* edit `.env` put database name, user, password for your system (make sure you make the mysql database first)
* `php artisan migrate --seed` , to apply some records to the database
* `php artisan key:generate`
* `php artisan serve`

note: if livewire or vite assets, give you some trouble use `npm run dev`.


## Description

For the simplicity of the challenge, I don't use any UI framework, just some basic CSS for clean styling.

The PHP framework used is [Laravel](https://laravel.com/) on version `10` and database engine is `MySQL`.

For a more SPA experience, I used the [Livewire](https://laravel-livewire.com/) feature of Laravel.

The Datepicker Js Library [flatpickr](https://flatpickr.js.org/)

The asset bundler used is Vite, instead of Webpack.

## Database Notes

I used eloquent and Laravel migrations on structuring the schema and seeding data.

Here is the analogy using raw SQL.

* Table: tv_series

```
CREATE TABLE `tv_series` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `channel` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
```

* Table: tv_series_intervals

```
CREATE TABLE `tv_series_intervals` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `tv_series_id` bigint unsigned NOT NULL,
  `week_day` varchar(50) NOT NULL,
  `show_time` time NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  CONSTRAINT `tv_series_intervals_tv_series_id_foreign` FOREIGN KEY (`tv_series_id`) REFERENCES `tv_series` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
```

* Insert Dummy Data

```
INSERT INTO tv_series (title, channel, gender, created_at, updated_at) 
VALUES  ('The Office', 'Dunder Mifflin TV', 'comedy', NOW(), NOW()),
        ('Breaking Bad', 'AMC TV', 'drama', NOW(), NOW()),
        ('Stranger Things', 'Netflix', 'fantasy', NOW(), NOW());


INSERT INTO tv_series_intervals (tv_series_id, week_day, show_time) 
VALUES (1, 'Monday', '20:00:00'),
       (1, 'Wednesday', '21:30:00'),
       (1, 'Friday', '22:00:00'),
       (1, 'Saturday', '18:00:00'),
       (1, 'Sunday', '19:30:00'),
       (2, 'Tuesday', '19:00:00'),
       (2, 'Thursday', '20:30:00'),
       (2, 'Saturday', '23:00:00'),
       (3, 'Monday', '21:00:00'),
       (3, 'Wednesday', '22:30:00'),
       (4, 'Tuesday', '22:00:00'),
       (4, 'Thursday', '21:30:00'),
       (4, 'Saturday', '20:00:00'),
       (4, 'Sunday', '19:00:00'),
       (5, 'Monday', '22:00:00'),
       (5, 'Tuesday', '23:00:00'),
       (5, 'Wednesday', '21:30:00'),
       (5, 'Friday', '19:00:00'),
       (5, 'Sunday', '18:30:00');

```

## Tests

To run the tests for this project, use PHPUnit: `./vendor/bin/phpunit`

This will runs **6** Feature tests with **7** assertions.

![Tests](/demo/tests.png)

## Demonstration

![TVShow Demo](/demo/demo.gif)
