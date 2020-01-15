## Задание ##
Разработать приложение по управлению пользователями.
Сделать возможность поиска по ФИО.
Сделать фильтрацию пользователей по городам.
Сделать внешнее апи для получения, поиска и фильтрации пользователей.
Данные которые должны быть у пользователя: 
- Имя
- Фамилия 
- Отчество
- Город проживания 
- Емэил

Поиск должен быть в одном инпуте.

## Требования ##


* PHP >= 7.4.0
* BCMath PHP Extension
* Ctype PHP Extension
* JSON PHP Extension
* Mbstring PHP Extension
* OpenSSL PHP Extension
* PDO PHP Extension
* Tokenizer PHP Extension
* XML PHP Extension


## Установка ##

Один из вариантов развертывания: 
1. Выполнить `git clone https://github.com/bazgalev/users-task.git`
2. Выполнить `composer install`
3. В директории проекта выполнить `cp .env.example .env`
4. Настроить `.env` файл
5. Выполнить `php artisan migrate`
6. Выполнить `php artisan db:seed` (для заполнения тестовыми данными)
7. Выполнить `php artisan key:generate`
5. Выполнить `php artisan serve`
6. Клик http://localhost:8000/

## Комментарий ##

#### Поиск по ФИО ####
Релизован простой поиск по ФИО через `CONCAT(фамилия, имя, отчество) LIKE %foo%` <br>

#### Внешнее API ####
Список роутов для внешнего API: <br>
https://documenter.getpostman.com/view/9306397/SWLk4RY8?version=latest

Для внешнего API добавлен middleware https://packagist.org/packages/barryvdh/laravel-cors для работы с CORS
