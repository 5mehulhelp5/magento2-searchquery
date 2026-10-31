# Magento 2 Search Query

**Magiccart SearchQuery** is a Magento 2 extension that filters and sanitizes search queries before they are saved into search term popularity. It skips saving search terms that contain URLs, crypto-related keywords, or non-alphanumeric characters, reducing spam and irrelevant search terms in the store.

## Features

- Enable/disable the filter via admin configuration.
- Skip saving search terms based on configurable rules.
- Blocks URLs and crypto-related keywords (bitcoin, coin, crypto, usdt, eth).
- Blocks search terms containing non-alphanumeric characters (except `-`, `+`, space).
- Integrates via a plugin on `Magento\Search\Model\Query`.

## Compatibility

- Magento 2.3.x / 2.4.x
- PHP 7.3+ / 8.x (as supported by your Magento version)

## Installation

[![Latest Stable Version](https://poser.pugx.org/magiccart/searchquery/v/stable)](https://packagist.org/packages/magiccart/searchquery)
[![Total Downloads](https://poser.pugx.org/magiccart/searchquery/downloads)](https://packagist.org/packages/magiccart/searchquery)
[![Daily Downloads](https://poser.pugx.org/magiccart/searchquery/d/daily)](https://packagist.org/packages/magiccart/searchquery)

### Composer Installation

```bash
composer require magiccart/searchquery
php bin/magento module:enable Magiccart_SearchQuery
php bin/magento setup:upgrade
php bin/magento setup:di:compile
php bin/magento cache:flush
```

## Configuration

Go to **Stores > Configuration > Magiccart > Search Query** (or as configured in `system.xml`) to enable/disable the module and set skip behavior.

## License

OSL-3.0 / AFL-3.0
