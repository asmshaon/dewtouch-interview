<?php
	class OrderReportController extends AppController{

        public function index()
        {
            $this->setFlash('Multidimensional Array.');

            $this->loadModel('Order');
            $orders = $this->Order->find('all', array('conditions' => array('Order.valid' => 1), 'recursive' => 2));

            $this->loadModel('Portion');
            $portions = $this->Portion->find('all', array('conditions' => array('Portion.valid' => 1), 'recursive' => 2));

            $order_reports = $this->getOrderReportArray($orders, $portions);

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

        private function getOrderReportArray($orders, $portions)
        {
            $reportArray = array();
            $orderItemIds = array();
            $ingredientArray = array();
            $orderIngredients = array();

            foreach ($orders as $order) {
                foreach ($order['OrderDetail'] as $orderDetail) {
                    $orderItemIds[$order['Order']['name']][] = $orderDetail['item_id'];
                }
            }

            foreach ($portions as $portion) {
                foreach ($portion['PortionDetail'] as $portionDetail) {
                    $ingredientArray[$portion['Portion']['item_id']][$portionDetail['Part']['name']] = $portionDetail['value'];
                }
            }

            foreach ($orderItemIds as $order => $itemIds) {
                foreach ($itemIds as $itemId) {
                    if(isset($ingredientArray[$itemId])) {
                        $orderIngredients[$order][] = $ingredientArray[$itemId];
                    }
                }
            }

            foreach ($orderIngredients as $order => $ingredientWithValue) {
                foreach ($ingredientWithValue as $ingredients) {
                    foreach ($ingredients as $ingredient => $value) {
                        if(!empty($reportArray[$order]) && key_exists($ingredient, $reportArray[$order])) {
                            $value += $reportArray[$order][$ingredient];
                        }

                        $reportArray[$order][$ingredient] = number_format($value, 2);
                    }
                }
            }

            return $reportArray;
        }

	}