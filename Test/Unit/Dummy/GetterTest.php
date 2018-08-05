<?php
/**
 * @author Atwix Team
 * @copyright Copyright (c) 2017 Atwix (https://www.atwix.com/)
 * @package Atwix_PHPUnitSample
 */

namespace Atwix\PHPUnitSample\Test\Unit\Dummy;

use Atwix\PHPUnitSample\Dummy\Getter;
use Magento\Framework\TestFramework\Unit\Helper\ObjectManager;
use PHPUnit\Framework\TestCase;
use Magento\Catalog\Model\Category;

/**
 * Class GetterTest
 */
class GetterTest extends TestCase
{
    /**
     * Object Manager Instance
     *
     * @var \Magento\Framework\TestFramework\Unit\Helper\ObjectManager
     */
    protected $objectManager;

    /**
     * @var \Atwix\PHPUnitSample\Dummy\Getter
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

        $this->sut = $this->objectManager->getObject(Getter::class);
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
            ->method('getData')
            ->willReturnMap([
                ['name', null, $name],
                ['path', null, $path],
                ['parent_id', null, $parentId],
            ]);

        $expected = [$name, $path, $parentId];
        $actual = $this->sut->execute($this->categoryMock);

        $this->assertEquals($expected, $actual);
    }
}