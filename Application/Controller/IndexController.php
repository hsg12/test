<?php

namespace Application\Controller;

use Application\Components\AbstractBase;
use Application\Components\View;
use Application\Model\Customer;

class IndexController extends AbstractBase
{
    public function indexAction()
    {
        $customers = Customer::all();

        $view = new View([
            'customers' => $customers,
        ]);
        $view->setTemplate('index/index');
        $view->setHeadTitle('Home');
       
        return $view->ready();
    }
}
