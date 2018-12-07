<?php
/**
 * @author CF Ingrams - cfi@dmu.ac.uk
 * @copyright De Montfort University
 *
 * @package stock-quotes-charts
 */

class CompanyDetailsChartModel
{
    private $output_chart_details;
    private $stored_company_stock_quote_data;
    private $stock_company_symbol;
    private $stock_company_name;
    private $output_chart_path_and_name;

    public function __construct()
    {
        $this->stored_company_stock_quote_data = array();
        $this->output_chart_details = '';
        $this->stock_company_symbol = '';
        $this->stock_company_name = '';
        $this->output_chart_path_and_name = '';
    }

    public function __destruct() {}

    public function setStoredCompanyStockData(array $stored_company_stock_data)
    {
        $this->stored_company_stock_quote_data = $stored_company_stock_data;
    }

    public function createLineChart()
    {
        $this->createChartDetails();
        $this->makeLineChart();
    }

    public function getLineChartDetails()
    {
        return $this->output_chart_details;
    }

    private function createChartDetails()
    {
        $this->stock_company_symbol = $this->stored_company_stock_quote_data['company-symbol'];
        $this->stock_company_name = $this->stored_company_stock_quote_data['company-name'];

        $output_chart_name = $this->stock_company_symbol . '-linechart-stockdata.png';
//        $output_chart_location = LIB_CHART_OUTPUT_PATH;

        if (is_dir(LIB_CHART_OUTPUT_PATH) === false)
        {
            mkdir(LIB_CHART_OUTPUT_PATH, 0775, true);
        }

        $this->output_chart_details = LIB_CHART_PATH . $output_chart_name;
        $this->output_chart_path_and_name = LIB_CHART_FILE_PATH . LIB_CHART_OUTPUT_PATH . $output_chart_name;
    }

    private function makeLineChart()
    {
        $series_data = $this->stored_company_stock_quote_data['company-retrieved-data'];

        $chart = new LineChart();
        $obj_bound = new Bound();

        $chart->getPlot()->getPalette()->setLineColor(array(new Color(255, 130, 0), new Color(255, 255, 255)));
        $series1 = new XYDataSet();
        foreach ($series_data as $arr_data_row)
        {
            $index = $arr_data_row['date'];
            $datum = $arr_data_row['value'];
            $series1->addPoint(new Point($index, $datum));
        }
        $dataSet = new XYSeriesDataSet();
        $dataSet->addSerie($this->stock_company_symbol, $series1);

        $chart->setDataSet($dataSet);

        $obj_bound->computeBound($dataSet);
        $obj_bound->setLowerBound(12);
        $obj_bound->setUpperBound(14);

        $chart->setTitle($this->stock_company_name);
        $chart->getPlot()->setGraphCaptionRatio(0.75);

        $chart->render($this->output_chart_path_and_name);
    }
}
