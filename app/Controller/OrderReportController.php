<?php
	class OrderReportController extends AppController{

        public function index()
        {
            $this->setFlash('Multidimensional Array.');

            $order_reports = $this->getOrderReportArray();

            $this->set('order_reports', $order_reports);

            $this->set('title', __('Orders Report'));
		}

		public function Question(){

			$this->setFlash('Multidimensional Array.');

			$this->loadModel('Order');
			$orders = $this->Order->find('all',array('conditions'=>array('Order.valid'=>1),'recursive'=>2));

			// debug($orders);exit;

			$this->set('orders',$orders);

			$this->loadModel('Portion');
			$portions = $this->Portion->find('all',array('conditions'=>array('Portion.valid'=>1),'recursive'=>2));
				
			// debug($portions);exit;

			$this->set('portions',$portions);

			$this->set('title',__('Question - Orders Report'));
		}

        private function getOrderReportArray()
        {
            return array(
                'Order 1' => array(
                    array(
                        'item' => 'Fried Rice with Silver Fish',
                        'quantity' => 1,
                        'ingredients' => array(
                            array(
                                'name' =>  'Ingredient A',
                                'value' => 1.50
                            ),
                            array(
                                'name' =>  'Ingredient B',
                                'value' => 1.20
                            ),
                            array(
                                'name' =>  'Ingredient C',
                                'value' => 3.20
                            )
                        )
                    ),
                    array(
                        'item' => 'Sing Chew Fried Bee Hoon',
                        'quantity' => 3,
                        'ingredients' => array(
                            array(
                                'name' =>  'Ingredient D',
                                'value' => 2.22
                            ),
                            array(
                                'name' =>  'Ingredient E',
                                'value' => 1.12
                            ),
                            array(
                                'name' =>  'Ingredient F',
                                'value' => 5.20
                            )
                        )
                    ),
                    array(
                        'item' => 'Lemon Chicken',
                        'quantity' => 3,
                        'ingredients' => array(
                            array(
                                'name' =>  'Ingredient G',
                                'value' => 3.50
                            ),
                            array(
                                'name' =>  'Ingredient H',
                                'value' => 4.20
                            ),
                            array(
                                'name' =>  'Ingredient I',
                                'value' => 4.20
                            )
                        )
                    ),
                ),
                'Order 2' => array(
                    array(
                        'item' => 'KFC Chicken',
                        'quantity' => 1,
                        'ingredients' => array(
                            array(
                                'name' =>  'Ingredient X',
                                'value' => 5.50
                            ),
                            array(
                                'name' =>  'Ingredient Y',
                                'value' => 9.20
                            )
                        )
                    ),
                    array(
                        'item' => 'Al Bike roll',
                        'quantity' => 3,
                        'ingredients' => array(
                            array(
                                'name' =>  'Tomato Sausage',
                                'value' => 3.50
                            ),
                            array(
                                'name' =>  'Salt',
                                'value' => 0.50
                            )
                        )
                    )
                )
            );
        }

	}