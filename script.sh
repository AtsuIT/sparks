#!/bin/bash

cd /home/sparks/public_html 

echo '------ workdir /home/sparks/public_html ----------'
echo '------ artisan migrate ----------'

php artisan migrate --no-interaction

echo '------ artisan migrate succeded ----------'
echo '------ artisan optimize ----------'

php artisan optimize:clear

echo '------ artisan optimize succeded ----------'

echo '------ run composer install ----------'

composer install --no-interaction

echo '------ run dev ----------'

echo '------ run npm i ----------'

npm install ;

echo '------ run prod ----------'

npm run prod ;


