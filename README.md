# ITEMS REST API BY RAIHAN RAFID

## INSTALLATION

After finished cloning the project:
1. Make sure you have composer and php installed in your computer
2. Open project using VS Code, go to the terminal and type "composer install"
3. Set your detailed .env configuration according to your database
4. After database connected, go to the terminal and type "php artisan migrate", and your database automatically inserted with tables that needed.
5. Run application by typing in the terminal "php -S localhost:8000 -t public"

## API URL LIST

* Using Postman and Local URL

GET METHOD
1. Get all items (http://localhost:8000/items)
2. Get items based on name or code (http://localhost:8000/items/{codeOrName})
   Example: http://localhost:8000/items/123456789111 -> returns data if exist, else given not found message
3. Get an item by code (http://localhost:8000/item/{code})
   Example: http://localhost:8000/item/123456789111 -> returns data if exist, else given not found message
4. Deleting an item (http://localhost:8000/delete/{code})
   Example: http://localhost:8000/delete/123456789111 -> returns delete success notification if there is an item with the code given
   
POST METHOD

5. Creating new item (http://localhost:8000/create)
   Example: In Postman go to the body section and then form-data and send 2 key: name and description with their values -> return create success notification if there is no        duplication
6. Updating an item (http://localhost:8000/update)
   Example: In Postman go to the body section and then form-data and send 3 key: code, name and description with their values -> return update success notification if there is      an item with the code given

   
   



