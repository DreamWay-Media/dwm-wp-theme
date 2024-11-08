# Installation

## Requirements

- [Docker](https://www.docker.com/get-started/)

## Setup

### **Step 1: Install Docker and WordPress Locally**
1. **Install Docker**
	[Docker Installation Guide](https://docs.docker.com/desktop/?_gl=1*xj8wza*_gcl_au*MTgxODIyMzIxMy4xNzI3ODk1Njkw*_ga*MTg1ODI5ODQwMS4xNzI2OTgzMjI5*_ga_XJWPQMJYHQ*MTcyNzg5NTY4OS4yLjEuMTcyNzg5NjUwNi42MC4wLjA.)

2. **Create a `docker-compose.yml` File** In the root of your project (or a dedicated folder for your WordPress site)

3. **Create a Custom `php.ini` File** 
In the root of your project directory, create a `custom-php.ini` file to increase the upload size and adjust memory settings.

4. **Start the Docker Containers**
		After setting up the Docker compose file and custom `php.ini`, start the Docker containers by running:
	`docker-compose up -d`

6. **Access WordPress**
	After the containers are up, you can access your WordPress site at: http://localhost:8000

7. **Access phpMyAdmin**
	phpMyAdmin will be available at: http://localhost:8080
	
	You can use phpMyAdmin to manage your MySQL database. The login credentials are:
	-   Username: `root`
	-   Password: `yourpassword`

### Step 2: Set Up the WordPress Theme
Once WordPress is running locally, follow these steps to install the theme:

1. **Clone the Repository into the `wp-content/themes` Directory**  
In your WordPress Docker setup, the `wp-content` directory is mapped to your local filesystem. Navigate to your WordPress `wp-content/themes` directory and clone this repository:
	```
	cd /path/to/your-wordpress-installation/wp-content/themes
	git clone https://github.com/DreamWay-Media/dwm-wp-theme.git
	```
2. **Store Uploads and Plugins folders**
	After extracting the zip files, store the `Uploads` and `Plugins` directories in `wp-content`.

### Step 3: Import the MySQL Database
1. **Place the Database File**
	Place the MySQL database export file (`thisiswh_db_dev_dreamway.sql`) in the root of your project directory.
	
2. **Access the MySQL Container**
	Once inside the MySQL container, log into MySQL using the root credentials:
	`mysql -u root -pyourpassword`
	
3. **Use the WordPress Database**
	Tell MySQL to use the WordPress database:
	`USE wordpress;`
	
4. **Insert a new Admin User**
	Run the following SQL command to insert a new user with admin privileges:<br>
```
INSERT INTO wp_users (user_login, user_pass, user_nicename, user_email, user_url, user_registered, user_status, display_name)
VALUES ('admin', MD5('yourpassword'), 'Admin', 'admin@example.com', 'http://localhost', NOW(), 0, 'Admin');
```
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

### Step 4: Access WordPress Admin and Activate the Theme:
1. **Activate the Theme**
	Once the theme is cloned, the database is imported, and have created admin credentials, log in to your WordPress admin dashboard at http://localhost:8000/wp-admin and go to **Plugins** to and activate each of them. Then go to **Appearance > Themes** to activate the theme.

### Step 5: Development with Sass
To ensure consistency with styling, this project uses SCSS with npm and Sass for development. Follow these steps to set up and compile SCSS files.

#### Step 1: Install Dependencies
1. **Install Node.js and npm** If you don’t already have Node.js and npm installed, download and install from [Node.js](https://nodejs.org/en).

2. **Install Sass Dependencies** In your themes root directory, run:

```npm install```

#### Step 2: SCSS Development Commands
The following commands will allow you to compile SCSS files into CSS:

1. **Watch for SCSS Changes** (during development) Run this command to automatically recompile SCSS to CSS as you make changes:

```npm run sass```

2. **Build for Production** (compressed/minified CSS) When ready for deployment, use this command to generate a minified version of `style.css`:

```npm run build-css```

#### Step 3: Working with CSS Files
- **SCSS Structure**: All SCSS files are located in the scss directory, organized into subdirectories for base styles, components, pages, and templates.
- **File Imports**: The main scss/style.scss file imports all other SCSS files, which are then compiled into style.css.

#### Step 4: Updating CSS:
After making SCSS updates, recompile CSS with:

```npm run sass```

**Note**: Avoid editing `style.css` directly; all style changes should be made in SCSS files to ensure consistency.
### Happy developing!