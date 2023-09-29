## IBOOT - PLATFORM PACKAGE


## Description
This is a package user management

## How to install?
`composer require iboot/platform`

## Publish vendor if you want
`php artisan vendor:publish --force`

## Run migration && seeder
`php artisan migrate && php artisan db:seed --class="IBoot\Platform\Database\Seeders\UserSeeder"`  
