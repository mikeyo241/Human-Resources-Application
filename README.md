# Human-Resources-Application
A laravel 5.4 application used to manage supervisors and employees.

## To get started using this web app
```sh
git clone https://github.com/mikeyo241/Human-Resources-Application.git
cd Human-Resources-Application/
```

## Development Database Configuration
Don't use this configuration in a production environment.
```mysql
CREATE USER 'forge'@'localhost' IDENTIFIED BY 'password';
CREATE DATABASE HR_SYSTEM;
GRANT ALL PRIVILEGES ON HR_SYSTEM.* TO 'forge'@'localhost';
FLUSH PRIVILEGES;
```
## Testing the app in the browser
The database must be configured and the terminal should be in the project's root folder.
```sh
php artisan serve
```
Enter the address given ( most likely http://127.0.0.1:8000 ) into any browser to view the application.