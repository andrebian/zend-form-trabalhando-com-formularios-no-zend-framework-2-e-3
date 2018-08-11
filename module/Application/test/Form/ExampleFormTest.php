<?php
/**
 * Created by PhpStorm.
 * User: andrebian - Andre Cardoso https://github.com/andrebian
 * Date: 11/08/18
 * Time: 14:29
 */

namespace ApplicationTest\Form;

use Application\Form\ExampleForm;
use PHPUnit\Framework\TestCase;
use Zend\Form\Form;

/**
 * Class ExampleFormTest
 * @package ApplicationTest\Form
 */
class ExampleFormTest extends TestCase
{
    /**
     * @var ExampleForm
     */
    protected $form;

    protected function setUp()
    {
        // Inicializando o form
        $this->form = new ExampleForm();

        parent::setUp();
    }

    /**
     * Definindo os campos existentes em nosso form
     * @return array
     */
    public function formFields()
    {
        return [
            ['text'],
            ['textarea'],
            ['number'],
            ['select'],
            ['checkbox'],
            ['radio'],
            ['password'],
            ['password_confirmation'],
            ['submit'],
        ];
    }

    /**
     * Definindo todos os dados simulando um form preenchido integralmente
     * @return array
     */
    public function getData()
    {
        return [
            'text' => 'Um valor qualquer',
            'textarea' => 'Um textarea qualquer',
            'number' => 12345,
            'select' => 1,
            'checkbox' => 'on',
            'radio' => 1,
            'password' => 'test-123',
            'password_confirmation' => 'test-123',
        ];
    }

    /**
     * Obtendo todos os atributos do form real
     * @return array
     */
    public function getFormAttributes()
    {
        $dataProviderTest = $this->formFields();
        $definedAttributes = array();
        foreach ($dataProviderTest as $item) {
            $definedAttributes[] = $item[0];
        }

        return $definedAttributes;
    }

    /**
     * Garantindo que o form extende do Zend form
     */
    public function testIfClassIsASubClassOfZendForm()
    {
        $class = class_parents($this->form);
        $formExtendsOf = current($class);
        $this->assertEquals(Form::class, $formExtendsOf);
    }

    /**
     * Garantindo que o form real está conforme o esperado no teste
     * @dataProvider formFields()
     */
    public function testFormFields($fieldName)
    {
        $this->assertTrue($this->form->has($fieldName), 'Field "' . $fieldName . '" not found.');
    }

    /**
     * Verifica se os atributos estão espelhados, suas existências e respectivas ordens
     */
    public function testIfIsAttributesMirrored()
    {
        $definedAttributes = $this->getFormAttributes();
        $attributesFormClass = $this->form->getElements();
        $attributesForm = array();
        foreach ($attributesFormClass as $key => $value) {
            $attributesForm[] = $key;
            $messageAssert = 'Attribute "' . $key . '" not found in class test. Value - ' . $value->getName();
            $this->assertContains($key, $definedAttributes, $messageAssert);
        }

        $this->assertTrue(($definedAttributes === $attributesForm), 'Attributes not equals.');
    }

    /**
     * E por fim testando se os dados estão sendo validados corretamente
     */
    public function testIfCompleteDataAreValid()
    {
        $this->form->setData($this->getData());
        $this->assertTrue($this->form->isValid());
    }
}
