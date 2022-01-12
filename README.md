# Employee Management System
## Steps to install the project 
### 1. Download or clone the project to local server directory
### 2. Create a database named "employee_management_system"
### 3. To install the project 
        composer install
### 5. Rename .env.example file to .env
### 4. To generate application key
        php artisan key:generate
### 4. To clear the configuration and route cache
        php artisan config:cache
        php artisan route:cache
### 5. To migrate tables and seed dummy data      
        php artisan migrate:fresh --seed
### 6. To create the symbolic link   
        php artisan storage:link     
### 6. To run the application
        php artisan serve
### 7. Go to browser and enter the url "http://localhost:8000/"       
