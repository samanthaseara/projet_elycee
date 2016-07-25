#!/usr/bin/env bash
USERNAME='root'
PASSWORD=''
DBNAME='db_blogphp'
HOST='localhost'

USER_USERNAME='reira'
USER_PASSWORD='reira'

MySQL=$(cat <<EOF
DROP DATABASE IF EXISTS $DBNAME;
CREATE DATABASE $DBNAME DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
DELETE FROM mysql.user WHERE user='$USER_USERNAME' and host='$USER_PASSWORD';
GRANT ALL PRIVILEGES ON $DBNAME.* to '$USER_USERNAME'@'$HOST' IDENTIFIED BY '$USER_PASSWORD' WITH GRANT OPTION;
EOF
)
echo $MySQL | mysql --user=$USERNAME --password=$PASSWORD

php artisan migrate --seed
echo "ok tous est bon"

if [ ! -d ./node_module ]; then
    npm install --save-dev gulp
    npm install --save-dev gulp-sass
    npm install --save-dev gulp-minify-css
    npm install --save-dev gulp-concat
    npm install --save-dev gulp-rename
    npm install --save-dev gulp-uglify
else
    echo "cool c'est déjà fait"
fi

if [ ! -f gulp.js ]; then
    touch gulp.js
else
    echo "gulp ok"
fi