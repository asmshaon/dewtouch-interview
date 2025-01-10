<?php
	class OrderReportController extends AppController{

        public $components = array('Report');

        public function index()
        {
            $this->setFlash('Multidimensional Array.');

            $this->loadModel('Order');
            $orders = $this->Order->find('all', array('conditions' => array('Order.valid' => 1), 'recursive' => 2));

            $this->loadModel('Portion');
            $portions = $this->Portion->find('all', array('conditions' => array('Portion.valid' => 1), 'recursive' => 2));

            $order_reports = $this->Report->getOrderReportArray($orders, $portions);

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

	}