<?php

/*
change according your own setup
your database must contain users & shares tables
> users: id(INT(autoincrement)), name(varchar(255)), email(varchar(255)), 
password(varchar(255)), register_date(datetime(default(current_timestamp)))
> shares: id(INT(autoincrement)), user_id(int), title(varchar(255)),
body(text), link(varchar(255)), create_date(datetime(default(current_timestamp)))
*/

// define db params
define("DB_HOST", ""); // i.e localhost:8080
define("DB_USER", ""); // i.e root
define("DB_PASS", ""); // i.e password
define("DB_NAME", ""); // i.e shareboard

// define URLs
define("ROOT_PATH", "/shares/");
define("ROOT_URL", "http://localhost:9090/shares/");