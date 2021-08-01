# seat-strict
A module for [SeAT](https://github.com/eveseat/seat) that allows for enforcing ESI tokens to be up to date

[![Latest Stable Version](https://img.shields.io/packagist/v/cryptaeve/seat-strict.svg?style=flat-square)]()
[![License](https://img.shields.io/badge/license-GPLv2-blue.svg?style=flat-square)](https://raw.githubusercontent.com/crypta-eve/seat-strict/master/LICENSE)

## Usage

This plugin allows you to remove privileges from users when they have invalid tokens for linked characters.

Once installed an audit will be performed automatically on the relevant user whenever a refresh token is deleted. 

There is also the command `strict:audit` which will queue jobs to audit every user. This can be run manually or I also recommend you add it to the seat scheduler.

### Configuration

#### Plugin Enable
* Global Enable - This setting will enable or disable the entire plugin

#### What to Remove
* Remove Squads - Remove users from squad member lists when they have an invalid token
* Remove Mods   - Remove users from squad moderator positions of squads when they have an invalid token
* Remove Squads - Remove users from squad member lists when they have an invalid token

#### Reason for Removal
* Invalid Token - If the user has any invalid tokens then strip their permissions


## Quick Installation
### Docker Install

Open the .env file (which is most probably at /opt/seat-docker/.env) and edit the SEAT_PLUGINS variable to include the package. 

```
# SeAT Plugins
# This is a list of the all of the third party plugins that you
# would like to install as part of SeAT. Package names should be
# comma separated if multiple packages should be installed.
SEAT_PLUGINS=cryptaeve/seat-strict
```

Save your .env file and run docker-compose up -d to restart the stack with the new plugins as part of it. Depending on how many other plugins you also may have, this could take a while to complete.

You can monitor the installation process by running:

docker-compose logs --tail 5 -f seat-web

### Blade Install

In your seat directory (By default:  /var/www/seat), type the following:

```
php artisan down
composer require cryptaeve/seat-strict

php artisan vendor:publish --force --all
php artisan migrate

php artisan up
```

And now, when you log into 'SeAT', you should see a 'SeAT Text' link on the left.



## Usage Tracking

In order to get an idea of the usage of this plugin, a very simplistic form of anonymous usage tracking has been implemented.

Read more about the system in use [here](https://github.com/Crypta-Eve/snoopy)
