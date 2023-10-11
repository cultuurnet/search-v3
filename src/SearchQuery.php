<?php

declare(strict_types=1);

namespace CultuurNet\SearchV3;

use CultuurNet\SearchV3\Parameter\Query;

final class SearchQuery implements SearchQueryInterface
{
    /**
     * @var ParameterInterface[]
     */
    private $parameters = [];

    /**
     * @var array
     */
    private $sorting = [];

    /**
     * Return the full embedded search results, or only the ids.
     * @var bool
     */
    private $embed;

    /**
     * The number of results to skip (defaults to 0).
     * @var int|null
     */
    private $start;

    /**
     * The number of results to return in a single page (defaults to 30).
     * @var int|null
     */
    private $limit;

    public function __construct(bool $embed = false)
    {
        $this->embed = $embed;
    }

    public function addParameter(ParameterInterface $parameter): void
    {
        $this->parameters[] = $parameter;
    }

    public function removeParameter(ParameterInterface $parameter): void
    {
        foreach ($this->parameters as $i => $param) {
            if ($param === $parameter) {
                unset($this->parameters[$i]);
            }
        }
    }

    /**
     * @return ParameterInterface[]
     */
    public function getParameters(): array
    {
        return $this->parameters;
    }

    public function addSort(string $field, string $direction): void
    {
        $this->sorting[$field] = $direction;
    }

    public function removeSort(string $field): void
    {
        unset($this->sorting[$field]);
    }

    public function setEmbed(bool $embed): void
    {
        $this->embed = true;
    }

    public function getSort(): array
    {
        return $this->sorting;
    }

    public function setStart(int $start): void
    {
        $this->start = $start;
    }

    public function setLimit(int $limit): void
    {
        $this->limit = $limit;
    }

    public function toArray(): array
    {
        $query = [];
        $advancedQueries = [];

        foreach ($this->parameters as $parameter) {
            $key = $parameter->getKey();

            if ($parameter instanceof Query) {
                $advancedQueries[] = $parameter->getValue();
                continue;
            }

            if (isset($query[$key])) {
                if ($parameter->allowsMultiple()) {
                    $query[$key] = is_array($query[$key]) ? $query[$key] : [$query[$key]];
                    $query[$key][] = $parameter->getValue();
                }
                continue;
            }

            $query[$key] = $parameter->getValue();
        }

        if (!empty($advancedQueries)) {
            if (count($advancedQueries) === 1) {
                $query['q'] = $advancedQueries[0];
            } else {
                $query['q'] = '(' . implode(') AND (', $advancedQueries) . ')';
            }
        }

        if (!empty($this->sorting)) {
            $query['sort'] = $this->sorting;
        }

        if ($this->embed) {
            $query['embed'] = true;
        }

        if (!is_null($this->start)) {
            $query['start'] = $this->start;
        }

        if (!is_null($this->limit)) {
            $query['limit'] = $this->limit;
        }

        return $query;
    }

    public function __toString(): string
    {
        $query = $this->toArray();

        $stringValues = [];
        foreach ($query as $key => $value) {
            if (is_array($value)) {
                foreach ($value as $sub_key => $sub_value) {
                    $stringValues[] = $key . '[' . $sub_key . ']=' . $sub_value;
                }
            } else {
                $stringValues[] = $key . '=' . $value;
            }
        }

        return implode('&', $stringValues);
    }
}
