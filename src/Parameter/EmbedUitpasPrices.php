<?php

declare(strict_types=1);

namespace CultuurNet\SearchV3\Parameter;

final class EmbedUitpasPrices extends AbstractParameter
{
    public function __construct()
    {
        $this->value = true;
        $this->key = 'embedUitpasPrices';
    }
}
