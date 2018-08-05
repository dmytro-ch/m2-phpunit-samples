<?php
/**
 * @author Atwix Team
 * @copyright Copyright (c) 2017 Atwix (https://www.atwix.com/)
 * @package Atwix_PHPUnitSample
 */

namespace Atwix\PHPUnitSample\Test\Unit\Dummy;

use Atwix\PHPUnitSample\Dummy\Translation;
use Magento\Framework\TestFramework\Unit\Helper\ObjectManager;
use PHPUnit\Framework\TestCase;
use Magento\Framework\Phrase;

/**
 * Class TranslationTest
 */
class TranslationTest extends TestCase
{
    /**
     * Object Manager Instance
     *
     * @var \Magento\Framework\TestFramework\Unit\Helper\ObjectManager
     */
    protected $objectManager;

    /**
     * @var \Atwix\PHPUnitSample\Dummy\Translation
     */
    protected $sut;

    /**
     * SetUp
     *
     * @return void
     */
    protected function setUp()
    {
        parent::setUp();
        $this->objectManager = new ObjectManager($this);

        $this->sut = $this->objectManager->getObject(Translation::class);
    }

    /**
     * Test execute method
     *
     * @return void
     */
    public function testExecute()
    {
        $text = 'Shopping';
        $expected = new Phrase('%1 Options', [$text]);
        $actual = $this->sut->execute($text);

        $this->assertEquals($expected, $actual);
    }
}