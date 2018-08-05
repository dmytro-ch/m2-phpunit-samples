<?php
/**
 * @author Atwix Team
 * @copyright Copyright (c) 2017 Atwix (https://www.atwix.com/)
 * @package Atwix_PHPUnitSample
 */

namespace Atwix\PHPUnitSample\Dummy;

use Magento\Customer\Api\GroupRepositoryInterface;
use Magento\Customer\Api\Data\GroupInterface;
use Magento\Catalog\Model\Indexer\Product\Price\UpdateIndexInterface;

/**
 * Class PluginWrapped
 */
class PluginWrapped
{
    /**
     * @param GroupRepositoryInterface $subject
     * @param \Closure $proceed
     * @param GroupInterface $group
     *
     * @return GroupInterface
     */
    public function aroundSave(
        GroupRepositoryInterface $subject,
        \Closure $proceed,
        GroupInterface $group
    ) {
        // Before
        $group = $proceed($group);
        // After

        return $group;
    }
}