# Employee Management System
## Steps to install the project 
### 1. Download or clone the project to local server directory
### 2. Create a database named "employee_management_system"
### 3. To install the project 
        composer install
### 4. Rename .env.example file to .env
### 5. To generate application key
        php artisan key:generate
### 6. To clear the configuration and route cache
        php artisan config:cache
        php artisan route:cache
### 7. To migrate tables and seed dummy data      
        php artisan migrate:fresh --seed
### 8. Create a folder named "public" in "storage/app/" folder        
### 9. To create the symbolic link   
        php artisan storage:link   
####  Make sure you are configured the SMTP configuration in the .env file for sending mail  
### 10. To run the application
        php artisan serve
### 11. Go to browser and enter the url "http://localhost:8000/"       
