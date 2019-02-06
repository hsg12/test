<?php

return [
    'customers/add'             => 'customer/add',       // addAction   in CustomerController
    'customers/attach'             => 'customer/attach',       // attachAction   in CustomerController
    'customers/edit/([0-9]+)'   => 'customer/edit/$1',   // editAction   in CustomerController
    'customers/update/([0-9]+)'   => 'customer/update/$1',   // updateAction   in CustomerController
    'customers/delete/([0-9]+)' => 'customer/delete/$1', // deleteAction   in CustomerController
    'customers'                 => 'customer/index',     // indexAction in CustomerController

    '' => 'index/index', // indexAction in IndexController
];
