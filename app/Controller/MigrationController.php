<?php
    App::uses('XLSXParser', 'Utility');

	class MigrationController extends AppController{

        public function q1()
        {

            $this->setFlash('Question: Migration of data to multiple DB table');

            if ($this->request->is('post') && !empty($this->request->data('FileUpload')['file'])) {
                $csvFile = $this->request->data('FileUpload')['file'];

                if ($csvFile['error'] == 0 && $csvFile['size'] > 0) {
                    $nameParts = explode('.', $csvFile['name']);
                    $ext = strtolower(end($nameParts));
                    $allowed = ['xlsx'];

                    if (in_array($ext, $allowed) === true) {
                        $fileName = $csvFile["tmp_name"];
                        $total = 0;

                        if ($xlsx = XLSXParser::parse($fileName)) {
                            print_r($xlsx->rows());



                        } else {
                            $this->setError(XLSXParser::parseError());
                        }

                        if ($total > 0) {
                            $this->setSuccess(sprintf('Successfully migrated %d records', $total));
                        } else {
                            $this->setError('No data found to migrate');
                        }
                    } else {
                        $this->setError('Please upload XLSX file only.');
                    }
                } else {
                    $this->setError('Please select a XLSX file to upload.');
                }
            }

            $this->loadModel('Member');
            $recores = $this->Member->find('all');

            $this->loadModel('Transaction');
            $recores2 = $this->Transaction->find('all');

            $this->loadModel('TransactionItem');
            $recores3 = $this->TransactionItem->find('all');
        }
		
		public function q1_instruction(){

			$this->setFlash('Question: Migration of data to multiple DB table');
				
			
			
// 			$this->set('title',__('Question: Please change Pop Up to mouse over (soft click)'));
		}
		
	}