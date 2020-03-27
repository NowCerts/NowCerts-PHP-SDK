# NowCerts PHP SDK

For API documentation see https://api.nowcerts.com.  
For a live demo see http://test.api.nowcerts.com.

## Getting Started

`composer require nowcerts/nowcerts-php-sdk`
Then add the following to your PHP script:

    require_once 'vendor/autoload.php';

## Running Tests

Only HttpClientTest.php can be executed without elevated API privileges. Contact
info@nowcerts.com and request a demo username and password. If a username and
password are obtained then create a bootstrap file such as the following:

    <?php
    $api_username = "username";
    $api_password = "password";
    require("vendor/autoload.php");

Either way install dev dependencies with `composer --dev install`.
Run PHPUnit:
    vendor/bin/phpunit --verbose --bootstrap path/to/bootstrap.php tests/Client.php
Replace "tests/Client.php" with simply "tests" if you obtained API credentials.  
Many tests are failing because not enough is known about how the API works to
construct working tests. Pull requests that fix tests are welcome.

## Contributing

Submit issues and pull requests at https://github.com/NowCerts/NowCerts-PHP-SDK/issues
and https://github.com/NowCerts/NowCerts-PHP-SDK/pulls respectively.

Help is wanted for fixing tests that are broken as a result of a lack of
information about how to use the API.

## License

See the [license file](https://github.com/NowCerts/NowCerts-PHP-SDK/blob/master/LICENSE).
