## Getting Started

This is how you can set up the project locally using a terminal (bash or cmd). To get a local copy up and running, follow these simple steps.

### Prerequisites

Below are the tools needed for you to run the project on your computer. Click on every tool listed below and follow the instruction provided on their respective sites detailing how you can install them.

* [php](https://www.php.net/)
* [composer](https://getcomposer.org/)
* [laravel](https://laravel.com/)
* [mysql](https://www.mysql.com/)
* [node](https://nodejs.org/en/)
* [Git](https://git-scm.com/)

### Step 1: Clone The Project

Clone this repository into your local directory, Use the command below:

```sh
# Clone project to a computer
git clone https://github.com/mkdonz/TaskTracker.git

# Navigate to the project root directory
cd TaskTracker
```

### Step 2: Install Composer Dependencies

Once you clone the Laravel project, you must install all the project dependencies. When you run `composer install`, composer checks the `composer.json` file for all packages needed by Laravel in that particular project. To install all the dependencies, run composer install like below:

```sh
# install all the composer dependencies
composer install
```

### Step 3: Install npm Dependecies

We must install the necessary NPM packages. These are packages mostly needed for the front-end. Run `npm install` to install the packages. Run the commands below to install the needed packages:

```sh
# install all packages need by the frontend
npm install
```

### Step 4: Configure The Project

The `.env` files are not generally committed to source control for security reasons. There is `.env.example`, which is a template of the `.env` file that the project expects us to have. Make a copy of the `.env` file from the `.env.example` file.

Run commands below to copy the `.env.example` file:

```sh
# commands works in linux and unix
cp .env.example .env 
```

> ***Note: remember to modify the created `env` file and make sure that it reflects your infrastructure settings. An example is your `MySql` settings, they should be reflected in the `.env` file.***

### step 5: Generate App Encryption Key

Laravel requires you to have an app encryption key. The key is randomly generated and stored in your `.env` file. The app will use this encryption key to encode various elements of your application from cookies to password hashes and more.

```sh
#Generate laravel app encryption key
php artisan key:generate
```

### step 6: Create a Database For the Project

Create an empty database for your project using the MySQL database tools. ***In the `.env` file, add database information to allow Laravel Project to connect to the database***. Create a schema in MySQL database using CLI:

```sh
# connect to mysql database
# replace 'user' with your mysql user name in the command bellow
mysql -u user -p

# enter the specified user password in the prompt

# create the database and give it a name you desire
mysql> CREATE DATABASE laravel;


# exist from mysql
mysql> \q
```

#### Note: Reminder on database configurations in `.env` file

> To allow Laravel to connect to the database we just created above. Add the connection configurations in the `.env` file and Laravel will handle the connection from there. In the `.env` file make sure that  `DB_HOST`, `DB_PORT`, `DB_DATABASE`, `DB_USERNAME`, and `DB_PASSWORD` match the configurations of the database you just created. This will allow you to run migrations in the next step.

### Step 7: Database Migration

Once your credentials are in the `.env file`, now you can migrate your database. Run `PHP artisan migrate`. Check your database to make sure the tables needed to run the application were successfully migrated the way we expected.

```sh
# Run migrationto created neede tables
php artisan migrate
```

### Step 8: Start The Project 

Finally, run the project by running the command below:

```sh
# Run server
php artisan serve
```

Access the project by visit the URL below:

[project](`http://127.0.0.1:8000/`) : `http://127.0.0.1:8000/`
