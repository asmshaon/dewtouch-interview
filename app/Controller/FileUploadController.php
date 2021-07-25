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
                    $data = [];

                    if ($csv = CSVParser::import($fileName)) {
                        for ($i = 1; $i < count($csv); $i++) {
                            if (isset($csv[$i][0]) && isset($csv[$i][1])) {
                                $data[] = array(
                                    'name' => $csv[$i][0],
                                    'email' => $csv[$i][1]
                                );
                            }
                        }
                    }

                    if (count($data) > 0) {
                        $this->FileUpload->saveMany($data);
                        $this->setSuccess(sprintf('Successfully imported %d records', count($data)));
                    } else {
                        $this->setError('No data found to import');
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
