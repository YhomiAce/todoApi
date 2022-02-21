<h3>TODO CRUD API</h3>

### Note: Make sure you have git installed locally on your computer first.

#### Application Setup process
##### git clone https://github.com/YhomiAce/bookApi.git
##### cd into your project
##### Install Composer Dependencies with "composer install"
##### Create a copy of your .env file with "cp .env.example .env"
##### Generate an app encryption key with "php artisan key:generate"
##### Create an empty database for our application
##### In the .env file, add database information to allow Laravel to connect to the database
##### Migrate the database with "php artisan migrate"
##### Start application with "php artisan serve"

### Requirement 1

###### Query Ice and Fire Api: /api/external-books?name=nameOfBook : GET

### Requirement 2

##### Get all books: /api/books :GET
##### Create books: /api/books :POST
##### Read a book: /api/books/id :GET
##### Update a book: /api/books/id :PATCH
##### Delete a book: /api/books/id :DELETE

### Requirement 3

##### Front end built with React

##### Application Setup process
###### git clone https://github.com/YhomiAce/book_frontend.git
###### cd into your project
###### npm install
###### Go Into the src/context/BookState.js change the URL to the url your local server is running
###### Go Into the src/components/Books/EditBook.js change the URL to the url your local server is running
###### run "npm start" to start testing the requirement 3 functionality
