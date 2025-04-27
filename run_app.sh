#!/bin/bash

docker run \
--name my-postgres \
-e POSTGRES_PASSWORD=mysecretpassword \
-p 5432:5432 \
-d postgres

# Wait for PostgreSQL to start
sleep 3

./artisan migrate
./artisan db:seed
./artisan serve
