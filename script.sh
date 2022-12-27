#!/bin/bash

cd /home/sparks/public_html 
echo '------ workdir /home/sparks/public_html ----------'

echo '------ run composer install ----------'
composer install --no-interaction
echo '------ composer install succeded ----------'

echo '------ run npm i ----------'
npm install ;
echo '------ npm install succeded ----------'


echo '------ artisan migrate ----------'
php artisan migrate --no-interaction
echo '------ artisan migrate succeded ----------'


echo '------ artisan optimize ----------'
php artisan optimize:clear
echo '------ artisan optimize succeded ----------'

echo '------ run dev ----------'
npm run dev --no-interaction
echo '------ run prod ----------'
npm run production --no-interaction








