# 👨‍🍳 Flex Recipes

Custom recipes for [Flex](https://flex.symfony.com).

## Setup

Please make sure you have the following installed:

- [composer](https://getcomposer.org/)
- [symfony/flex >= 1.17](https://packagist.org/packages/symfony/flex)

Update your `composer.json` file using the configuration below.


```json
{
    "extra": {
        "symfony": {
            "endpoint": [
                "https://flex.lephare.io/main/index.json",
                "flex://defaults"
            ]
        }
    }
}
```

Make sure [packagist.com](https://packagist.com/) repositories are enabled.

# Helpful resources

- [Manifest format](https://github.com/symfony/recipes#creating-recipes)
