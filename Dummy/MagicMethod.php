<?php
/**
 * @author Atwix Team
 * @copyright Copyright (c) 2017 Atwix (https://www.atwix.com/)
 * @package Atwix_PHPUnitSample
 */

namespace Atwix\PHPUnitSample\Dummy;

/**
 * Class MagicMethod
 */
class MagicMethod
{
    /**
     * @param \Magento\Catalog\Model\Category $category
     * @param string $subTitle
     * @param string $notification
     *
     * @return \Magento\Catalog\Model\Category
     */
    public function execute(\Magento\Catalog\Model\Category $category, $subTitle, $notification)
    {
        $category->setSetSubTitle($subTitle);
        $category->setNotification($notification);

        //var_dump(get_class_methods($category));

        return $category;
    }
}