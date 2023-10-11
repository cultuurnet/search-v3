<?php

declare(strict_types=1);

namespace CultuurNet\SearchV3\Parameter;

use PHPUnit\Framework\TestCase;

final class WorkflowStatusTest extends TestCase
{
    public function testConstructor(): void
    {
        $workflow = new WorkflowStatus(WorkflowStatus::STATUS_APPROVED);

        $key = $workflow->getKey();
        $value = $workflow->getValue();

        $this->assertEquals('workflowStatus', $key);
        $this->assertEquals('APPROVED', $value);
    }
}
