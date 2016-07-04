# Jaeger CMS Platform Object

[![Build Status](https://travis-ci.org/jaeger-app/platforms.svg?branch=master)](https://travis-ci.org/jaeger-app/platforms)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/jaeger-app/platforms/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/jaeger-app/platforms/?branch=master)
[![Author](http://img.shields.io/badge/author-@mithra62-blue.svg?style=flat-square)](https://twitter.com/mithra62)
[![GitHub license](https://img.shields.io/badge/license-MIT-blue.svg)](https://raw.githubusercontent.com/jaeger-app/bootstrap/master/LICENSE) 

A CMS Platform abstraction layer for platform agnostic development.

## Installation

Add `jaeger-app/platforms` as a requirement to your `composer.json`:

```bash
$ composer require jaeger-app/platforms
```

## Description

`jaegerApp\Platforms\AbstractPlatform` outlines the various methods the Platform objects have to provide. At this time, they are:

```php
\JaegerApp\Platforms\AbstractPlatform::getDbCredentials();
\JaegerApp\Platforms\AbstractPlatform::getEmailConfig();
\JaegerApp\Platforms\AbstractPlatform::getCurrentUrl();
\JaegerApp\Platforms\AbstractPlatform::getSiteName();
\JaegerApp\Platforms\AbstractPlatform::getTimezone();
\JaegerApp\Platforms\AbstractPlatform::getSiteUrl();
\JaegerApp\Platforms\AbstractPlatform::getEncryptionKey();
\JaegerApp\Platforms\AbstractPlatform::getConfigOverrides();
\JaegerApp\Platforms\AbstractPlatform::redirect($url);
\JaegerApp\Platforms\AbstractPlatform::getPost($key, $default = false)
\JaegerApp\Platforms\AbstractPlatform::setSettingsTable($table)
\JaegerApp\Platforms\AbstractPlatform::getSettingsTable()
```

The idea being that any information generally provided by the host CMS, like the database or email configuration, you'll get from the Platform object instead of coding it directly.