<?php
/**
 * @author Atwix Team
 * @copyright Copyright (c) 2017 Atwix (https://www.atwix.com/)
 * @package Atwix_PHPUnitSample
 */

namespace Atwix\PHPUnitSample\Test\Unit\Dummy;

use Atwix\PHPUnitSample\Dummy\Setter;
use Magento\Framework\TestFramework\Unit\Helper\ObjectManager;
use PHPUnit\Framework\TestCase;
use Magento\Catalog\Model\Category;

/**
 * Class SetterTest
 */
class SetterTest extends TestCase
{
    /**
     * Object Manager Instance
     *
     * @var \Magento\Framework\TestFramework\Unit\Helper\ObjectManager
     */
    protected $objectManager;

    /**
     * @var \Atwix\PHPUnitSample\Dummy\Setter
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
        $this->categoryMock = $this->getMockBuilder(Category::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->sut = $this->objectManager->getObject(Setter::class);
    }

    /**
     * Test execute method
     *
     * @return void
     */
    public function testExecute()
    {
        $name = 'test_name';
        $path = 'test/path';
        $parentId = 3;

        $this->categoryMock->expects($this->exactly(3))
            ->method('setData')
            ->withConsecutive(
                [$this->equalTo('name'), $this->equalTo($name)],
                [$this->equalTo('path'), $this->equalTo($path)],
                [$this->equalTo('parent_id'), $this->greaterThan(0)]
            );


        $this->categoryMock->expects($this->at(0))
            ->method('setData')
            ->with('name', $name);
        $this->categoryMock->expects($this->at(1))
            ->method('setData')
            ->with('path', $path);
        $this->categoryMock->expects($this->at(2))
            ->method('setData')
            ->with('parent_id', $parentId);

        $this->sut->execute($this->categoryMock, $name, $path, $parentId);
    }
}