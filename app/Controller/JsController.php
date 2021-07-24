<?php
	class JsController extends AppController{

        public function q1()
        {
            $this->set('title', __('Question: Advanced Input Field'));

            $this->loadModel('transaction_items');
        }

        public function q1_detail()
        {
            $this->set('title', __('Question: Please change Pop Up to mouse over (soft click)'));
        }
		
	}