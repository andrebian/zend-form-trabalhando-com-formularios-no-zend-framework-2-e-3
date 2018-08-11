<?php
/**
 * Created by PhpStorm.
 * User: andrebian - Andre Cardoso https://github.com/andrebian
 * Date: 11/08/18
 * Time: 02:08
 */

namespace Application\Form;

use Zend\Filter\StringTrim;
use Zend\Filter\StripTags;
use Zend\InputFilter\InputFilter;
use Zend\InputFilter\InputFilterAwareInterface;
use Zend\InputFilter\InputFilterInterface;
use Zend\Validator\Identical;
use Zend\Validator\StringLength;

/**
 * Class ExampleFormFilter
 * @package Application\Form
 */
class ExampleFormFilter implements InputFilterAwareInterface
{
    /**
     * @inheritdoc
     * @throws \Exception
     */
    public function setInputFilter(InputFilterInterface $inputFilter)
    {
        throw new \Exception('Não utilizaremos este método');
    }

    /**
     * @inheritdoc
     */
    public function getInputFilter()
    {
        $inputFilter = new InputFilter();

        // Aqui definiremos nossos filtros e validações

        $inputFilter->add([
            'name' => 'text',
            'required' => true,
            'filters' => [
                ['name' => StripTags::class],
                ['name' => StringTrim::class]
            ],
            'validators' => [
                [
                    'name' => StringLength::class,
                    'options' => [
                        'encoding' => 'UTF-8',
                        'min' => 1,
                        'max' => 255
                    ]
                ]
            ]
        ]);

        $inputFilter->add([
            'name' => 'password',
            'required' => true,
            'filters' => [
                ['name' => StripTags::class],
                ['name' => StringTrim::class]
            ],
            'validators' => [
                [
                    'name' => StringLength::class,
                    'options' => [
                        'encoding' => 'UTF-8',
                        'min' => 6,
                        'max' => 14
                    ]
                ]
            ]
        ]);

        $inputFilter->add([
            'name' => 'password_confirmation',
            'required' => true,
            'filters' => [
                ['name' => StripTags::class],
                ['name' => StringTrim::class]
            ],
            'validators' => [
                [
                    'name' => StringLength::class,
                    'options' => [
                        'encoding' => 'UTF-8',
                        'min' => 6,
                        'max' => 14
                    ]
                ],
                [
                    'name' => Identical::class,
                    'options' => [
                        'token' => 'password',
                        'messages' => [
                            Identical::NOT_SAME => 'Senhas não conferem'
                        ]
                    ]
                ]
            ]
        ]);

        return $inputFilter;
    }
}
