# Shares (mini php app)

This is a nano-mvc based application using php oop

built after [this course](https://www.udemy.com/learn-object-oriented-php-by-building-a-complete-website)

## Setup

* requirements:
  - php 5.6.31+
  - apache2 server
  - mysql

  _OR_ just using [bitnami lampstack](https://bitnami.com/stack/lamp)

* config:
  - rename _config-sample.php_ to _config.php_ and put your specific configurations

* Database:
  - your database must contain users & shares tables
  > users: id(INT(autoincrement)), name(varchar(255)), email(varchar(255)), 
  password(varchar(255)), register_date(datetime(default(current_timestamp)))
  > shares: id(INT(autoincrement)), user_id(int), title(varchar(255)),
  body(text), link(varchar(255)), create_date(datetime(default(current_timestamp)))

**This is a beta version, I welcome any pull requests and suggestions**