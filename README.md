## Task ##
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

## Installation ##

Один из вариантов развертывания в dev окружении: 
1. Выполнить `git clone https://github.com/bazgalev/users-task.git`
2. Выполнить `composer install`
3. В директории проекта выполнить `cp .env.example .env`
4. Настроить .env file
5. Выполнить `php artisan migrate`
6. Выполнить `php artisan db:seed` (для заполнения тестовыми данными)
7. Выполнить `php artisan key:generate`
5. Выполнить `php artisan serve`
6. visit http://localhost:8000/

## External API docs ##

Список роутов для внешнего API: <br>
https://documenter.getpostman.com/view/9306397/SWLk4RY8?version=latest

