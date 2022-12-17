execute this command in root directory 
```
./vendor/bin/sail build
./vendor/bin/sail up -d
./vendor/bin/sail composer install
./vendor/bin/sail npm install install
./vendor/bin/sail php artisan migrate --seed
```
В сидах 2 роли, 20 пользователей(случайных), 100 заявок(случайных), 4 категории

Прописанные тестовые пользователи
````
client@test.com

lawyer@test.com

lawyer2@test.com 
пароли password
````

После авторизации доступен раздел с заявками. У клиента свой, у юриста свой
