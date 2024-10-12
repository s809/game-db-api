## game-db-api

Выполнение миграций в БД:
```
php artisan migrate
```
Запуск:
```
php artisan serve
```

Пути запросов:
```
GET /developers - Получить всех разработчиков
POST /developers - Создать нового разработчика
GET /developers/{id} - Получить информацию о конкретном разработчике
PATCH /developers/{id} - Обновить информацию о конкретном разработчике
DELETE /developers/{id} - Удалить конкретного разработчика

GET /genres - Получить все жанры
POST /genres - Создать новый жанр
GET /genres/{id} - Получить информацию о конкретном жанре
PATCH /genres/{id} - Обновить информацию о конкретном жанре
DELETE /genres/{id} - Удалить конкретный жанр

GET /games - Получить все игры
POST /games - Создать новую игру
GET /games/{id} - Получить информацию о конкретной игре
PATCH /games/{id} - Обновить информацию о конкретной игре
DELETE /games/{id} - Удалить конкретную игру
GET /games/by-genre/{id} - Получить игры по жанру
```
