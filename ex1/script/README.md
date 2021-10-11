# Note
duplication of entities not handled

# Docker

## Build

```
docker build -t ex1 .
```

## Run

Make sure to be in script folder

```
docker run -a stdin -a stdout --rm -v "$PWD:/usr/src/ex1" ex1  source_data.csv
```

## Other useful command

### Composer

```
docker run --rm --interactive --tty -v "$PWD:/app" composer install
```