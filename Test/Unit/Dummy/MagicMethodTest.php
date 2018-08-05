<?php
/**
 * @author Atwix Team
 * @copyright Copyright (c) 2017 Atwix (https://www.atwix.com/)
 * @package Atwix_PHPUnitSample
 */

namespace Atwix\PHPUnitSample\Test\Unit\Dummy;

use Atwix\PHPUnitSample\Dummy\MagicMethod;
use Magento\Framework\TestFramework\Unit\Helper\ObjectManager;
use PHPUnit\Framework\TestCase;
use Magento\Catalog\Model\Category;

/**
 * Class MagicMethodTest
 */
class MagicMethodTest extends TestCase
{
    /**
     * Object Manager Instance
     *
     * @var \Magento\Framework\TestFramework\Unit\Helper\ObjectManager
     */
    protected $objectManager;

    /**
     * @var \Atwix\PHPUnitSample\Dummy\MagicMethod
     */
    protected $sut;

    /**
     * @var \Magento\Catalog\Model\Category|\PHPUnit_Framework_MockObject_MockObject
     */
    protected $categoryMock;

    /**
     * SetUp
     *
     * @return void
     */
    protected function setUp()
    {
        parent::setUp();
        $this->objectManager = new ObjectManager($this);

        //Atwix\PHPUnitSample\Test\Unit\Dummy\MagicMethodTest::testExecute
        //Trying to configure method "setSetSubTitle" which cannot be configured because it does not exist, has not been specified, is final, or is static

        $this->categoryMock = $this->getMockBuilder(Category::class)
            ->disableOriginalConstructor()
            ->setMethods(['setSetSubTitle', 'setNotification'])
            ->getMock();

        $this->sut = $this->objectManager->getObject(MagicMethod::class);
    }

    /**
     * Test execute method
     *
     * @return void
     */
    public function testExecute()
    {
        $subTitle = 'test_subtitle';
        $notification = 'test_notification';

        $this->categoryMock->expects($this->once())
            ->method('setSetSubTitle')
            ->with($subTitle);
        $this->categoryMock->expects($this->once())
            ->method('setNotification')
            ->with($notification);

        $this->sut->execute($this->categoryMock, $subTitle, $notification);
    }
}