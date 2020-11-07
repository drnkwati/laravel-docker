
## laravel-docker

### Installation
1. Install and setup docker and docker-compose on your pc or server.
2. Open a terminal or command window.
3. Clone this repository and change your directory to the newly created project. On windows the command is: 
- cd laravel-docker
4. Build the images and start all containers by issueing the following command 
- docker-compose up -d
5. Run the following command to generate app key 
- docker-compose exec app php artisan key:generate
6. Run the following command to cache app settings into a file, which will boost your application’s load speed 
- docker-compose exec app php artisan config:cache

### Creating a User for MySQL
1. To create a new database user, execute an interactive bash shell on the db container with 
- docker-compose exec db bash
2. Inside the container, log into the MySQL root account: You will be prompted for the MySQL root password.
- mysql -u root -p
3. Create a user account that will be allowed to access this database. Just be sure that your username and password here match the details you set in your .env file.
- GRANT ALL ON laravel.* TO 'laraveluser'@'%' IDENTIFIED BY 'laravelpass';
- FLUSH PRIVILEGES;
- EXIT;
- exit

### Migrating, Seed Data and Working with the Tinker Console
- docker-compose exec app php artisan migrate
- docker-compose exec app php artisan db:seed
- docker-compose exec app php artisan tinker
- \DB::table('migrations')->get();

### Visit http://your_server_ip in the browser. To see the home page for your app:
- http://localhost:80

### Visit http://your_server_ip:4551 in the browser. To see the home page for ngrok:
- http://localhost:4551


