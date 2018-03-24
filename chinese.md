## Laravel-Cadillac

该扩展包基于 Laravel 开发，请确保您是在 Laravel 下使用。在日常的开发当中，数据表的某些结构可能会产生一定的变动，例如：增加一个字段或减少一个字段等。如果项目的开发周期较长，我们可能会忘掉一些数据表的结构以至于我们需要查看 `Migration` 文件或进入 `Mysql` 查看数据表的结构，但是我认为这是一件浪费时间的事情！因此，我开发了这个包，当我们需要查看那些我们记得不是很清楚的数据表的结构的时候，只需要一个命令就可以了！


## 安装

```
composer require qsnh/laravel-cadillac dev-master --dev
```

> 推荐您在开发环境下使用。


## 命令

```
php artisan cadillac [tableName] --export --html
```


#### 显示当前数据库所有的表

```
php artisan cadillac
```

![php artisan cadillac](https://user-images.githubusercontent.com/12671205/37866385-27acd13a-2fc5-11e8-8a54-be6110686999.gif)

#### 查看某个表的结构

```
php artisan cadillac tableName
```

![php artisan cadillac tableName](https://user-images.githubusercontent.com/12671205/37866390-338b15a2-2fc5-11e8-833f-5749c693842d.gif)


#### 将当前数据库所有的表结构导入到 MARKDOWN 文件中

```
php artisan cadillac --export
```

![php artisan cadillac --export](https://user-images.githubusercontent.com/12671205/37866396-40fa712e-2fc5-11e8-8559-e678ac3993ee.gif)

#### 将当前数据库所有的表结构导入到 HTML 文件中

```
php artisan cadillac --export --html
```

![php artisan cadillac --export --html](https://user-images.githubusercontent.com/12671205/37866411-7c6fcb8c-2fc5-11e8-92b3-5ccaf8f3b5d2.gif)


## 作者

[Qsnh](https://github.com/Qsnh)