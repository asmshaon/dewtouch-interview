<?php

App::uses('CSVParser', 'Utility');

class FileUploadController extends AppController
{
    public function index()
    {
        $this->set('title', __('File Upload Answer'));

        if ($this->request->is('post') && !empty($this->request->data('FileUpload')['file'])) {
            $csvFile = $this->request->data('FileUpload')['file'];

            if ($csvFile['error'] == 0 && $csvFile['size'] > 0) {
                $nameParts = explode('.', $csvFile['name']);
                $ext = strtolower(end($nameParts));
                $allowed = ['csv'];

                if (in_array($ext, $allowed) === true) {
                    $fileName = $csvFile["tmp_name"];
                    $total = 0;

                    if ($csv = CSVParser::import($fileName)) {
                        for ($i = 1; $i < count($csv); $i++) {
                            if (isset($csv[$i][0]) && isset($csv[$i][1])) {
                                $this->FileUpload->save(array('name' => $csv[$i][0], 'email' => $csv[$i][1]));
                                $this->FileUpload->clear();
                                $total++;
                            }
                        }
                    }

                    if ($total > 0) {
                        $this->setSuccess(sprintf('Successfully imported %d records', $total));
                    } else {
                        $this->setSuccess('No data found to import');
                    }
                } else {
                    $this->setError('Please upload CSV file only.');
                }
            } else {
                $this->setError('Please select a CSV file to upload.');
            }
        }

        $file_uploads = $this->FileUpload->find('all');

        $this->set(compact('file_uploads'));
    }
}
