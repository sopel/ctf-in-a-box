# Level 0

We'll start you out with Level 0, the Secret Safe. The Secret Safe is
designed as a secure place to store all of your secrets. It turns out that
the password to access Level 1 is stored within the Secret Safe. If only you
knew how to [crack safes](http://en.wikipedia.org/wiki/Safe-cracking)...

## Run on Cloud Foundry

- Run `vmc push` from this directory to install the app
- Seed the secret ([see below](#seed-secret))
- Go to the app's reported URL in your browser

## Run standalone

- Install node and npm (see http://nodejs.org/)
- Run `npm install` from this directory to install dependencies
- Run `node level00.js` to start the server on port 3000
- Seed the secret ([see below](#seed-secret))
- Go to [http://localhost:3000](http://localhost:3000) in your browser

## Seed secret

Depending on the usage scenario you'll most likely want to seed the secret to be 
discovered via the exploit - run one of the following commands for a sample secret:

* via [HTTPie](https://github.com/jkbr/httpie)
 - `cat sample-secret.json | http POST <URL>`  
or
 - `http POST <URL> namespace=secret-namespace secret_name=levelXYZ.password secret_value=sample-password`

* via [cURL](http://curl.haxx.se/)
 - `curl <URL> -d namespace=secret-namespace -d secret_name=levelXYZ.password -d secret_value=sample-password`
