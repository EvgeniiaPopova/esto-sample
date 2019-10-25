echo "Bringing down docker..."
docker-compose -f "docker-compose.yml" down
 read -p "====== DO YOU WANNA CLEAR YOUR DOCKER CACHE? ======" yn
    case $yn in
        [Yy]* ) echo '====== CLEARING CACHE ====== '; docker rmi -f $(docker images -a -q); exit;;
        [Nn]* ) exit;;
        * ) echo "Please answer yes or no.";;
    esac
echo "Removing .env"
rm ../../src/.env