<?php

namespace App\Logging\Telegram;

use App\Services\Telegram\TelegramBotApiService;
use Monolog\Formatter\LineFormatter;
use Monolog\Handler\AbstractProcessingHandler;
use Monolog\Logger;
use Monolog\LogRecord;

class TelegramLoggerHandler extends AbstractProcessingHandler
{
    public function __construct(private array $config)
    {
        $datetime = 'd.m.Y в H:i';
        $output = "%datetime% | (%level_name%) > %message%";

        $formatter = new LineFormatter($output, $datetime);
        $this->setFormatter($formatter);

        $level = Logger::toMonologLevel($config['level']);
        parent::__construct($level);
    }

    protected function write(LogRecord $record): void
    {
        TelegramBotApiService::sendMessage($this->config['token'], $this->config['chat_id'], $record->formatted);
    }
}
