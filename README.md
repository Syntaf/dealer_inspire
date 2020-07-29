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

2. Build the docker image and start the containers
   ```
   > docker-compose up
   ```

3. Visit http://localhost:9999/ and submit an inquiry through the contact form. Don't forget to check the terminal to see the mail being sent through `stderr`!

## Running locally

While Docker is recommended, to adhere to the challenge requirements one can also run this project locally.

1. Clone and _cd_ into the project
   ```
   > git clone https://github.com/Syntaf/dealer_inspire.git
   > cd dealer_inspire
   ```

2. Install dependencies through composer
   ```
   > composer install
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