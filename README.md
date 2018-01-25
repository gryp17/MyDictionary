# MyDictionary
Basic AngularJS dictionary app that uses a PHP backend. It uses custom MVC PHP backend (the same one used in [Tablaturi-BG](https://github.com/gryp17/Tablaturi-bg-AngularJS)) with MySQL database and AngularJS v1.5 as front end.
It doesn't use any CSS preprocesors, build tools or dependency managers because I couldn't be bothered with them for such a small project.

## Installation

1. Import the database schema and data
  
  > [/db.sql](https://github.com/gryp17/MyDictionary/blob/master/db.sql)

## Configuration

1. Backend

  The backend configuration file is located in

  > [/API/config/Config.php](https://github.com/gryp17/MyDictionary/blob/master/API/config/Config.php)

  It contains the default database credentials.

2. .htaccess

  Change the RewriteBase rule based on your domain path.
  
  The .htaccess file is located in the root directory of the project
  
  > [/.htaccess](https://github.com/gryp17/MyDictionary/blob/master/.htaccess)
  
  Examples:

  ```apache
  #http://my-dictionary.com
  RewriteBase /
  ```
  
  ```apache
  #localhost/MyDictionary
  RewriteBase /MyDictionary
  ```
  
3. AngularJS html5 mode

  Change the ```<base>``` tag content based on your domain path.
  
  The tag is in the ```<head>``` of the main layout file
  
  > [/app/views/layout.php](https://github.com/gryp17/MyDictionary/blob/master/app/views/layout.php)
    
  Examples:
  
  ```html
  <!-- http://my-dictionary.com -->
  <base href="/" />
  ```
  
  ```html
  <!-- localhost/MyDictionary -->
  <base href="/MyDictionary/" />
  ```



