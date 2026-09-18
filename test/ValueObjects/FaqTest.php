<?php

declare(strict_types=1);

namespace CultuurNet\SearchV3\ValueObjects;

use PHPUnit\Framework\TestCase;

final class FaqTest extends TestCase
{
    public function testConstructor(): void
    {
        $faq = new Faq('Hoe kom ik er?', '<p>Wandelen!</p>');

        $this->assertEquals('Hoe kom ik er?', $faq->getQuestion());
        $this->assertEquals('<p>Wandelen!</p>', $faq->getAnswer());
    }

    public function testEmptyConstructor(): void
    {
        $faq = new Faq();

        $this->assertNull($faq->getQuestion());
        $this->assertNull($faq->getAnswer());
    }

    public function testQuestionGetterAndSetter(): void
    {
        $faq = new Faq();
        $faq->setQuestion('Hoe kom ik er?');

        $this->assertEquals('Hoe kom ik er?', $faq->getQuestion());
    }

    public function testAnswerGetterAndSetter(): void
    {
        $faq = new Faq();
        $faq->setAnswer('<p>Wandelen!</p>');

        $this->assertEquals('<p>Wandelen!</p>', $faq->getAnswer());
    }
}
