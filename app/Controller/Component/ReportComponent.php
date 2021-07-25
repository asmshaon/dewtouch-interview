<?php

App::uses('Component', 'Controller');

/**
 * Class ReportComponent
 */
class ReportComponent extends Component
{
    /**
     * @param $orders
     * @param $portions
     * @return array
     */
    public function getOrderReportArray($orders, $portions)
    {
        $reportArray = array();
        $orderItemIds = array();
        $ingredientArray = array();
        $orderIngredients = array();

        foreach ($orders as $order) {
            foreach ($order['OrderDetail'] as $orderDetail) {
                $orderItemIds[$order['Order']['name']][] = $orderDetail['item_id'];
            }
        }

        foreach ($portions as $portion) {
            foreach ($portion['PortionDetail'] as $portionDetail) {
                $ingredientArray[$portion['Portion']['item_id']][$portionDetail['Part']['name']] = $portionDetail['value'];
            }
        }

        foreach ($orderItemIds as $order => $itemIds) {
            foreach ($itemIds as $itemId) {
                if(isset($ingredientArray[$itemId])) {
                    $orderIngredients[$order][] = $ingredientArray[$itemId];
                }
            }
        }

        foreach ($orderIngredients as $order => $ingredientWithValue) {
            foreach ($ingredientWithValue as $ingredients) {
                foreach ($ingredients as $ingredient => $value) {
                    if(!empty($reportArray[$order]) && key_exists($ingredient, $reportArray[$order])) {
                        $value += $reportArray[$order][$ingredient];
                    }

                    $reportArray[$order][$ingredient] = number_format($value, 2);
                }
            }
        }

        return $reportArray;
    }
}
