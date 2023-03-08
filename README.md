<h1>Form + Backend Lead</h1>

Clone this repo

    git clone https://github.com/mitchel21/lead_test.git

Create env file and set up your DB connection

    cp .env.example .env
    
    
Install packages

    composer install


Generate key

    php artisan key:generate


Run migrations + seed

    php artisan migrate --seed

Admin login è /admin/login

Default mail per l'admin è "admin@mail.it"

Default password per l'admin è "password"



## References
- [Laravel 9](https://laravel.com)
- [Laravel Breeze](https://laravel.com/docs/9.x/starter-kits#laravel-breeze)

## Contributing

Anyone who wants to make some improvement just make a Pull-Request.

If you can achieve the same goal using Jetstream, please share your solution with me as I am very interested.

## License

The Laravel framework and this repository is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
