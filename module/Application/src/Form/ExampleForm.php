<?php
/**
 * Created by PhpStorm.
 * User: andrebian - Andre Cardoso https://github.com/andrebian
 * Date: 11/08/18
 * Time: 00:58
 */

namespace Application\Form;

use Zend\Form\Element\Checkbox;
use Zend\Form\Element\File;
use Zend\Form\Element\Number;
use Zend\Form\Element\Password;
use Zend\Form\Element\Radio;
use Zend\Form\Element\Select;
use Zend\Form\Element\Submit;
use Zend\Form\Element\Text;
use Zend\Form\Element\Textarea;
use Zend\Form\Form;

/**
 * Class ExampleForm
 * @package Application\Form
 */
class ExampleForm extends Form
{
    public function __construct($name = null, array $options = [])
    {
        parent::__construct($name, $options);

        $this->setAttribute('enctype', 'multipart/form-data');

        $exampleFormFilter = new ExampleFormFilter();
        $this->setInputFilter($exampleFormFilter->getInputFilter());

        $this->add([
            'name' => 'text',
            'type' => Text::class,
            'options' => [
                'label' => 'Um campo de texto'
            ],
            'attributes' => [
                'id' => 'text',
                'class' => 'form-control'
            ]
        ]);

        $this->add([
            'name' => 'textarea',
            'type' => Textarea::class,
            'options' => [
                'label' => 'Uma área de texto'
            ],
            'attributes' => [
                'id' => 'textarea',
                'class' => 'form-control'
            ]
        ]);

        $this->add([
            'name' => 'number',
            'type' => Number::class,
            'options' => [
                'label' => 'Um campo numeral'
            ],
            'attributes' => [
                'id' => 'number',
                'class' => 'form-control'
            ]
        ]);

        $this->add([
            'name' => 'select',
            'type' => Select::class,
            'options' => [
                'label' => 'Uma select',
                'value_options' => [
                    0 => 'Primeira opção',
                    1 => 'Segunda opção'
                ],
                'empty_option' => 'Selecione uma opção'
            ],
            'attributes' => [
                'id' => 'select',
                'class' => 'form-control'
            ]
        ]);

        $this->add([
            'name' => 'checkbox',
            'type' => Checkbox::class,
            'options' => [
                'label' => 'Check',
                'checked_value' => 'on',
                'unchecked_value' => 'off'
            ],
            'attributes' => [
                'id' => 'checkbox',
                'class' => 'form-control',
            ]
        ]);

        $this->add([
            'name' => 'radio',
            'type' => Radio::class,
            'options' => [
                'label' => 'Radio',
                'value_options' => [
                    0 => 'Opção 1',
                    1 => 'Opção 2'
                ]
            ],
            'attributes' => [
                'id' => 'radio',
                'class' => 'form-control'
            ]
        ]);

        $this->add([
            'name' => 'password',
            'type' => Password::class,
            'options' => [
                'label' => 'Senha'
            ],
            'attributes' => [
                'id' => 'password',
                'class' => 'form-control'
            ]
        ]);

        $this->add([
            'name' => 'password_confirmation',
            'type' => Password::class,
            'options' => [
                'label' => 'Confirme a senha'
            ],
            'attributes' => [
                'id' => 'password_confirmation',
                'class' => 'form-control'
            ]
        ]);

        $this->add([
            'name' => 'submit',
            'type' => Submit::class,
            'attributes' => [
                'id' => 'submit',
                'class' => 'btn btn-success',
                'value' => 'Submit'
            ]
        ]);
    }
}
