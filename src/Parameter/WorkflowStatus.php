<?php

declare(strict_types=1);

namespace CultuurNet\SearchV3\Parameter;

final class WorkflowStatus extends AbstractParameter
{
    public const STATUS_DRAFT = 'DRAFT';
    public const STATUS_READY_FOR_VALIDATION = 'READY_FOR_VALIDATION';
    public const STATUS_APPROVED = 'APPROVED';
    public const STATUS_REJECTED = 'REJECTED';
    public const STATUS_DELETED = 'DELETED';

    public function __construct(string $workflowStatus)
    {
        $this->value = $workflowStatus;
        $this->key = 'workflowStatus';
    }
}
