<?php
/**
 * @author Atwix Team
 * @copyright Copyright (c) 2017 Atwix (https://www.atwix.com/)
 * @package Atwix_PHPUnitSample
 */

namespace Atwix\PHPUnitSample\Dummy;

class Translation
{
    /** Title Pattern */
    const TITLE = '%1 Options';

    /**
     * Sample Translation
     *
     * @param string $text
     *
     * @return \Magento\Framework\Phrase
     */
    public function execute($text)
    {
        $title = __(self::TITLE, $text);

        return $title;
    }
}