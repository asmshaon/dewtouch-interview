<?php

App::uses('Component', 'Controller');

/**
 * Class ImportComponent
 */
class ImportComponent extends Component
{
    /**
     * @param $csv
     * @return array
     */
    public function getCSVData($csv)
    {
        $data = [];

        for ($i = 1; $i < count($csv); $i++) {
            if (isset($csv[$i][0]) && isset($csv[$i][1])) {
                $data[] = array(
                    'name' => $csv[$i][0],
                    'email' => $csv[$i][1]
                );
            }
        }

        return $data;
    }
}
