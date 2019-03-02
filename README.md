# Football RESTful API

- To run server: php bin/console server:run
- To run migrations: php bin/console doctrine:migrations:migrate
- To load fixtures: php bin/console doctrine:fixtures:load

- All endpoints and payload examples can be found at: https://documenter.getpostman.com/view/331286/S11LrxU7#5414e4f0-1f07-45ff-a258-7ecbad809654

- Unit tests can be found in /tests
- All HTTP requests will need the X-AUTH-TOKEN header. The following token can be used for testing (once fixtures loaded):

eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzZWNyZXQiOiJ1eWlzZGpkaGpmZHNAKkAzNTY5OTk1MjQiLCJlbWFpbCI6Im1pY2hhZWxidWRkNkBnbWFpbC5jb20ifQ.j2tE4w5XsHEaB20bJLwn6f9sZ6QxyqWCLMvB13MaiaE
