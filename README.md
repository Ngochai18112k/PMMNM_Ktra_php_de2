# Web cafe management system with pure PHP

## Step to install project

### Step 1: Clone code 
``` 
git clone https://github.com/Ngochai18112k/PMMNM_Ktra_php_de2.git
```

### Step 2: Change config database
In file Covid/src/database/sql_conn.php change your account to connect MySQL
```
<?php
    $servername = "localhost";
    $username   = "USER_NAME";
    $password   = "USER_PASSWORD";
    $dbname     = "DB_NAME";
?>
```

### Step 3: Load seeder
You load Cafe/src/database/data.sql in your <b>Phpmyadmin</b> or your <b>MySQL CLI</b>
```
CREATE DATABASE DB_NAME;
```
```
USE DB_NAME;
```
```
SOURCE path_to_your_folder/Covid/src/database/data.sql;
```

### Step 4: Go to <a href="localhost/covid">page</a>

### Step 5: Login with account
```
username: admin
password: password
```

