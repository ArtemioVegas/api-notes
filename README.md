# Сервис обмена заметками #
## Примеры использования ##
### Пользователи ###
#### Создать пользователя #### 
```bash
curl -s http://crudnotes.localhost/users \
    --user admin:admin \
    --data '{"username":"username","fullname":"fullname"}' \
    --request POST
```
#### Получить пользователя #### 
```bash
curl -s http://notes.loc/users/11 \
    --user admin:admin \
    --request GET
```
#### Обновить пользователя #### 
```bash
curl -s http://notes.loc/users/11 \
    --user admin:admin \
    --data '{"fullname":"Ben Davis"}' \
    --request PUT
```
#### Удалить пользователя #### 
```bash
curl -s http://crudnotes.localhost/users/11 \
    --user admin:admin \
    --request DELETE
```
#### Список пользователей ####
```bash
curl -s http://notes.loc/users \
    --user admin:admin \
    --request GET
```
### Заметки ###
#### Создать заметку ####
```bash
curl -s http://notes.loc/notes \
    --user note:note \
    --data '{"i_am":"username_1","title":"title","body":"body"}' \
    --request POST
```
#### Получить заметку #### 
```bash
curl -s http://notes.loc/notes/11 \
    --user note:note \
    --data '{"i_am":"username_1"}' \
    --request GET
```
#### Обновить заметку #### 
```bash
curl -s http://notes.loc/notes/3 \
    --user note:note \
    --data '{"i_am":"username_7","title":"Trin Des","body":"bla bla bla bla"}' \
    --request PUT
# или поделиться с доступом на запись
curl -s http://notes.loc/notes/3 \
    --user note:note \
    --data '{"i_am":"username_5","title":"TrinGoDes","body":"tor des qua isen true"}' \
    --request PUT
```
#### Удалить заметку #### 
```bash
curl -s http://notes.loc/notes/10 \
    --user note:note \
    --data '{"i_am":"username"}' \
    --request DELETE
```
#### Список заметок ####
```bash
curl -s http://notes.loc/notes \
    --user note:note \
    --data '{"i_am":"username_3"}' \
    --request GET
```
#### Доступные заметки ####
```bash
curl -s http://notes.loc/notes/available \
    --user note:note \
    --data '{"i_am":"username_2","access":"read"}' \
    --request GET
```
#### Поделиться заметкой ####
```bash
curl -s http://notes.loc/notes/5/share \
    --user note:note \
    --data '{"i_am":"username_2","access":"read","usernames":["username_3","username_4"]}' \
    --request PUT
```
#### Отмена деления заметкой ####
```bash
curl -s http://notes.loc/notes/5/share \
    --user note:note \
    --data '{"i_am":"username_2","access":"read","usernames":["username_3","username_4"]}' \
    --request DELETE
```