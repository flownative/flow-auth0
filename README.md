[![MIT license](http://img.shields.io/badge/license-MIT-brightgreen.svg)](http://opensource.org/licenses/MIT)
[![Packagist](https://img.shields.io/packagist/v/flownative/flow-auth0.svg)](https://packagist.org/packages/flownative/flow-auth0)
[![Maintenance level: Acquaintance](https://img.shields.io/badge/maintenance-%E2%99%A1-ff69b4.svg)](https://www.flownative.com/en/products/open-source.html) 

# Auth0 integration for Flow 5.x

This [Flow](https://flow.neos.io) package helps with integrating [Auth0](https://auth0.com) for authentication and authorization. 

It provides you with a wrapper for the management API which can be injected as a service into your own classes. The
wrapper makes sure that the Auth0 client is configured correctly according to your settings.


## Installation

The Auth0 integration is installed as a regular Flow package via Composer. For your existing project, simply include 
`flownative/auth0` into the dependencies of your Flow or Neos distribution:

```bash
$ composer require flownative/auth0:1.*
```

## Configuration

In order to use the Management API you need to provide access to this package via the Auth0 dashboard.
Create a new Auth0 machine-to-machine application ([documentation](https://auth0.com/docs/api/management/v2/create-m2m-app)),
choose the Auth0 Management API and select the required scopes. When you authorized the new application,
you'll find the necessary client id and client secret in the settings panel.

 
