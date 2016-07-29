#Enact CMS Demo Site - Game of Thrones

To get started:

1. Clone this repo to a directory on your local machine where you will serve it from (we will use `/var/www/`.
  ```

  git clone https://github.com/webyoke/game-of-thrones.git /var/www/gameofthrones

  ```
2. Download the latest version of Enact [here](https://enactcms.com/download). Unzip it anywhere on your machine
   and move the `enact/app` directory to the `enact` directory in the site.
  ```

  unzip enact-1.0.zip -d enact
  cd enact
  mv enact/app /var/www/gameofthrones/enact/app

  ```
3. Create a configuration file for Apache for serving the demo site.
  ```

  <VirtualHost *:80>
      ServerAdmin your@email.com 
      ServerName  gameofthrones.localhost
      
      # Index file and Document Root (where the public files are located)
      DirectoryIndex index.php
      DocumentRoot /var/www/gameofthrones/public/
      
      <Directory /var/www/gameofthrones/public/>
      Options FollowSymLinks 
      AllowOverride All
      Order allow,deny
      allow from all
      Require all granted
      </Directory>
  
  </VirtualHost>

  ```
4. Add an entry for the site in your `/etc/hosts` file.
  ```

  127.0.0.1 gameofthrones.localhost

  ```
5. Create the database schema for the site using your favorite MySQL interface or via the command line.
  ```

  mysql -u root -p"yourpassword" -e "CREATE DATABASE GAMEOFTHRONES"

  ```
6. Import the dump of the database (run from the root of your site).
  ```

    sudo php public/index.php enactRestoreDBFromLatestBackup

  ```
7. Change the admin password (run from the root of your site).
  ```
    sudo php public/index.php setPassword 'support@webyoke.com' 'your-password'
  ```
8. Enter/edit your database credentials in `enact/config/db.php`.
9. Access your site via `gameofthrones.localhost`, if there are problems/permission errors Enact will let you know.
10. You can access the control panel via `gameofthrones.localhost/admin/login` the usename is `admin` and the
   password is what you set in step 7. 
11. Have fun :]!
