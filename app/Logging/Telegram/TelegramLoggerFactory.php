<?php

namespace App\Logging\Telegram;

use DateTimeZone;
use Monolog\Formatter\LineFormatter;
use Monolog\Logger;

class TelegramLoggerFactory
{
    public function __invoke(array $config)
    {
        $logger = new Logger('telegram', [new TelegramLoggerHandler($config)]);
        $logger->setTimezone(new DateTimeZone('Europe/Moscow'));
        return $logger;
    }
}
