# Dealer Inspire Coding Challenge

This challenge was developed using:
- Laravel
- PHP 7.4 (but compatible with 7.3)
- MySql
- Docker

Configuration was kept to a minimal to reduce project dependencies. Queuing is configured to run sychronously and mailing jobs will print to `stderr` by default (see terminal for mail jobs).

An `.env` file was committed for the purpose of reducing the amount of setup requied. Normally, this file shouldn't be committed for the sake of not exposing secrets.

Bundled assets were also commited to this repository to ensure that a simple php server could run this project. See [Building Assets](##Building-Assets)

## Running with Docker 

1. Clone and _cd_ into the project
   ```
   > git clone https://github.com/Syntaf/dealer_inspire.git
   > cd dealer_inspire
   ```

2. Create a new volume for MySql
   ```
   > docker volume create dealer_inspire_mysql
   ```

3. Startup the containers
   ```
   > docker-compose up
   ```

4. In another terminal, run the migrations then visit http://localhost:9999/
   ```
   > docker-compose exec app php artisan migrate
   ```

5. Submit an inquiry through the contact form and check the terminal to see the mail being sent through `stderr`!

To run tests with Docker, use the following command:

```
docker-compose run app php artisan test
```

## Running locally

While Docker is recommended, to adhere to the challenge requirements one can also run this project locally.

1. Clone and _cd_ into the project
   ```
   > git clone https://github.com/Syntaf/dealer_inspire.git
   > cd dealer_inspire
   ```

2. Install dependencies and run migrations (assuming you have a database available named `dealer_inspire`)
   ```
   > composer install
   > php artisan migrate
   ```

3. Create a PHP server and visit http://localhost:9999/
   ```
   > php -S 127.0.0.1:9999 -t public
   ```

## Building Assets

Precompiled assets have been committed to this project already, but if you'd like to rebuild the assets use the following commands:

_Note: If using docker, run `docker-compose exec app /bin/bash` before performing the following steps_

1. Install frontend dependencies
   ```
   > npm install
   ```

2. Build assets
   ```
   > npm run dev
   ```