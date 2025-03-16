# Contao robot.txt Bundle

[![](https://img.shields.io/packagist/v/cgoit/contao-robots-txt-bundle.svg)](https://packagist.org/packages/cgoit/contao-robots-txt-bundle)
![Dynamic JSON Badge](https://img.shields.io/badge/dynamic/json?url=https%3A%2F%2Fraw.githubusercontent.com%2FcgoIT%2Fcontao-robots-txt-bundle%2Fmain%2Fcomposer.json&query=%24.require%5B%22contao%2Fcore-bundle%22%5D&label=Contao%20Version)
[![](https://img.shields.io/packagist/dt/cgoit/contao-robots-txt-bundle.svg)](https://packagist.org/packages/cgoit/contao-robots-txt-bundle)
[![CI](https://github.com/cgoIT/contao-robots-txt-bundle/actions/workflows/ci.yml/badge.svg)](https://github.com/cgoIT/contao-robots-txt-bundle/actions/workflows/ci.yml)

You have multiple contao installations? You're tired of configuring the same additional robots.txt stuff in every installation?
You always miss some installation if you update the additional robots.txt stuff?
Then this bundle is the right for you!

Just place your global robot.txt anywhere where it's accessible for your installations...

- a file in the filesystem
- reachable via http
- ...

You can use everything that can be loaded via PHPs `file_get_contents`.

The content of this global robots.txt file is then merged to your installation. So you still have the option to add stuff specific for one contao installation.

## Install

```bash
composer require cgoit/contao-robots-txt-bundle
```
