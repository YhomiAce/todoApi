<h3>TODO CRUD API</h3>

### Note: Make sure you have git installed locally on your computer first.

#### Application Setup process
##### git clone https://github.com/YhomiAce/todoApi.git
##### cd into your project
##### Install Composer Dependencies with "composer install"
##### Create a copy of your .env file with "cp .env.example .env"
##### Generate an app encryption key with "php artisan key:generate"
##### Create an empty database for our application
##### In the .env file, add database information to allow Laravel to connect to the database
##### Migrate the database with "php artisan migrate"
##### Start application with "php artisan serve"


### CRUD TODO

##### Get all todos: /api/todos :GET
##### Create todos: /api/todos :POST
##### Read a todo: /api/todos/id :GET
##### Update a todo: /api/todos/id :PATCH
##### Delete a todo: /api/todos/id :DELETE

##### Front end built with React
###### Github Repos: https://github.com/YhomiAce/TodoUI

###### Online URL Backend: https://serene-ravine-67977.herokuapp.com/api/todos
###### Online URL Frontend: https://react-laravel-todo.netlify.app
