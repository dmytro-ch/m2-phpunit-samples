<?php
/**
 * @author Atwix Team
 * @copyright Copyright (c) 2017 Atwix (https://www.atwix.com/)
 * @package Atwix_PHPUnitSample
 */

namespace Atwix\PHPUnitSample\Test\Unit\Dummy;

use Atwix\PHPUnitSample\Dummy\PluginWrapped;
use Magento\Catalog\Model\Category;
use Magento\Customer\Api\Data\GroupInterface;
use Magento\Customer\Api\GroupRepositoryInterface;
use Magento\Framework\TestFramework\Unit\Helper\ObjectManager;
use PHPUnit\Framework\TestCase;

/**
 * Class PluginWrappedTest
 */
class PluginWrappedTest extends TestCase
{
    /**
     * Object Manager Instance
     *
     * @var \Magento\Framework\TestFramework\Unit\Helper\ObjectManager
     */
    protected $objectManager;

    /**
     * @var \Atwix\PHPUnitSample\Dummy\PluginWrapped
     */
    protected $sut;

    /**
     * @var \Magento\Customer\Api\Data\GroupInterface|\PHPUnit_Framework_MockObject_MockObject
     */
    protected $paramMock;

    /**
     * @var \Magento\Customer\Api\Data\GroupInterface|\PHPUnit_Framework_MockObject_MockObject
     */
    protected $resultMock;

    /**
     * @var GroupRepositoryInterface|\PHPUnit_Framework_MockObject_MockObject
     */
    protected $subjectMock;

    /**
     * @var \Closure
     */
    protected $closure;

    /**
     * SetUp
     *
     * @return void
     */
    protected function setUp()
    {
        parent::setUp();
        $this->objectManager = new ObjectManager($this);
        $this->subjectMock = $this->getMockBuilder(GroupRepositoryInterface::class)
            ->disableOriginalConstructor()
            ->getMock();
        $this->paramMock = $this->getMockBuilder(GroupInterface::class)
            ->disableOriginalConstructor()
            ->getMock();
        $this->resultMock = $this->getMockBuilder(GroupInterface::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->sut = $this->objectManager->getObject(PluginWrapped::class);
    }

    /**
     * Test aroundSave method
     *
     * @return void
     */
    public function testAroundSave()
    {
        $this->closure = function () {
            return $this->resultMock;
        };

        $expected = $this->resultMock;
        $actual = $this->sut->aroundSave($this->subjectMock, $this->closure, $this->paramMock);

        $this->assertEquals($expected, $actual);
    }

    /**
     * Test aroundSave method
     *
     * @return void
     */
    public function testAroundSaveSecond()
    {
        $paramMock = $this->getMockBuilder(GroupInterface::class)
            ->disableOriginalConstructor()
            ->getMock();

        $closure = function () use ($paramMock) {
            return $paramMock;
        };

        $expected = $this->resultMock;
        $actual = $this->sut->aroundSave($this->subjectMock, $closure, $this->paramMock);

        $this->assertEquals($expected, $actual);
    }

    /**
     * Test aroundSave method
     *
     * @return void
     */
    public function testAroundSaveThirrd()
    {
        $paramMock = $this->getMockBuilder(GroupInterface::class)
            ->disableOriginalConstructor()
            ->getMock();

        $closure = function () use (&$paramMock) {
            // Make the needed changes here
            return $paramMock;
        };

        $expected = $this->resultMock;
        $actual = $this->sut->aroundSave($this->subjectMock, $closure, $this->paramMock);

        $this->assertEquals($expected, $actual);
    }
}