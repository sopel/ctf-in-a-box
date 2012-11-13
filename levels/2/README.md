# Level 2

You are now on Level 2, the Social Network. Excellent work so far!
Social Networks are all the rage these days, so we decided to build
one for CTF. Please fill out your profile at on the level 2 server.
You may even be able to find the password for Level 3 by doing so.

## Run on Cloud Foundry

- Run `vmc push` from this directory to install the app
- Seed the secret ([see below](#seed-secret))
- Go to the app's reported URL in your browser

## Run standalone

Not implemented/tested yet, see [issue #24](https://github.com/sopel/ctf-in-a-box/issues/24).

## Seed secret

Depending on the usage scenario you'll most likely want to seed the secret to be 
discovered via the exploit - run one of the following commands for a sample secret:

* via [HTTPie](https://github.com/jkbr/httpie)
 - `cat sample-secret.json | http POST <URL>/seed.php`
or
 - `http -f POST <URL>/seed.php password=sample-password`

* via [cURL](http://curl.haxx.se/)
 - `curl <URL>/seed.php -d password=sample-password`
