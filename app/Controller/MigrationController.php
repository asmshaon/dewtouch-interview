<?php
    App::uses('XLSXParser', 'Utility');

	class MigrationController extends AppController{

        public $components = array('Migration');

        public function q1()
        {
            $this->set('title', __('Question: Migration of data to multiple DB table'));

            $this->loadModel('Member');
            $this->loadModel('Transaction');
            $this->loadModel('TransactionItem');

            $this->setFlash('Question: Migration of data to multiple DB table');

            if ($this->request->is('post') && !empty($this->request->data('FileUpload')['file'])) {
                $csvFile = $this->request->data('FileUpload')['file'];

                if ($csvFile['error'] == 0 && $csvFile['size'] > 0) {
                    $nameParts = explode('.', $csvFile['name']);
                    $ext = strtolower(end($nameParts));
                    $allowed = ['xlsx'];

                    if (in_array($ext, $allowed) === true) {
                        $fileName = $csvFile["tmp_name"];
                        $data = [];

                        if ($xlsx = XLSXParser::parse($fileName)) {
                            try {
                                $data = $this->Migration->getMigrationData($xlsx->rows());
                                // Save all in a single shot, great, right?
                                $this->Member->saveAll($data, array('deep' => true));
                            } catch (Exception $exception) {
                                $this->setError($exception->getMessage());
                            }
                        } else {
                            $this->setError(XLSXParser::parseError());
                        }

                        if (count($data) > 0) {
                            $this->setSuccess(sprintf('Successfully migrated %d records', count($data)));
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
        }

		public function q1_instruction(){

			$this->setFlash('Question: Migration of data to multiple DB table');

			
			
// 			$this->set('title',__('Question: Please change Pop Up to mouse over (soft click)'));
		}
		
	}