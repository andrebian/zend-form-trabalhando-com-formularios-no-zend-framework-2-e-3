<?php
/**
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2016 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application\Controller;

use Application\Form\ExampleForm;
use Zend\Http\Request;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class IndexController extends AbstractActionController
{
    public function indexAction()
    {
        return new ViewModel();
    }

    public function addAction()
    {
        $form = new ExampleForm();
        // inicializando nossa variável de erros
        $errorMessages = [];

        /** @var Request $request */
        $request = $this->getRequest();

        // Caso o request seja um POST
        if ($request->isPost()) {
            // Obtemos os dados digitados pelo usuário
            $data = $request->getPost()->toArray();

            // e os passamos para o form
            $form->setData($data);

            // validamos se os dados estão ok
            if (! $form->isValid()) {
                // caso não estejam, recuperamos os erros
                $errorMessages = $form->getMessages();
            }
        }

        return new ViewModel([
            'form' => $form,

            // Por fim passamos a variável de erros para a view
            'errorMessages' => $errorMessages
        ]);
    }
}
