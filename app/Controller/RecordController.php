<?php
	class RecordController extends AppController{

        public function index()
        {
			$this->setFlash('Listing Record page too slow, try to optimize it.');

            if($this->request->is('post')) {
                $limit = $this->request->data('iDisplayLength');
                $offset = $this->request->data('iDisplayStart');
                $searchKey = $this->request->data('sSearch');

                $conditions = array();
                $orCondition = array();

                if(empty($searchKey) === false) {
                    $searchKey = trim($searchKey);
                    $orCondition[]['id LIKE'] = '%' . $searchKey . '%';
                    $orCondition[]['name LIKE'] = '%' . $searchKey . '%';

                    $conditions += [
                        'OR' => $orCondition
                    ];
                }

                $records = $this->Record->find('all', array('conditions' => $conditions,'limit' => $limit, 'offset' => $offset));

                $count = $this->Record->find('count', [
                    'conditions' => $conditions
                ]);

                $responseData = array(
                    'draw' => $this->request->data('sEcho'),
                    'iTotalDisplayRecords' => $count,
                    'iTotalRecords' => $count,
                    'aaData' => []
                );

                foreach ($records as $key => $record) {
                    $responseData['aaData'][$key] = array(
                        $record['Record']['id'],
                        $record['Record']['name']
                    );
                }

                $result = json_encode($responseData, JSON_PRETTY_PRINT);
                $this->response->body($result);

                return $this->response;
            }
			
			
			$this->set('title',__('List Record'));
		}
		
		
// 		public function update(){
// 			ini_set('memory_limit','256M');
			
// 			$records = array();
// 			for($i=1; $i<= 1000; $i++){
// 				$record = array(
// 					'Record'=>array(
// 						'name'=>"Record $i"
// 					)			
// 				);
				
// 				for($j=1;$j<=rand(4,8);$j++){
// 					@$record['RecordItem'][] = array(
// 						'name'=>"Record Item $j"		
// 					);
// 				}
				
// 				$this->Record->saveAssociated($record);
// 			}
			
			
			
// 		}
	}