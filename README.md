# Docker for PHP framework

To start project:
```
make up
```

To install PHP framework with Composer enter php-fpm container:
```
make enter-php-container
```

Clear 'src' directory from php-fpm container :
```
rm .gitignore
```

and to install preferred framework into 'src' directory from php-fpm container follow installation instructions of chosen framework, f.e.: 
- Laravel ( [https://laravel.com/docs/master/installation](https://laravel.com/docs/master/installation) )
  ```
  composer create-project laravel/laravel .
  ```
- Symfony ( [https://symfony.com/doc/current/setup.html](https://symfony.com/doc/current/setup.html) )
  ```
  composer create-project symfony/skeleton:"7.0.*" .
  ```
