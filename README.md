[![CodeFactor](https://www.codefactor.io/repository/github/luidjyaubel/motify/badge/main)](https://www.codefactor.io/repository/github/luidjyaubel/motify/overview/main)
# Modify 

<img src=".//Assets/picture/motify.png" alt="drawing" style="width:200px;"/>

_________________________________


Motify is an application that allows you to manage your LEGO collection. This application uses the Rebrickable API and was created in PHP with cURL.

_____
## Configuration

In the php.ini file, you need to enable (and install on Linux) the following extensions:

- cURL (`extension=curl`)
- PDO MySQL (`extension=mysqli`)

On the MariaDB server, import the database file located in the Database repository.

In this database, you have a sample user :
```
Username : admin
Password : admin
```
## Installation

### First Method (developement)

- Clone the GitHub repository.
- Copy and rename `.env`.dev to `.env`.
- Modify the values of environment variables in the `.env` file.

**If you want to test this application locally in the Motify directory, execute php -S localhost:8000.**

### Second Method

- Clone the GitHub repository
- Define the environment variables that are in the `.env.dev` file on your server.

