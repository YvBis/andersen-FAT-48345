## Initial Laravel project
## Installation

1. Clone repository
```shell
    git clone git@github.com:YvBis/andersen-FAT-48345.git
 ```
2. Go to folder
```shell
    cd andersen-FAT-48345
```

3. Start application
```shell
    docker-compose up -d
```
4. Set permissions
```shell 
    docker exec php-apache chmod -R 755 bootstrap/cache
```
```shell 
    docker exec php-apache chmod -R 755 storage
```
5. Install composer dependencies
```shell
   docker exec php-apache composer install
```  
1. Go to
`http://127.0.0.1:8080`
