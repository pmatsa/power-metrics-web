<?php

namespace App\Charts;

use App\Http\Controllers\APIController;
use ConsoleTVs\Charts\Classes\Highcharts\Chart;

class DeviceChart extends Chart
{

    private $chartCollection;

    /**
     * Constructor for the metrics statistics
     * @param devid of the device
     * @param start the start date (TZ format - "2019-01-31")
     * @param end the end date (TZ format - "2019-01-31")
     * @param limit the limit of the query
     */
    public function __construct($devid, $start, $end, $limit)
    {
        parent::__construct();

        $this->api = new APIController();
        /** Get Collection from API */
        $this->chartCollection = collect($this->api->getDeviceMetricsAPI($devid, $start, $end, $limit)['rows']);
    }

    /**
     * Adds one dataset to the fusion chart. Selects uplink/downlink data
     * and uses one field of the returned response to correlate with the date.
     *
     * @param $apiField: timestamp, measures->AE_L1
     * @param $chart_type: bar, line, bar3d
     * @param $title title of the chart dataset
     */
    public function addChartField($apiField, $chart_type, $title)
    {
        /** Pluck the desired value */
        $frameChartData = $this->chartCollection->pluck('value.measures.' . $apiField, 'value.timestamp')->sortKeys()->keyBy(function ($item, $key) {
            return date('d-m-Y H:m:s', strtotime($key));
        });

        /** Push the dataset to the chart */
        $this->labels($frameChartData->keys());
        $this->dataset($title, $chart_type, $frameChartData->values());
    }
}
