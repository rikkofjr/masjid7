<p align="center"><img src="https://res.cloudinary.com/dtfbvvkyp/image/upload/v1566331377/laravel-logolockup-cmyk-red.svg" width="400"></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

## About Masjid Web Apps

Masjid web app, is web application build in laravel framework. This web aplication can be using for masjid organization (DKM - Dewan Kemakmuran Masjid). Management Information System are availble is, CRUD Zakat, CRUD Qurban, CRUD Jamaah record. I hope this web app can support your masjid organization administration.Thankyou.. 


## Preview Index Page

<img src="https://rikkofjr.github.io/cv/img/index.png">
using colorlib

## Preview Dashboard Page
<img src="https://rikkofjr.github.io/cv/img/dashboard.png">
using start bootstrap

## Install 

1. you can clone this repository or download as zip<br/>
    <code>
        git clone https://github.com/rikkofjr/masjid7.git
    </code>
    <br/>
2. install dependencies <br/>
    <code>composer install</code><br/>
3. copy .env file <br/>
    <code>cp .env.example .env</code> <br/>
4. generate key <br/>
    <code>php artisan key:generate</code> <br/>
5. import sql file <b>db_masjid.sql</b><br/>
6. configure your database at .env file <br/>
    <code>
    DB_CONNECTION= <br/>
    DB_HOST= <br/>
    DB_PORT= <br/>
    DB_DATABASE=your db name <br/>
    DB_USERNAME= <br/>
    DB_PASSWORD= <br/>
    </code><br/>
7. Run the server
    <code>php artisan serve</code>
## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
