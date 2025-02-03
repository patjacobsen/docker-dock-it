# PHP Demo #

## Launch environment ##
Execute the docker-compose.yml file:
```shell
docker compose up -d
```
Then open in browser: <http://localhost/>

## Rebuild environment ##
After changing a "Dockerfile", you must rebuild the image using "docker compose build" or:
```shell
docker compose up -d --build
```

## Stop environment ##

```shell
docker compose down
```

## Todo ##
* Create a new branch "php-demo", commit often.
* Explore docker-compose.yml and launch environment.
  * Try different versions.
  * Learn about different storage types and locations.
    * __Container:__ (default) not persistent
    * __Volume:__ named storage locations managed by Docker, can be shared between containers.
    * __Bind Mounts:__ map a folder in the container to a folder on the host.
  * Connect to containers via terminal.
* Add phpMyAdmin container.
* Modify and export world database. Update "initial database" SQL.
* Use environment variables.
  * Use "env" command to see environment variables in the container.
  * Convert database connection to use environment variables.
  * Create environment variables 
* Commit, push, and test.

## Lab/Homework ##
* Create new branch "php-lab-1", commit often.
* Replace "The World" example with your PHP final.
  * Create an export of the tables used in your final.
  * Replace the world.sql with your export.
  * Replace php files in "html" folder.
  * Update environment variables and database connection.
* Commit, push, and test. Test by creating a new clone of your repo and try launching the environment.
* Turn in a link to your repo to Canvas.