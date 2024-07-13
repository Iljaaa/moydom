# moydom
test task for moydom company

Работает на стаке laravel, sqlite, react (ts)

Авторизизация работает на основе JWT токена, на основе пакета tymon/jwt-auth

В рамках тестового задания я не стал выносить обертку вокруг апи в отдельный пакет.

Пользователи создаются при помози сидов  
test@example.com:secret  
test2@example.com:secret2  
test3@example.com:secret3  
test4@example.com:secret4  
test5@example.com:secret5

Клиентская часть дополнительно использует react-router и react-redux

До полноценного приложения надо еще добавить:
- Возможность продлевать токен когда он протух
- Возможность разлогиниться
- Выводить информацию о том что количество запросов по токену исчерпано