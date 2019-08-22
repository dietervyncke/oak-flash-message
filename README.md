# oak-flash-message
### Simple Flash messages for oak

#### Installation

```ssh
composer require dietervyncke/oak-flash-message
```

#### Example usage

#### Add a message to the FlashNotifier

```php
<?php

use Tnt\FlashMessage\Facade\Flash;

Flash::message('Thank you for your interest' );

```

#### Get all messages from the FlashNotifier

```php
<?php

use Tnt\FlashMessage\Facade\Flash;

// Default message
$flashMessages = Flash::getMessages();