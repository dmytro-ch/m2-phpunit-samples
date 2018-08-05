<?php
/**
 * @author Atwix Team
 * @copyright Copyright (c) 2017 Atwix (https://www.atwix.com/)
 * @package Atwix_PHPUnitSample
 */

namespace Atwix\PHPUnitSample\Dummy;

/**
 * Class Setter
 */
class Setter
{
    /**
     * @param \Magento\Catalog\Model\Category $category
     * @param string $name
     * @param string $path
     * @param int $parentId
     *
     * @return \Magento\Catalog\Model\Category
     */
    public function execute(\Magento\Catalog\Model\Category $category, $name, $path, $parentId)
    {
        $category->setData('name', $name);
        $category->setData('path', $path);
        $category->setData('parent_id', $parentId);

        return $category;
    }
}