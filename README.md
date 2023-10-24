# Local Installation

## Setup instructions

### Step #1: Lando environment setup

**This is a one time setup - skip this if you already have a working Lando environment.**  

Follow [Lando environment setup instructions](https://docs.lando.dev/getting-started/installation.html)

### Step #2: Project setup

1. Clone this repo into your Projects directory

    ```
    git clone https://github.com/ffw-manh-nguyen/rxp-d9.git
    cd rxp-d9
    ```

2. Run composer install

    ```
    lando composer install
    ```

2. Start the site

    ```
    lando start
    ```

3. Point your browser to one of these URLs. For example:

    ```
    ✔ APPSERVER URLS
      ✔ https://localhost:53678 [200]
      ✔ http://localhost:53679 [200]
      ✔ http://site1.lndo.site/ [200]
      ✔ https://site1.lndo.site/ [200]
      ✔ http://site2.lndo.site/ [200]
      ✔ https://site2.lndo.site/ [200]
      ✔ http://site3.lndo.site/ [200]
      ✔ https://site3.lndo.site/ [200]
    ```

4. Get Drush site aliaes: 
    ```
    lando drush sa
    ```

5. Import database for each site:
    ```
    lando drush @site.alias sqlc < db_name.sql
    ```

## More automation with bash script

New site provisioning can be automated executing `init-new-site.sh` script
This script receive two arguments:

  ```
  sh init-new-site.sh <sitename> <langcode>

  <sitename>: Name of new site in lowercase. Default: "new-site"
  <langoce>: Site language (e.g: fr, uk, vi,...). Default: "en"
  ```
