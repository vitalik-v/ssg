#Запуск проекта

docker-compose up --build -d


#Перейти в src

cd src

composer i

npm install

npm run dev

cp .env.example .env

#Запуск миграций 

php artisan migrate

#Запуск наполнения базы

php artisan db:seed 

