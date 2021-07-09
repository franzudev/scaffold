BLACK='\033[0;30m'
DARK_GRAY='\033[1;30m'
RED='\033[0;31m'
LIGHT_RED='\033[1;31m'
GREEN='\033[0;32m'
LIGHT_GREEN="\033[1;32m"
ORANGE='\033[0;33m'
YELLOW='\033[1;33m'
BLUE='\033[0;34m'
LIGHT_BLUE='\033[1;34m'
PURPLE='\033[0;35m'
LIGHT_PURPLE='\033[1;35m'
CYAN='\033[0;36m'
LIGHT_CYAN='\033[1;36m'
LIGHT_GRAY='\033[0;37m'
WHITE='\033[1;37m'
NC='\033[0m'

rm -rf .git
rm package-lock.json

git init
git flow init -d -t 'v'
git add --all
git commit -m"init"
input='n'
printf "${GREEN}Would you like to add a remote and push the init commit?${NC}(y/n):\n[n]: "
read -p "" input
if [ "$input" = "y" ] || [ "$input" = "yy" ] || [ "$input" = "yes" ]; then
  url=''
  printf "${LIGHT_GREEN}Please, insert the remote origin url${NC}:\nurl: "
  read -p "" url
  git remote add origin "$url"
  git push -u origin develop
fi;

path="$(pwd)"
name=$(basename "$path")

input='n'
printf "${GREEN}Would you like to set https for ${name}?${NC}(y/n):\n[n]:"
read -p "" input
if [ "$input" = "y" ] || [ "$input" = "yy" ] || [ "$input" = "yes" ]; then
  valet secure "$name"
fi;

printf "${GREEN}Launching 'composer install'...${NC}\n"
composer install

printf "${GREEN}Copying .env.example to .env and updating with project configuration${NC}\n"
cp .env.example .env
sed -i '' -e "s/APP_NAME=App/APP_NAME=$name/g" .env
sed -i '' -e "s|MIX_APP_URL=https://app.test|MIX_APP_URL=https://$name.test|g" .env
sed -i '' -e "s|MIX_DEV_APP_URL=https://app|MIX_DEV_APP_URL=https://$name|g" .env
sed -i '' -e "s/DB_DATABASE=app/DB_DATABASE=$name/g" .env

printf "${GREEN}Creating database '${name}'...${NC}\n"
mysql -uroot -e "CREATE DATABASE $name;"

printf "${GREEN}Generating app key...${NC}\n"
php artisan key:generate

printf "${GREEN}Linking storage...${NC}\n"
php artisan storage:link

printf "${GREEN}Running migrations...${NC}\n"
php artisan migrate:fresh --seed

sed -i '' -e "s/\"name\": \"app\",/\"name\": \"$name\",/g" package.json

printf "${GREEN}Running 'npm install'...${NC}\n"
npm install

printf "${GREEN}Running 'npm run dev'...${NC}\n"
npm run dev

printf "\n${GREEN}Running 'npm run dev'...${NC}\n"

rm inist.sh
