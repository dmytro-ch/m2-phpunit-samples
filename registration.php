<?php
/**
 * @author Atwix Team
 * @copyright Copyright (c) 2017 Atwix (https://www.atwix.com/)
 * @package Atwix_PHPUnitSample
 */

use \Magento\Framework\Component\ComponentRegistrar;

ComponentRegistrar::register(
    ComponentRegistrar::MODULE,
    'Atwix_PHPUnitSample',
    __DIR__
);