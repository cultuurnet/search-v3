<?php

declare(strict_types=1);

namespace CultuurNet\SearchV3\ValueObjects;

final class TranslatedFaq
{
    /**
     * @var Faq[]
     */
    private $faqs = [];

    /**
     * @return Faq[]
     */
    public function getFaqs(): array
    {
        return $this->faqs;
    }

    /**
     * @param Faq[] $faqs
     */
    public function setFaqs(array $faqs): void
    {
        $this->faqs = $faqs;
    }

    public function addFaq(string $key, Faq $faq): void
    {
        $this->faqs[$key] = $faq;
    }

    public function getFaqForLanguage(string $langcode): ?Faq
    {
        return $this->faqs[$langcode] ?? null;
    }
}
