sed -i '' -e 's|APP_DEBUG=true|APP_DEBUG=false|g' .env
sed -i '' -e 's|MIX_APP_ENV=local|MIX_APP_ENV=production|g' .env
sed -i '' -e "s|DB_HOST=127.0.0.1|DB_HOST=$1|g" .env
sed -i '' -e "s|DB_DATABASE=${PWD##*/}|DB_DATABASE=$2|g" .env
sed -i '' -e "s|DB_USERNAME=root|DB_USERNAME=$3|g" .env
sed -i '' -e "s|DB_PASSWORD=|DB_PASSWORD=$4|g" .env

composer install --optimize-autoloader --no-dev
npm run production

echo After asset building paste the content of manifest.json at the top of mix-manifest.json with the necessary edit, for PWA support.
