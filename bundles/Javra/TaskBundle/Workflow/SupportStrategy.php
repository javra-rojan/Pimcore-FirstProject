<?php

namespace Javra\TaskBundle\Workflow;

use Pimcore\Model\DataObject\Product;
use Symfony\Component\Workflow\SupportStrategy\WorkflowSupportStrategyInterface;
use Symfony\Component\Workflow\WorkflowInterface;

class SupportStrategy implements WorkflowSupportStrategyInterface
{
    /**
     * @param WorkflowInterface $workflow
     * @param object $subject
     * @return bool
     */
    public function supports(WorkflowInterface $workflow, object $subject): bool
    {
        return $subject instanceof Product;
    }
}
