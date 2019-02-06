<?php

namespace Application\Controller;

use Application\Components\AbstractBase;
use Application\Components\View;
use Application\Model\Customer;

class CustomerController extends AbstractBase
{
    protected $states = array(
        'AL' => 'Alabama',
        'AK' => 'Alaska',
        'AZ' => 'Arizona',
        'AR' => 'Arkansas',
        'CA' => 'California',
        'CO' => 'Colorado',
        'CT' => 'Connecticut',
        'DE' => 'Delaware',
        'DC' => 'District Of Columbia',
        'FL' => 'Florida',
        'GA' => 'Georgia',
        'HI' => 'Hawaii',
        'ID' => 'Idaho',
        'IL' => 'Illinois',
        'IN' => 'Indiana',
        'IA' => 'Iowa',
        'KS' => 'Kansas',
        'KY' => 'Kentucky',
        'LA' => 'Louisiana',
        'ME' => 'Maine',
        'MD' => 'Maryland',
        'MA' => 'Massachusetts',
        'MI' => 'Michigan',
        'MN' => 'Minnesota',
        'MS' => 'Mississippi',
        'MO' => 'Missouri',
        'MT' => 'Montana',
        'NE' => 'Nebraska',
        'NV' => 'Nevada',
        'NH' => 'New Hampshire',
        'NJ' => 'New Jersey',
        'NM' => 'New Mexico',
        'NY' => 'New York',
        'NC' => 'North Carolina',
        'ND' => 'North Dakota',
        'OH' => 'Ohio',
        'OK' => 'Oklahoma',
        'OR' => 'Oregon',
        'PA' => 'Pennsylvania',
        'RI' => 'Rhode Island',
        'SC' => 'South Carolina',
        'SD' => 'South Dakota',
        'TN' => 'Tennessee',
        'TX' => 'Texas',
        'UT' => 'Utah',
        'VT' => 'Vermont',
        'VA' => 'Virginia',
        'WA' => 'Washington',
        'WV' => 'West Virginia',
        'WI' => 'Wisconsin',
        'WY' => 'Wyoming',
    );

    public function indexAction()
    {
        $customers = Customer::all();

        $view = new View([
            'customers' => $customers,
        ]);
        $view->setTemplate('customers/index');
        $view->setHeadTitle('Manage Customers');

        return $view->ready();
    }

    public function addAction()
    {

        $view = new View([
            'states' => (object)$this->states,
        ]);
        $view->setTemplate('customers/add');
        $view->setHeadTitle('Add Customer');

        return $view->ready();
    }

    public function attachAction()
    {

        if (isset($_POST['add_customer'])) {
            $name = $this->clearStr($_POST['name']);
            $email = $this->clearStr($_POST['email']);
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                // invalid email
            }
            $state = $this->clearStr($_POST['state']);
            $interested = $this->clearStr($_POST['interested']) ?? 0;



            /*echo $name . '<br>';
            echo $email . '<br>';
            echo $state . '<br>';
            echo $interested . '<br>';*/

            $res = Customer::insert($name, $email, $state, $interested);

            //var_dump($res);

        }


        $this->redirectTo('/customers');
    }

    public function editAction($id)
    {
        $id = $this->clearInt($id);
        //var_dump($id);

        $customer = Customer::getById($id);
        //var_dump($customer);

        $view = new View([
            'customer' => $customer,
            'states' => (object)$this->states,
        ]);

        $view->setTemplate('customers/edit');
        $view->setHeadTitle('Edit Customer');

        return $view->ready();
    }

    public function updateAction($id)
    {

        $id = $this->clearInt($id);

        if (isset($_POST['edit_customer'])) {
            $name = $this->clearStr($_POST['name']);
            $email = $this->clearStr($_POST['email']);
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                // invalid email
            }
            $state = $this->clearStr($_POST['state']);
            $interested = $this->clearStr($_POST['interested']) ?? 0;



            /*echo $id . '<br>';
            echo $name . '<br>';
            echo $email . '<br>';
            echo $state . '<br>';
            echo $interested . '<br>';*/

            $res = Customer::update($name, $email, $state, $interested, $id);

            //var_dump($res);

        }

        $this->redirectTo('/customers');
    }



    public function deleteAction($id)
    {


        $id = $this->clearInt($id);
        //var_dump($id);

        $res = Customer::remove($id);

        var_dump($res);





        $this->redirectTo('/customers');
    }


}
