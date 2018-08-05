<?php
/**
 * @author Atwix Team
 * @copyright Copyright (c) 2017 Atwix (https://www.atwix.com/)
 * @package Atwix_PHPUnitSample
 */

namespace Atwix\PHPUnitSample\Test\Unit\Dummy;

use Atwix\PHPUnitSample\Dummy\LoopCollection;
use Magento\Framework\TestFramework\Unit\Helper\ObjectManager;
use PHPUnit\Framework\TestCase;
use Magento\Catalog\Model\Category;
use Magento\Customer\Model\ResourceModel\Customer\CollectionFactory;
use Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface;
use Magento\Framework\Api\SearchCriteriaInterface;
use ArrayIterator;
use Magento\Customer\Model\Customer;
use Magento\Customer\Model\ResourceModel\Customer\Collection;

/**
 * Class LoopCollectionTest
 */
class LoopCollectionTest extends TestCase
{
    /**
     * Object Manager Instance
     *
     * @var \Magento\Framework\TestFramework\Unit\Helper\ObjectManager
     */
    protected $objectManager;

    /**
     * @var \Atwix\PHPUnitSample\Dummy\LoopCollection
     */
    protected $sut;

    /**
     * @var \Magento\Customer\Model\ResourceModel\Customer\CollectionFactory|\PHPUnit_Framework_MockObject_MockObject
     */
    protected $collectionFactoryMock;

    /**
     * @var \Magento\Customer\Model\ResourceModel\Customer\Collection|\PHPUnit_Framework_MockObject_MockObject
     */
    protected $collectionMock;

    /**
     * @var \Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface|\PHPUnit_Framework_MockObject_MockObject
     */
    protected $collectionProcessorMock;

    /**
     * @var \Magento\Framework\Api\SearchCriteriaInterface|\PHPUnit_Framework_MockObject_MockObject
     */
    protected $searchCriteriaMock;

    /**
     * Model Mock
     *
     * @var Customer|\PHPUnit_Framework_MockObject_MockObject
     */
    protected $entityModelMock;

    /**
     * SetUp
     *
     * @return void
     */
    protected function setUp()
    {
        parent::setUp();
        $this->objectManager = new ObjectManager($this);

        $this->searchCriteriaMock = $this->getMockBuilder(SearchCriteriaInterface::class)
            ->disableOriginalConstructor()
            ->getMock();
        $this->entityModelMock = $this->getMockBuilder(Customer::class)
            ->disableOriginalConstructor()
            ->getMock();
        $this->collectionProcessorMock = $this->getMockBuilder(CollectionProcessorInterface::class)
            ->disableOriginalConstructor()
            ->getMock();
        $this->collectionMock = $this->getMockBuilder(Collection::class)
            ->disableOriginalConstructor()
            ->getMock();
        $this->collectionFactoryMock = $this->getMockBuilder(CollectionFactory::class)
            ->disableOriginalConstructor()
            ->getMock();
        $this->collectionFactoryMock->expects($this->any())
            ->method('create')
            ->willReturn($this->collectionMock);
        $this->sut = $this->objectManager->getObject(
            LoopCollection::class,
            [
                'customerCollectionFactory' => $this->collectionFactoryMock,
                'collectionProcessor' => $this->collectionProcessorMock,
            ]
        );
    }

    /**
     * Test execute method
     *
     * @return void
     */
    public function testExecute()
    {
        /** @var \ArrayIterator $arrayIterator */
        $arrayIterator = new \ArrayIterator([$this->entityModelMock]);
        $this->collectionMock->expects($this->once())->method('getIterator')
            ->willReturn($arrayIterator);

        $this->sut->execute($this->searchCriteriaMock);
    }
}