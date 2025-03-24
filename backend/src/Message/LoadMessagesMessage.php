<?php
namespace App\Message;

class LoadMessagesMessage
{
    private int $chatId;
    private string $taskId;

    public function __construct(int $chatId, string $taskId)
    {
        $this->chatId = $chatId;
        $this->taskId = $taskId;
    }

    public function getChatId(): int
    {
        return $this->chatId;
    }

    public function getTaskId(): string
    {
        return $this->taskId;
    }
}
