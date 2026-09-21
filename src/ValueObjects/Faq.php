<?php

declare(strict_types=1);

namespace CultuurNet\SearchV3\ValueObjects;

use JMS\Serializer\Annotation\Type;

final class Faq
{
    /**
     * @var string
     * @Type("string")
     */
    private $question;

    /**
     * @var string
     * @Type("string")
     */
    private $answer;

    public function __construct(string $question, string $answer)
    {
        $this->question = $question;
        $this->answer = $answer;
    }

    public function getQuestion(): string
    {
        return $this->question;
    }

    public function setQuestion(string $question): void
    {
        $this->question = $question;
    }

    public function getAnswer(): string
    {
        return $this->answer;
    }

    public function setAnswer(string $answer): void
    {
        $this->answer = $answer;
    }
}
