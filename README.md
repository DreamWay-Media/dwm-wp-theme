## Installation

### Requirements

- [Docker](https://www.docker.com/get-started/)
- [MySQL Database Export](https://drive.google.com/file/d/13TnXG9MzweNhtrccyi1o8RwS0TPDK00h/view)
- [Uploads]([dreamwaymedia.com/wp-content/uploads.zip](http://dreamwaymedia.com/wp-content/uploads.zip))
- [Plugins]([dreamwaymedia.com/wp-content/plugins.zip](http://dreamwaymedia.com/wp-content/plugins.zip))

### Setup

#### **Step 1: Install Docker and WordPress Locally**
1. **Install Docker**
	[Docker Installation Guide](https://docs.docker.com/desktop/?_gl=1*xj8wza*_gcl_au*MTgxODIyMzIxMy4xNzI3ODk1Njkw*_ga*MTg1ODI5ODQwMS4xNzI2OTgzMjI5*_ga_XJWPQMJYHQ*MTcyNzg5NTY4OS4yLjEuMTcyNzg5NjUwNi42MC4wLjA.)

2. **Create a `docker-compose.yml` File** In the root of your project (or a dedicated folder for your WordPress site), create a file named `docker-compose.yml` with the following contents:
	```
	services:

	wordpress:

	image:  wordpress:latest

	container_name:  wordpress

	ports:

	-  "8000:80"

	environment:

	WORDPRESS_DB_HOST:  db:3306

	WORDPRESS_DB_USER:  root

	WORDPRESS_DB_PASSWORD:  yourpassword

	WORDPRESS_DB_NAME:  wordpress

	volumes:

	-  ./wordpress:/var/www/html

	-  ./custom-php.ini:/usr/local/etc/php/conf.d/custom-php.ini

	depends_on:

	-  db

	networks:

	-  app-network

	  

	phpmyadmin:

	image:  arm64v8/phpmyadmin  # Use 'phpmyadmin/phpmyadmin' if not on Apple Silicon (ARM)

	container_name:  phpmyadmin

	environment:

	PMA_HOST:  db

	MYSQL_ROOT_PASSWORD:  yourpassword

	ports:

	-  "8080:80"

	volumes:

	-  ./custom-php.ini:/usr/local/etc/php/conf.d/custom-php.ini

	depends_on:

	-  db

	networks:

	-  app-network

	  

	db:

	image:  mysql:8.0

	container_name:  db

	environment:

	MYSQL_ROOT_PASSWORD:  yourpassword

	MYSQL_DATABASE:  wordpress

	volumes:

	-  db_data:/var/lib/mysql

	networks:

	-  app-network

	  

	volumes:

	db_data:

	  

	networks:

	app-network:

	driver:  bridge
	```
	#### Note:
	- On **ARM-based systems** (like Apple Silicon), you'll need to use the `arm64v8/phpmyadmin` image, as you have done.
	- On **x86_64-based systems**, you would use `phpmyadmin/phpmyadmin`.

3. **Create a Custom `php.ini` File** 
In the root of your project directory, create a `custom-php.ini` file to increase the upload size and adjust memory settings. 
Add the following contents:<br>```ini ; Increase upload size limits upload_max_filesize = 32M post_max_size = 32M max_execution_time = 300 max_input_time = 300 memory_limit = 256M ``` 

	This file ensures that WordPress can handle larger uploads and have sufficient memory to process large operations.

4. **Start the Docker Containers**
		After setting up the Docker compose file and custom `php.ini`, start the Docker containers by running:
	`docker-compose up -d`
	
	This will pull the necessary Docker images and set up WordPress and MySQL.

6. **Access WordPress**
	After the containers are up, you can access your WordPress site at: http://localhost:8000

7. **Access phpMyAdmin**
	phpMyAdmin will be available at: http://localhost:8080
	
	You can use phpMyAdmin to manage your MySQL database. The login credentials are:
	-   Username: `root`
	-   Password: `yourpassword`

#### Step 2: Set Up the WordPress Theme
Once WordPress is running locally, follow these steps to install the theme:

1. **Clone the Repository into the `wp-content/themes` Directory**  
In your WordPress Docker setup, the `wp-content` directory is mapped to your local filesystem. Navigate to your WordPress `wp-content/themes` directory and clone this repository:
	```
	cd /path/to/your-wordpress-installation/wp-content/themes
	git clone https://github.com/DreamWay-Media/dwm-wp-theme.git
	```
2. **Store Uploads and Plugins folders**
	After extracting the zip files, store the `Uploads` and `Plugins` directories in `wp-content`.

#### Step 3: Import the MySQL Database
1. **Place the Database File**
	Place the MySQL database export file (`thisiswh_db_dev_dreamway.sql`) in the root of your project directory.
	
2. **Access the MySQL Container**
	Once inside the MySQL container, log into MySQL using the root credentials:
	`mysql -u root -pyourpassword`
	
3. **Use the WordPress Database**
	Tell MySQL to use the WordPress database:
	`USE wordpress;`
	
4. **Insert a new Admin User**
	Run the following SQL command to insert a new user with admin privileges:<br>`INSERT INTO wp_users (user_login, user_pass, user_nicename, user_email, user_url, user_registered, user_status, display_name)
VALUES ('admin', MD5('yourpassword'), 'Admin', 'admin@example.com', 'http://localhost', NOW(), 0, 'Admin');`
This command creates a new user named `admin` with the password `yourpassword` (replace this with your actual values).

5. **Assign Administrator Role**
	Next, assign the new user the administrator role by inserting the necessary records into the `wp_usermeta` table:<br>`INSERT INTO wp_usermeta (user_id, meta_key, meta_value)
VALUES ((SELECT ID FROM wp_users WHERE user_login = 'admin'), 'wp_capabilities', 'a:1:{s:13:"administrator";b:1;}');`

	`INSERT INTO wp_usermeta (user_id, meta_key, meta_value)
VALUES ((SELECT ID FROM wp_users WHERE user_login = 'admin'), 'wp_user_level', '10');`

6. **Exit MySQL**
	`exit;`

7. **Log in to WordPress Admin**
	Now, go to `http://localhost:8000/wp-admin` and log in with the username `admin` and the password you set in Step 4. You should now have full administrator access to the WordPress dashboard.

#### Step 4: Access WordPress Admin and Activate the Theme:
1. **Activate the Theme**
	Once the theme is cloned, the database is imported, and have created admin credentials, log in to your WordPress admin dashboard at http://localhost:8000/wp-admin and go to **Plugins** to and activate each of them. Then go to **Appearance > Themes** to activate the theme.

### Happy developing!

## Common Issues and Quick Fixes

Here are some common issues you may encounter during installation, along with quick fixes:

1.  **Docker Containers Fail to Start**:
    
    -   **Issue**: Containers fail to start after running `docker-compose up -d`.
    -   **Fix**: Run `docker-compose logs` to check the logs for errors. Often, incorrect configuration in the `docker-compose.yml` file or insufficient permissions can cause issues. Ensure the `docker-compose.yml` file is correctly formatted and all services are correctly defined.
2.  **WordPress Site Shows 'Error Establishing a Database Connection'**:
    
    -   **Issue**: This error occurs when WordPress is unable to connect to the MySQL database.
    -   **Fix**: Double-check the `WORDPRESS_DB_HOST`, `WORDPRESS_DB_USER`, and `WORDPRESS_DB_PASSWORD` values in the `docker-compose.yml` file. Ensure the MySQL container is running by using `docker ps`. If everything seems correct, ensure your database credentials match those in the `wp-config.php` file.
3.  **Cannot Access phpMyAdmin**:
    
    -   **Issue**: phpMyAdmin is not accessible at `http://localhost:8080`.
    -   **Fix**: Make sure the `phpmyadmin` service is defined in your `docker-compose.yml` file. If the container isn't running, check the logs with `docker-compose logs phpmyadmin` to find the cause. Ensure you are using the correct image for your system (e.g., `arm64v8/phpmyadmin` for Apple Silicon).
4.  **Memory Limit or File Upload Limit Issues**:
    
    -   **Issue**: You are unable to upload large files or encounter memory limit issues in WordPress.
    -   **Fix**: Verify that the `custom-php.ini` file has been created and contains the appropriate configuration for `upload_max_filesize`, `post_max_size`, and `memory_limit`. Ensure this file is correctly mapped in the `docker-compose.yml` under the WordPress and phpMyAdmin services.
5.  **WordPress Admin Login Fails (Wrong Password)**:
    
    -   **Issue**: You cannot log in to the WordPress admin dashboard even after creating the admin user.
    -   **Fix**: Recheck the SQL commands you used to create the admin user and ensure you are using the correct credentials. If necessary, rerun the SQL command to reset the password using `MD5()`.
6.  **MySQL Container Has Too Much Memory Usage**:
    
    -   **Issue**: MySQL may consume too much memory, causing performance issues.
    -   **Fix**: You can adjust the memory limits in the `docker-compose.yml` file by adding the `mem_limit` option under the `db` service like this:
	```
	db:
	  image: mysql:8.0
	  container_name: db
	  environment:
	    MYSQL_ROOT_PASSWORD: yourpassword
	    MYSQL_DATABASE: wordpress
	  volumes:
	    - db_data:/var/lib/mysql
	  networks:
	    - app-network
	  mem_limit: 512m
	  ```

	-   This limits the MySQL container to a maximum of 512MB of memory.
    
7.   **Permission Issues with wp-content**:
    
	    -   **Issue**: WordPress cannot write to the `wp-content` folder (e.g., for media uploads).
	    -   **Fix**: Ensure that the `wp-content` folder has the correct permissions. Run the following command in your project root:<br>`sudo chown -R www-data:www-data wordpress/wp-content`

8. **Error Importing MySQL Database**:

	-   **Issue**: Importing the MySQL database results in errors.
	-   **Fix**: Ensure that the SQL dump file is not corrupted and contains valid SQL statements. If the file is too large, you might want to adjust the memory limits in the `php.ini` or use the MySQL command line for importing large databases:<br>`docker exec -i db mysql -u root -pyourpassword wordpress < /path/to/your-database.sql`

## How to Use `docker-compose down` and `docker-compose up -d`

Docker Compose is a powerful tool for managing multi-container Docker applications. During the development and setup process, you'll frequently need to start and stop your containers. Here are quick guides on how to do that:

#### **1. Bringing Containers Down (Stopping and Removing Containers)**

The command `docker-compose down` stops and removes all the containers defined in your `docker-compose.yml` file. This is useful when you want to completely stop the environment or when you make significant changes to the setup.
**Usage**: 
`docker-compose down`

**What It Does**:

-   Stops all running containers defined in the `docker-compose.yml`.
-   Removes stopped containers (so you don’t accumulate unused containers).
-   Removes associated networks and volumes unless they are defined as external or shared.

**Common Scenario**:

-   You made changes to the `docker-compose.yml` file, such as changing environment variables or service configurations. After running `docker-compose down`, you can start everything fresh with `docker-compose up -d`.

#### **2. Bringing Containers Up (Starting in Detached Mode)**

The command `docker-compose up -d` starts the containers defined in your `docker-compose.yml` file. The `-d` flag means "detached mode," which allows the containers to run in the background without blocking your terminal.

**Usage**:
`docker-compose up -d`

**What It Does**:

-   Starts all containers in the background.
-   Builds images if they don't exist locally.
-   Sets up volumes, networks, and any dependencies.
-   Allows you to continue using your terminal while the containers run.

**Common Scenario**:

-   After setting up your containers, you use `docker-compose up -d` to launch WordPress, MySQL, and phpMyAdmin without blocking your terminal. You can then access the services in your browser.

#### **Restarting Containers**

If you need to restart the containers after making small changes (like updating your theme or plugins), you can combine both commands.

**Step 1: Stop and Remove Containers**:
`docker-compose down`

**Step 2: Start the Containers Again in Detached Mode**:
`docker-compose up -d`

This workflow ensures that all your containers are restarted cleanly, applying any changes in the configuration files.

#### **Troubleshooting Tips**

-   **Viewing Logs**: If you need to check what's happening inside the containers after running `docker-compose up -d`, you can view the logs with:
`docker-compose logs`

	This will show the logs of all containers. To view the logs of a specific container, use:
`docker-compose logs <service_name>`

**Rebuilding Containers**: If you have made changes to your Dockerfile or `docker-compose.yml`, you may need to rebuild the containers:
`docker-compose up -d --build`

**Stopping All Containers Without Removing Them**: If you want to stop the containers without removing them (so that their state is preserved), use:
`docker-compose stop`