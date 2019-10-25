echo "===================================="
echo "====== Before starting, make sure you have;"
echo "====== @php7.2"
echo "====== @composer"
echo "====== @docker"
echo "====== Ports: 3001,3306 FREE"
echo "===================================="

echo "Copying .env.local to .env in ./be/src"
cp ../../src/.env.local ../../src/.env
# Only rebuild if not existing.
echo "Switching to BE directory" 
cd  ../../src
echo "Running Composer Install"
composer install
echo "Switching back to tools directory"
cd ../development/tools
echo "Bringing up docker containers..."
docker-compose up -d esto_db
echo "Waiting 15s for DB come ALIVE..."
sleep 15s
cd ../../src
composer dump-autoload
php artisan serve --port=3001
