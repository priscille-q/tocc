# Docker

## Build

```
docker build -t ex5 .
```

## Run

Make sure to be in script folder

```
docker run --rm -v "$PWD:/var/www/html" -p 81:80 ex5 
```
