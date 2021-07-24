<?php
	class FormatController extends AppController{

        public function q1()
        {
            $this->set('title', __('Change Display'));
            $this->setFlash('Question: Please change Pop Up to mouse over (soft click)');

// 			$this->set('title',__('Question: Please change Pop Up to mouse over (soft click)'));
        }

        public function q1_selection()
        {
            $this->set('title', __('Change Display'));

            if ($this->request->is('post') && !empty($this->request->data('Type')['type'])) {
                $this->set('selected_value', $this->request->data('Type')['type']);;
            } else {
                $this->setFlash('Nothing selected.');
            }
        }
		
		public function q1_detail(){

			$this->setFlash('Question: Please change Pop Up to mouse over (soft click)');
				
			
			
// 			$this->set('title',__('Question: Please change Pop Up to mouse over (soft click)'));
		}


	}