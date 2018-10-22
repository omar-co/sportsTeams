**Teams & Players API**

Download and run:

`composer install`

`php artisan migrate --seed`

`php artisan passport:client --personal`


**Endpoints**:

**register new user**

`post` `api/auth/signup`

body:

name, email, password & password_confirmation

**login**

`post` `api/auth/login`

body:

email, password, remember_me

this method returns a bearer token requiered for all the endpoints in Players and Teams

**Teams**

`api/teams`

`get` returns all teams

`post` create new team params: name

`api/teams/:id`

`get` returns a team with players

**Players**

`api/players`

`get` returns all the players

`post` create new player params: first_name, last_name, team_id

`api/players/:id`

`put` update player