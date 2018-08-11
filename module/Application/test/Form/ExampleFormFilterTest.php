<?php
/**
 * Created by PhpStorm.
 * User: andrebian - Andre Cardoso https://github.com/andrebian
 * Date: 11/08/18
 * Time: 16:01
 */

namespace ApplicationTest\Form;

use Application\Form\ExampleFormFilter;
use PHPUnit\Framework\TestCase;
use Zend\InputFilter\BaseInputFilter;

/**
 * Class ExampleFormFilterTest
 * @package ApplicationTest\Form
 */
class ExampleFormFilterTest extends TestCase
{
    /**
     * @expectedException \Exception
     */
    public function testSetInputFilter()
    {
        $formFilter = new ExampleFormFilter();

        $filterInterface = new BaseInputFilter();
        $formFilter->setInputFilter($filterInterface);
    }

    public function testGetInputFilter()
    {
        $formFilter = new ExampleFormFilter();
        $result = $formFilter->getInputFilter();

        $this->assertNotNull($result);
        $this->assertArrayHasKey('text', $result->getInputs());
        $this->assertArrayHasKey('password', $result->getInputs());
        $this->assertArrayHasKey('password_confirmation', $result->getInputs());
    }
}
