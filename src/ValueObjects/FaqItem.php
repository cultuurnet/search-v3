<?php

declare(strict_types=1);

namespace CultuurNet\SearchV3\ValueObjects;

final class FaqItem
{
    /**
     * @var string|null
     */
    private $question;

    /**
     * @var string|null
     */
    private $answer;

    public function __construct(
        ?string $question = null,
        ?string $answer = null
    ) {
        $this->question = $question;
        $this->answer = $answer;
    }

    public function getQuestion(): ?string
    {
        return $this->question;
    }

    public function setQuestion(string $question): void
    {
        $this->question = $question;
    }

    public function getAnswer(): ?string
    {
        return $this->answer;
    }

    public function setAnswer(string $answer): void
    {
        $this->answer = $answer;
    }
}
