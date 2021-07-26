<?php

App::uses('Component', 'Controller');

/**
 * Class MigrationComponent
 */
class MigrationComponent extends Component
{
    /**
     * @param $rows
     * @return array
     * @throws Exception
     */
    public function getMigrationData($rows)
    {
        $data = [];

        foreach ($rows as $key => $row) {
            if ($key === 0) {
                continue;
            }

            $date = new DateTime($row[0]);

            $data[] = array(
                'Member' => array(
                    'type' => isset(explode(' ', $row[3])[0]) ? explode(' ', $row[3])[0] : '',
                    'no' => isset(explode(' ', $row[3])[1]) ? explode(' ', $row[3])[1] : '',
                    'name' => $row[2],
                    'company' => !empty($row[5]) ? $row[5] : null
                ),
                'Transaction' => array(
                    array(
                        'member_name' => $row[2],
                        'member_paytype' => $row[10],
                        'member_company' => !empty($row[5]) ? $row[5] : null,
                        'date' => $date->format('Y-m-d'),
                        'year' => $date->format('Y'),
                        'month' => $date->format('m'),
                        'ref_no' => $row[1],
                        'receipt_no' => $row[8],
                        'payment_method' => $row[6],
                        'batch_no' => !empty($row[7]) ? $row[7] : null,
                        'cheque_no' => !empty($row[9]) ? $row[9] : null,
                        'payment_type' => $row[10],
                        'renewal_year' => $row[11],
                        'subtotal' => number_format($row[12], 2),
                        'tax' => number_format($row[13], 2),
                        'total' => number_format($row[14], 2),
                        'TransactionItem' => array(
                            array(
                                'description' => sprintf('Being Payment for : %s : %d', $row[10], $row[11]),
                                'quantity' => 1,
                                'unit_price' => number_format($row[12], 2),
                                'sum' => number_format($row[12], 2)
                            )
                        )
                    )
                )
            );
        }

        return $data;
    }
}
