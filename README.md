# MailUP Bundle

## Install

Enable external repository, add in ```composer.json```

```json
{
    "repositories": [
        {
            "type": "vcs",
            "url": "https://github.com/taginnovationschool/codemaster-mailup-bundle"
        }
    ]
}
```

Decrease stability level in `composer.json`:

```json
{
    "minimum-stability": "dev"
}
```

Download using composer:

```
composer require codemaster/mailup-bundle
```

Enable bundle on `app/AppKernel.php`:

```php
new EightPoints\Bundle\GuzzleBundle\GuzzleBundle(),
new Codemaster\Bundle\MailupBundle\MailupBundle(),
```

Enable route in `app/config/routing.yml`:

```yml
codemaster_mailup:
    resource: "@MailupBundle/Resources/config/routing.yml"
    prefix: "/mailup"
```

Add config:

```yml
guzzle:
    clients:
        codemaster_mailup:
            base_url: "https://services.mailup.com"
            options:
                verify: false
``
