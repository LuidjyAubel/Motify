[![CodeFactor](https://www.codefactor.io/repository/github/luidjyaubel/motify/badge/main)](https://www.codefactor.io/repository/github/luidjyaubel/motify/overview/main)
# Modify 

<img src=".//Assets/picture/motify.png" alt="drawing" style="width:200px;"/>

_________________________________


motify is an application that allows you to manage your lego collection

this application using the API Rebrickable, and it was created in PHP with CURL

_____
## Configuration

In the PHP.ini you have to activate (and download on linux) the extentions :

- CURL (`extension=curl`)
- PDO MYSQL (`extension=mysqli`)

On the Mariadb server import the databases file who is in the Database repository.

In this database you have a sample user :
```
Username : admin
Password : admin
```
## Installation

- Clonning the github repository
- Copy and rename conf-sample.php in conf.php
- modify the value in the conf.php

**If you want to do a local test of this application in Motify directory execute php -S localhost:8000**

