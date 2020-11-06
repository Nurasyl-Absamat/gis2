## Laravel 7.X 2 gis API project

 Simplified version of the 2Gis guides. I provided three objects
 <ul>
    <li>Firm</li>
    <li>Building</li>   
    <li>Category</li>   
 </ul>
 The project allows to create/read/update/delete the firms, buildings and categories find nearest buildings with search by circle. Filter for firms and categories.
## Firm
It is a card of the organization in the building.
It has own building and categories.

## Building
Contains at least information about a specific building.
Has many Firms in one building. Has geoposition by lutitude and longtitude.

## Category
Categories allow you to classify the type of activity of firms in the directory. Have a title and
can be nested into each other in a tree-like form. In a simple implementation, the level
nesting will be 2-3 categories.

Clone the repository

    git clone https://github.com/Nurasyl-Absamat/gis2.git

Switch to the repo folder
    
    cd gis2

Install all the dependencies using composer
    
    composer install

Copy the example env file and make the required configuration changes in the .env file

    cp .env.example .env

Generate a new application key

    php artisan key:generate

Run the database migrations (**Set the database connection in .env before migrating**)

    php artisan migrate

Start the local development server

    php artisan serve
    
You can now access the server at http://localhost:8000


**Command list**

    git clone https://github.com/Nurasyl-Absamat/mini-forum.git
    cd laravel-realworld-example-app
    composer install
    cp .env.example .env
    php artisan key:generate

## Database seeding

Run the database seeder and you're done

    php artisan db:seed

***Note*** : It's recommended to have a clean database before seeding. You can refresh your migrations at any point to clean the database by running the following command

    php artisan migrate:refresh
    

# Code Overview

## Folders

- `app/Models` - Contains all the Eloquent models
- `app/Http/Controllers` - Contains all the api controllers
- `app/Http/Resources` - Contains all the api resources
- `database/factories` - Contains the model factory for all the models
- `database/migrations` - Contains all the database migrations
- `database/seeds` - Contains the database seeder
- `routes` - Contains all the api routes defined in api.php file

## Routes

- <b>GET</b> `api/buildings/inarea` - <b>Returns all of the buildings in the area. Takes longtitude and latitude. Radius is 400 by default.</b>
api/buildings/inarea?lat=-33.8637673&lng=151.170178&radius=500

- <b>GET</b> `api/buildings` - Returns all of the buildings.
- <b>GET</b> `api/buildings/{building}` - Returns exact building by id.
- <b>PUT</b> `api/buildings/{building}` - Updates latitude, longtitude and address of the building by id.
api/buildings/nearests?lat=-33.8637673&lng=151.170178&radius=500

<img src="https://github.com/Nurasyl-Absamat/gis2/screens/BuildingNearest.png" />

- <b>DELETE</b> `api/buildings/{building}` - Deletes the building by id.
- <b>GET</b> `api/categories` - Returns all parent categories with children in it. Children are categories also.
- <b>GET</b> `api/categories/{category}` - Returns category by id. If has request limit and/or offset returns firms with limit or skips some of it.
EXAMPLE api/categories/1?limit=1&offset=3
<img src="https://github.com/Nurasyl-Absamat/gis2/screens/limit_ofset.png" />
***Update Store Delete skipped because they do almost the same thing***
- <b>GET</b> `api/firms` - Returns paginated firms. Has filter that will load need data for it.
EXAMPLE api/firms?page=11 to see how works load filter api/firms?filter[]=phones&filter[]=building
***Phones CRUD I am lazy to write it all xD***

## Database
<img src="https://github.com/Nurasyl-Absamat/gis2/screens/Database.png" />

## Factories
<ul>
    <li>BuildingFactory</li>
    <li>FirmFactory</li>
    <li>PhoneFactory</li>
</ul>



## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

