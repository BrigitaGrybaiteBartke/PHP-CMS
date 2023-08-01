# CMS app

A simple application with basic content management system (CMS) functionality.

## About

#### App use and is created with:
* HTML
* PHP 
* Doctrine ORM
* MySQL
* CSS Framework Bootstrap

#### Functionality:

App has the ability to manage page content without writing any code.

Once connected to the admin panel, a new page and it's content can be created, updated and deleted.

To access admin panel use URL address: http://localhost/ "created folder name here"/**admin**.

Login credentials are specified in login form input field placeholders.

Page content preview is possible without login.

## Getting Started

* Clone [Repository](https://github.com/BrigitaGrybaiteBartke/PHP_CRUD.git)

* Run XAMPP and start Apache Server and Mysql database

* Open XAMPP htdocs folder - clone application code to this folder

* Install [Composer](https://getcomposer.org/download/) locally in the current directory
    
* Once opened cloned app folder with source-code editor run this command in terminal:

   `php composer.phar install`

* **bootstrap.php** file contains database configuration parameters

* After connecting to the database import **dump.sql** file from cloned repository folder. To do so follow these steps:

    **Server** -> **Data Import** -> choose the option **Import from Self-Contained File** -> select **dump.sql** file -> click **Start Import**

* Home page: http://localhost/ "ENTER created folder name here"

## Author
Project is created by Brigita Grybaitė-Bartkė.
[Linkedin](https://www.linkedin.com/in/brigita-grybait%C4%97-bartk%C4%97-487403112)
