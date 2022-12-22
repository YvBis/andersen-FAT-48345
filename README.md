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

3. Copy .env
```shell
    co .env.example .env
```
4. Install sail
```shell 
     php artisan sail:install
```
MariaDB as database recommended.
5. Make sail shortcut
```shell
   alias sail='[ -f sail ] && sh sail || sh vendor/bin/sail'
```
6. Start container
```shell
    ./vendor/bin/sail up
```
7. Setup packages
```shell
    sail composer install
```
8. Run migrations
```shell
    sail php artisan migrate
```
9. Generate keys
```shell
    sail php artisan key:generate
```
10. Set up passport
```shell
    sail php artisan passport:install
```
The app runs on localhost:80.


