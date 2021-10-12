# Docker

## Build

```
docker build -t ex4 .
```

## Run

Make sure to be in script folder

```
docker run --rm -v "$PWD:/var/www/html" -p 81:80 ex4 
```
