<?php

namespace Tnt\FlashMessage;

class Message
{
    /**
     * @var string $text
     */
    private $text;

    /**
     * @var string $type
     */
    private $type;

    /**
     * Message constructor.
     * @param string $text
     * @param string $type
     */
    public function __construct(string $text, string $type)
    {
        $this->text = $text;
        $this->type = $type;
    }

    /**
     * @return string
     */
    public function getText(): string
    {
        return $this->text;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }
}