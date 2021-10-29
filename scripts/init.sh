echo "${PWD##*/}"
mkdir public/icon public/images

rm -rf .git package-lock.json

git init
git flow init -d -t 'v'
git add --all
git commit -m"init"
git remote add origin "git@github.com:franzudev/${PWD##*/}.git"
#git push -u origin develop

valet secure "${PWD##*/}"

composer install
cp .env.example .env
sed -i '' -e "s/APP_NAME=App/APP_NAME=${PWD##*/}/g" .env
# Set production url
sed -i '' -e "s|MIX_APP_URL=https://scaffold.test|MIX_APP_URL=https://${PWD##*/}.com|g" .env
sed -i '' -e "s|MIX_DEV_APP_URL=https://app|MIX_DEV_APP_URL=https://${PWD##*/}|g" .env
sed -i '' -e "s/DB_DATABASE=app/DB_DATABASE=${PWD##*/}/g" .env

mysql -uroot -e "CREATE DATABASE ${PWD##*/};"

artisan key:generate
artisan storage:link
artisan migrate:fresh --seed

sed -i '' -e "s/\"name\": \"app\",/\"name\": \"${PWD##*/}\",/g" package.json
npm install
npm run dev
