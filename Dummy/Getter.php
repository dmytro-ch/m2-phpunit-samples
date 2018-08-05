<?php
/**
 * @author Atwix Team
 * @copyright Copyright (c) 2017 Atwix (https://www.atwix.com/)
 * @package Atwix_PHPUnitSample
 */

namespace Atwix\PHPUnitSample\Dummy;

/**
 * Class GetterSetter
 */
class Getter
{
    /**
     * @param \Magento\Catalog\Model\Category $category
     *
     * @return array
     */
    public function execute(\Magento\Catalog\Model\Category $category)
    {
        $name = $category->getData('name');
        $path = $category->getData('path');
        $parentId = $category->getData('parent_id');

        return [$name, $path, $parentId];
    }
}