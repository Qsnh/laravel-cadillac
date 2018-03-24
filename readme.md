## Laravel-Cadillac

This package develop on laravel, please confirm use it on laravel project.In the daily development, some structures of the data table may have certain changes, such as: add one field or remove one field. If the development cycle of the project is long, we may forget about the structure of some data tables so that we need to look at the `Migration` file or enter `Mysql` to see the structure of the data table, but I think this is a waste of time! Therefore, I developed this package. When we need to look at the structure of data tables that we do not remember very clearly, we only need one command!

[中文文档](chinese.md)

## Install

```
composer require qsnh/laravel-cadillac dev-master --dev
```

> It's recommended use it in develop environment.


## Command

```
php artisan cadillac [tableName] --export --html
```


#### Show all tables in current database

```
php artisan cadillac
```

![php artisan cadillac](https://user-images.githubusercontent.com/12671205/37866385-27acd13a-2fc5-11e8-8a54-be6110686999.gif)

#### Show a table structure

```
php artisan cadillac tableName
```

![php artisan cadillac tableName](https://user-images.githubusercontent.com/12671205/37866390-338b15a2-2fc5-11e8-833f-5749c693842d.gif)


#### Import all the table structures of the current database into the MARKDOWN file

```
php artisan cadillac --export
```

![php artisan cadillac --export](https://user-images.githubusercontent.com/12671205/37866396-40fa712e-2fc5-11e8-8559-e678ac3993ee.gif)

#### Import all the table structures of the current database into the HTML file

```
php artisan cadillac --export --html
```

![php artisan cadillac --export --html](https://user-images.githubusercontent.com/12671205/37866411-7c6fcb8c-2fc5-11e8-92b3-5ccaf8f3b5d2.gif)


## Author

[Qsnh](https://github.com/Qsnh)