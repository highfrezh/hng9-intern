# HNG9 NFT PROJECT

## Introduction
This repository contains scripts that generates a compatible Chip-0007 json file, create a SHA-256 hash for the file and append the hash to a CSV file.

## Prerequisites
This API relies on MySQL, PHP 8+ and composer for any meaningful work, so make sure you have all the required libraries installed either locally or remote, depending on your setup. See [https://laravel.com/docs/9.x/installation](https://laravel.com/docs/9.x/installation) for information about setting up Laravel on your machine

## Quick Start
You should have the all the necessary libraries installed on your machine after following all the steps in the URI given in the ```Prerequisites``` section.

### Step 1: Clone project
Clone the repository using the git command below:

````
$ cd ~
$ git clone https://github.com/highfrezh/customer-invoice-api.git
$ cd customer-invoice-api
````

### Step 2: Update Environment Variables
Copy the .env.example file to .env and update the following by replacing the Xs with your actual values in the .env file:

````
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=XXX
DB_USERNAME=XXX
DB_PASSWORD=XXX
````

### Step 3: Install Application Dependencies
From the project directory, install all dependencies with the command below:

````
$ composer update
````

### Step 4: Generate Application Key

From your project directory, run the following command to generate the application encryption key


````
$ php artisan key:generate
````

### Step 5: Run the application

Start the application by running the command below, the API resources should be accessible via [http://localhost:8000](http://localhost:8000)

NB: The application port (8000) might be different, check your console to confirm the port number.
````
$ php artisan serve
````
### Step 6: Upload the csv file
go to [http://localhost:8000/](http://127.0.0.1:8000/update-nft-csv-file) to upload the csv file;
the path to the output is given from the response.




THANK YOU.
