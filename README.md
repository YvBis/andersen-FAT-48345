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
4. Install composer dependencies
```shell
   docker exec -u $(shell id -u) andersen-php composer install
```  
5. Go to
`http://127.0.0.1:8080`
