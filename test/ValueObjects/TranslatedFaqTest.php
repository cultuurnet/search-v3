<?php

declare(strict_types=1);

namespace CultuurNet\SearchV3\ValueObjects;

use CultuurNet\SearchV3\Serializer\Serializer;
use PHPUnit\Framework\TestCase;

final class TranslatedFaqTest extends TestCase
{
    /**
     * @var TranslatedFaq
     */
    protected $faq;

    public function setUp(): void
    {
        $this->faq = new TranslatedFaq();
    }

    public function testGetFaqsMethod(): void
    {
        $faqs = [
            'nl' => new Faq('Hoe kom ik er?', '<p>Wandelen!</p>'),
            'fr' => new Faq('Comment m\'y rendre?', '<p>A pied!</p>'),
        ];

        $this->faq->setFaqs($faqs);

        $this->assertEquals($faqs, $this->faq->getFaqs());
    }

    public function testAddFaqMethod(): void
    {
        $nlFaq = new Faq('Hoe kom ik er?', '<p>Wandelen!</p>');
        $this->faq->addFaq('nl', $nlFaq);

        $this->assertEquals(['nl' => $nlFaq], $this->faq->getFaqs());
    }

    public function testGetFaqForLanguageMethod(): void
    {
        $this->faq->setFaqs([
            'nl' => new Faq('Hoe kom ik er?', '<p>Wandelen!</p>'),
            'fr' => new Faq('Comment m\'y rendre?', '<p>A pied!</p>'),
        ]);

        $result = $this->faq->getFaqForLanguage('nl');

        $this->assertEquals('Hoe kom ik er?', $result->getQuestion());
        $this->assertEquals('<p>Wandelen!</p>', $result->getAnswer());
        $this->assertNull($this->faq->getFaqForLanguage('de'));
    }

    public function testDeserializeFaq(): void
    {
        $jsonString = json_encode([
            'nl' => [
                'question' => 'Hoe kom ik er?',
                'answer' => '<p>Wandelen!</p>',
            ],
            'fr' => [
                'question' => 'Comment m\'y rendre?',
                'answer' => '<p>A pied!</p>',
            ],
        ]);

        $serializer = new Serializer();
        /** @var TranslatedFaq $faq */
        $faq = $serializer->deserialize($jsonString, TranslatedFaq::class);

        $this->assertEquals('Hoe kom ik er?', $faq->getFaqForLanguage('nl')->getQuestion());
        $this->assertEquals('<p>A pied!</p>', $faq->getFaqForLanguage('fr')->getAnswer());
    }
}
