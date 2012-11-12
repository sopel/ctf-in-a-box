# Level 1

Excellent, you are now on Level 1, the Guessing Game. All you
have to do is guess the combination correctly, and you'll be given
the password to access Level 2! We've been assured that this level
has no security vulnerabilities in it (and the machine running the
Guessing Game has no outbound network connectivity, meaning you
wouldn't be able to extract the password anyway), so you'll probably
just have to try all the possible combinations. Or will you...?

## Run on Cloud Foundry

- Run `vmc push` from this directory to install the app
- Seed the secret ([see below](#seed-secret))
- Go to the app's reported URL in your browser

## Run standalone

N/A yet (PHP versions < 5.4 lack a convenient build in webserver)

## Seed secret

Depending on the usage scenario you'll most likely want to seed the secret to be 
discovered via the exploit - run one of the following commands for a sample secret:

* via [HTTPie](https://github.com/jkbr/httpie)
 - ~~`cat sample-secret.json | http POST <URL>/seed.php`~~ (JSON payload N/A yet)  
or
 - `http -f POST <URL>/seed.php password=sample-password`

* via [cURL](http://curl.haxx.se/)
 - `curl <URL>/seed.php -d password=sample-password`
