# nensquefem.cat

This project is a toy to play with **Symfony2**.

My intention is to create a webscrapper to extract child activities in Barcelona from some web sources and create a little agenda.


## Interesting parts
* Tagged services


## Installation
    git clone https://github.com/jordillonch/nensquefem.git
    cd nensquefem
    php composer.phar update
    app/console doctrine:database:create
    app/console doctrine:schema:create


## Usage
    app/console nensquefem:robots:run


## Author

Jordi Llonch - llonch.jordi at gmail dot com
