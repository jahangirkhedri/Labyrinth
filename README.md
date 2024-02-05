## Labyrinth

We have a labyrinth like this image which is a two-dimensional.
![example](./public/example.png)

We want to solve this Labyrinth

I use Backtrack algoritm for find the correct path. 
You can see Backtrack algoritm in this path:
`./App/Algoritm/Backtrack.php`

## install

Run `./install.sh`

This bash file build docker, install packages, generate key and run migration and seeders

# Endpoints

There is a postman export for use endpoints on `./Labyrinth.postman_collection.json`

* login

``````
GET /api/login
  {
    "email": "admin@gmail.com",
    "password": "password",
  }
``````

* return all the labyrinths for the current user:

```
GET /api/labyrinths
```

* return a specific labyrinth of the user by id:

```
GET /api/labyrinth/{id}
```

* create an empty labyrinth and returns the labyrinth id:

```
POST /api/labyrinth
```

* set the type of the specific block of the labyrinth using x/y coordinates
  (type is either 'empty' or 'filled'):
```
PUT /api/labyrinth/{id}/playfield/{x}/{y}/{type}
```




* set the starting block of the labyrinth using x/y coordinates:
```
PUT /api/labyrinth/{id}/start/{x}/{y}
```


* set the ending block of the labyrinth using x/y coordinates:
```
PUT /api/labyrinth/{id}/end/{x}/{y}
```



* return a solution for the labyrinth:
```
GET /api/labyrinth/{id}/solution
```
