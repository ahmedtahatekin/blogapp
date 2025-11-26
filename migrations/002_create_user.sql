CREATE USER 'user_blogapp'@'%' IDENTIFIED BY 'blogapp_user1234?*';

GRANT ALL PRIVILEGES ON db_blogapp.* TO 'user_blogapp'@'%';

FLUSH PRIVILEGES;
