# Тестовое задание
Условия тестового задания: разработать сервис, который делит
 массив по заданным правилам. Сервис должен быть реализован
 в виде REST API (JSON), а также должен работать в консоли.
 
Сервис работает на PHP 7.1.

# Установка
1. Клонировать репозиторий с тестовым заданием

2. Выполнить `composer install`

3. Создать БД. Имя БД, использованное в проекте по
умолчанию - `prunto`

4. Добавить файл `common-local.php` в папку `config` c 
параметрами подключения к БД (логин, пароль и, при
необходимости, имя БД, созданной на третьем шаге).
Например:

        <?php
    
        return [
            'components' => [
                'db' => [
                    'username' => 'root',
                    'password' => 'some_password',
                ],
            ],
        ];
        
5. Выполнить `php migrate` и подтвердить выполнение миграции

6. Добавить новую конфигурацию в веб-сервер, указав в качестве
корневой папки папку web в папке проекта.

# Запуск тестов
1. В папке проекта выполнить `./vendor/bin/codecept build`
2. Там же выполнить `./vendor/bin/codecept run`

# Работа в консоли
Запуск сервиса в консоли осуществляется следующей командой
 в папке проекта: `php app divide-array array number`, где
 вместо `array` передается массив, а вместо `number`
 передается искомое число в массиве. Например:
 `php app divide-array [1,2,3,4] 1`

# Работа с REST API
Аутентификация осуществляется по AccessToken. В проекте 
создан пользователь с токеном 777. Для запуска сервиса
необходимо перейти по адресу
`site.local/index.php?r=divide-array&access-token=777&array=target_array&number=target_number`
где:
- `site.local` - имя сайта на веб-сервере, созданного при установке
- `target_array` - обрабатываемый массив
- `target_number` - искомое число в массиве

В ответ будет возвращено число, соответствующее условиям
задачи, в JSON-формате. 