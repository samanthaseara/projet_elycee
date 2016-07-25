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