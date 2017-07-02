# The Bowling Game Kata

## Intro
This project is a test done for a job interview ([here](https://drive.google.com/open?id=0ByXmFgIjxP1DMThaYnhSbXZDRlV5T0dDZkRVMmpPRDdXTjRB) are the instructions).

I didn't do the twitter integration because I did't have enough time (I only had a few days).


## Website
It's hosted on a DigitalOcean VPS. This is the address: [bowling-game-kata.com](http://bowling-game-kata.com)


## Frontend
The frontend is done with [Polymer](https://www.polymer-project.org/).
I started from the [Polymer Starter Kit](https://github.com/PolymerElements/polymer-starter-kit).
The files are served using the [polymer-cli](https://www.polymer-project.org/2.0/docs/tools/polymer-cli)


## Backend
The backend is just two simple php scripts that make sql query to save/get data from a MySQL database.
For the connection and queries I used [mysqli](http://php.net/manual/en/book.mysqli.php).


## Environment Setup
```
# Create user
adduser user
usermod -aG sudo user

# Install git
apt-get install git-core

# Install node
wget https://deb.nodesource.com/setup_8.x
cat setup_8.x  | sudo -E bash -
apt-get install -y nodejs

# Install npm packages
npm install -g bower
npm install -g polymer-cli@next

# Instal mysql:
apt-get install mysql-server
mysql_secure_installation

# Execute the following sql command (mysql -p -u root)
CREATE USER 'user'@'%' IDENTIFIED BY 'password';
GRANT ALL PRIVILEGES ON *.* TO 'user'@'%' WITH GRANT OPTION;
FLUSH PRIVILEGES;
CREATE SCHEMA `bowling` DEFAULT CHARACTER SET utf8;

# Remove line ‘bind-address = 127.0.0.1’ from /etc/mysql/my.cnf

# Restart mysql server
service mysql restart

# Install apache 
apt-get install apache2
apt-get install php5 php-pear php5-mysql
service apache2 restart

# Set “Listen 8080” in /etc/apache2/ports.conf
# Change port and path in /etc/apache2/sites-enabled/000-default.conf

# Restart apache
service apache2 restart

# Change /etc/apache2/sites-available/000-default.conf
<VirtualHost *:8080>
        DocumentRoot /var/www/bowling

        <Directory /var/www/bowling>
                Options -Indexes
        </Directory>

        ErrorLog ${APACHE_LOG_DIR}/error.log
        CustomLog ${APACHE_LOG_DIR}/access.log combined
</VirtualHost>

# Go into the frontend folder and install the frontend dependencies
cd /{path of the project}/frontend
bower install
```

