<!DOCTYPE html>
<html lang="en">


<head>

<style>
table {
    border-collapse: collapse;
}

table, th, td {
    border: 1px solid black;
}
</style>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
  google.charts.load('current', {packages: ['corechart']});
  //google.charts.setOnLoadCallback(drawChart);

</script>
</head>
<body>
<?php
$options = [
                    'title' => 'Population of Largest U.S. Cities',
                    'chartArea' => ['width' => '50%'],
                    'hAxis' => [
                        'title' => 'Total Population',
                        'minValue' => 0
                    ],
                    'vAxis' => [
                        'title' => 'City'
                    ],
                    'bars' => 'horizontal', //required if using material chart
                    'axes' => [
                        'y' => [0 => ['side' => 'right']]
                    ]
                ];

                $cols = ['City', '2010 Population', '2000 PopulaÎtions'];
                $rows = [
                    ['New York City, NY', 8175000, 8008000],
                    ['Los Angeles, CA', 3792000, 3694000],
                    ['Chicago, IL', 2695000, 2896000],
                    ['Houston, TX', 2099000, 1953000],
                    ['Philadelphia, PA', 1526000, 1517000]
                ];


                echo ChartManager::setChartType('bar-chart')
                        ->setOptions($options)
                        ->setCols($cols)
                        ->setRows($rows)
                        ->render();


    //Barcharts
    $options = [
                    'title' => 'Population of Largest U.S. Cities',
                    'chartArea' => ['width' => '50%'],
                    'hAxis' => [
                        'title' => 'Total Population',
                        'minValue' => 0
                    ],
                    'vAxis' => [
                        'title' => 'City'
                    ],
                    'bars' => 'horizontal', //required if using material chart
                    'axes' => [
                        'y' => [0 => ['side' => 'right']]
                    ]
                ];

                $cols = ['City', '2010 Population', '2000 PopulaÎtions', ['role' => 'style']];
                $rows = [
                    ['New York City, NY', 8175000, 8008000, '#b87333'],
                    ['Los Angeles, CA', 3792000, 3694000, 'silver'],
                    ['Chicago, IL', 2695000, 2896000, 'gold'],
                    ['Houston, TX', 2099000, 1953000, 'color: #e5e4e2'],
                    ['Philadelphia, PA', 1526000, 1517000, 'color: #e5e4e2']
                ];

echo ChartManager::setChartType('bar-chart')
                        ->setOptions($options)
                        ->setCols($cols)
                        ->setRows($rows)
                        ->render();


//Stacked bar chart
                $options = [
                    'width' => 800,
                    'height' => 400,
                    'legend' => ['position' => 'top', 'maxLines' => 3],
                    'bars' => ['groupWidth' => '75%'],
                    'isStacked' => TRUE
                ];




                $cols = ['Date', 'Fantasy & Sci Fi', 'Romance', 'Mystery/Crime', 'General',
                    'Western', 'Literature', ['role' => 'annotation']];
                $rows = [
                    ['2010', 10, 24, 20, 32, 18, 5, ''],
                    ['2020', 16, 22, 23, 30, 16, 9, ''],
                    ['2030', 28, 19, 29, 30, 12, 13, '']
                ];

            echo ChartManager::setChartType('bar-chart')
                        ->setOptions($options)
                        ->setCols($cols)
                        ->setRows($rows)
                        ->render();

//Bubble chart
$cols = ['ID', 'Life Expectancy', 'Fertility Rate', 'Region', 'Population'];
                $rows = [
                    ['CAN', 80.66, 1.67, 'North America', 33739900],
                    ['DEU', 79.84, 1.36, 'Europe', 81902307],
                    ['DNK', 78.6, 1.84, 'Europe', 5523095],
                    ['EGY', 72.73, 2.78, 'Middle East', 79716203],
                    ['GBR', 80.05, 2.00, 'Europe', 61801570],
                    ['IRN', 72.49, 1.7, 'Middle East', 73137148],
                    ['IRQ', 68.09, 4.77, 'Middle East', 31090763],
                    ['ISR', 81.55, 2.96, 'Middle East', 7485600],
                    ['RUS', 68.6, 1.54, 'Europe', 141850000],
                    ['USA', 78.09, 2.05, 'North America', 307007000]
                ];


                $options = [
                    'title' => 'Correlation between life expectancy, fertility rate and population of some world countries (2010)',
                    'hAxis' => [
                        'title' => 'Life Expectancy',
                    ],
                    'vAxis' => [
                        'title' => 'Fertility Rate'
                    ],
                    'bubble' => 'horizontal', //required if using material chart
                    'bubble' => [
                        'textStyle' => ['fontSize' => 11]
                    ]
                ];

                echo ChartManager::setChartType('bubble-chart')
                        ->setOptions($options)
                        ->setCols($cols)
                        ->setRows($rows)
                        ->render();


 ##Candlestick charts


                $rows = [
                    ['Mon', 20, 28, 38, 45],
                    ['Tue', 31, 38, 55, 66],
                    ['Wed', 50, 55, 77, 80],
                    ['Thu', 77, 77, 66, 50],
                    ['Fri', 68, 66, 22, 15]
                ];


                $options = [
                    'legend' => 'none'
                ];


                $cols =['a','b','c','d','e'];
// 

               echo ChartManager::setChartType('candlestick-chart')
                        ->setOptions($options)
                        ->setCols($cols)
                        ->setRows($rows)
                        ->render();     
/**/

##Waterfall charts

                $rows = [
                    ['Mon', 20, 28, 38, 45],
                    ['Tue', 31, 38, 55, 66],
                    ['Wed', 50, 55, 77, 80],
                    ['Thu', 77, 77, 66, 50],
                    ['Fri', 68, 66, 22, 15]
                ];


                $options = [
                    'legend' => 'none',
                    'bar' => [
                        'groupWidth' => '100%', // Draw a trendline for data series 0.
                    ],
                    'candlestick' => [
                        'fallingColor' => ['strokeWidth' => 0, 'fill' => '#a52714'],
                        'risingColor' => ['strokeWidth' => 0, 'fill' => '#0f9d58'],
                    ]
                ];

                $cols =['a','b','c','d','e'];
//.blade.php code

                echo ChartManager::setChartType('candlestick-chart')
                        ->setOptions($options)
                        ->setCols($cols)
                        ->setRows($rows)
                        ->render() ;    


 ##Combo Chart

                $cols = ['Month', 'Bolivia', 'Ecuador', 'Madagascar', 'Papua New Guinea', 'Rwanda', 'Average'];
                $rows = [
                    ['2004/05', 165, 938, 522, 998, 450, 614.6],
                    ['2005/06', 135, 1120, 599, 1268, 288, 682],
                    ['2006/07', 157, 1167, 587, 807, 397, 623],
                    ['2007/08', 139, 1110, 615, 968, 215, 609.4],
                    ['2008/09', 136, 691, 629, 1026, 366, 569.6]
                ];

                $options = [
                    'title' => 'Monthly Coffee Production by Country',
                    'hAxis' => [
                        'title' => 'Cups',
                    ],
                    'vAxis' => [
                        'title' => 'Month'
                    ],
                    'seriesType' => 'bars', //required if using material chart
                    'series' => [
                        '5' => ['type' => 'line']
                    ]
                ];
// 

                echo ChartManager::setChartType('combo-chart')
                        ->setOptions($options)
                        ->setCols($cols)
                        ->setRows($rows)
                        ->render()  ;

 ##Pie Chart

                $cols = ['Major', 'Degrees'];
                $rows = [
                    ['Business', 256070], ['Education', 108034],
                    ['Social Sciences & History', 127101], ['Health', 81863],
                    ['Psychology', 74194]
                ];
                $options = [
                    'pieSliceText' => 'none',
                ];

                
// 

                echo ChartManager::setChartType('piechart-chart')
                        ->setOptions($options)
                        ->setCols($cols)
                        ->setRows($rows)
                        ->render()     ;                                                                        

?>



<?php
##3D Pie Chart

                $cols = ['Major', 'Degrees'];
                $rows = [
                    ['Business', 256070], ['Education', 108034],
                    ['Social Sciences & History', 127101], ['Health', 81863],
                    ['Psychology', 74194]
                ];
                $options = [
                    'pieSliceText' => 'none',
                    'title' => 'My Daily Activities',
                    'is3D' => true,
                ];
 



                 echo ChartManager::setChartType('piechart-chart')
                        ->setOptions($options)
                        ->setCols($cols)
                        ->setRows($rows)
                        ->render();
##ScatterChart

                $cols = ['Age', 'Weight'];
                $rows = [
                    [ 8, 12],
                    [ 4, 5.5],
                    [ 11, 14],
                    [ 4, 5],
                    [ 3, 3.5],
                    [ 6.5, 7]
                ];


                $options = [
                    'title' => 'Age vs. Weight comparison',
                    'hAxis' => [
                        'title' => 'Age',
                        'minValue' => 0,
                        'maxValue' => 15
                    ],
                    'vAxis' => [
                        'title' => 'Weight',
                        'minValue' => 0,
                        'maxValue' => 15
                    ],
                    'legend' => 'none',
                ];
 

                 echo ChartManager::setChartType('scatter-chart')
                        ->setOptions($options)
                        ->setCols($cols)
                        ->setRows($rows)
                        ->render();

##Stepped Chart

                $cols = ['Director (Year)', 'Rotten Tomatoes', 'IMDB'];
                $rows = [
                    ['Alfred Hitchcock (1935)', 8.4, 7.9],
                    ['Ralph Thomas (1959)', 6.9, 6.5],
                    ['Don Sharp (1978)', 6.5, 6.4],
                    ['James Hawes (2008)', 4.4, 6.2]
                ];


                $options = [
                    'title' => 'The decline of \'The 39 Steps\'',
                    'hAxis' => [
                        'title' => 'Accumulated Rating',
                    ],
                    'isStacked' => 'true',
                ];
 

                 echo ChartManager::setChartType('steppedarea-chart')
                        ->setOptions($options)
                        ->setCols($cols)
                        ->setRows($rows)
                        ->render();

##Tree Map Charts

                $cols = ['Location', 'Parent', 'Market trade volume (size)', 'Market increase/decrease (color)'];
                $rows = [
                    ['Global', null, 0, 0],
                    ['America', 'Global', 0, 0],
                    ['Europe', 'Global', 0, 0],
                    ['Asia', 'Global', 0, 0],
                    ['Australia', 'Global', 0, 0],
                    ['Africa', 'Global', 0, 0],
                    ['Brazil', 'America', 11, 10],
                    ['USA', 'America', 52, 31],
                    ['Mexico', 'America', 24, 12],
                    ['Canada', 'America', 16, -23],
                    ['France', 'Europe', 42, -11],
                    ['Germany', 'Europe', 31, -2],
                    ['Sweden', 'Europe', 22, -13],
                    ['Italy', 'Europe', 17, 4],
                    ['UK', 'Europe', 21, -5],
                    ['China', 'Asia', 36, 4],
                    ['Japan', 'Asia', 20, -12],
                    ['India', 'Asia', 40, 63],
                    ['Laos', 'Asia', 4, 34],
                    ['Mongolia', 'Asia', 1, -5],
                    ['Israel', 'Asia', 12, 24],
                    ['Iran', 'Asia', 18, 13],
                    ['Pakistan', 'Asia', 11, -52],
                    ['Egypt', 'Africa', 21, 0],
                    ['S. Africa', 'Africa', 30, 43],
                    ['Sudan', 'Africa', 12, 2],
                    ['Congo', 'Africa', 10, 12],
                    ['Zaire', 'Africa', 8, 10]
                ];


                $options = [
                    'minColor' => '#f00',
                    'midColor' => '#ddd',
                    'maxColor' => '#0d0',
                    'headerHeight' => 15,
                    'fontColor' => 'black',
                    'showScale' => TRUE
                ];


                

                 echo ChartManager::setChartType('treemap-chart')
                        ->setOptions($options)
                        ->setCols($cols)
                        ->setRows($rows)
                        ->render();

##Scatter Chart

                $cols = ['Diameter', 'Age'];
                $rows = [
                    [8, 37],
                    [4, 19.5],
                    [11, 52],
                    [4, 22],
                    [3, 16.5],
                    [6.5, 32.8], [
                        14, 72]
                ];

                $options = [
                    'title' => 'Age of sugar maples vs. trunk diameter, in inches',
                    'hAxis' => [
                        'title' => 'Diameter',
                    ],
                    'vAxis' => [
                        'title' => 'Age',
                    ],
                    'legend' => 'none',
                    'trendlines' => [
                        0 => [], // Draw a trendline for data series 0.
                    ],
                ];
 

                 echo ChartManager::setChartType('scatter-chart')
                        ->setOptions($options)
                        ->setCols($cols)
                        ->setRows($rows)
                        ->render();

##Word tree charts

                $cols = ['Phrases'];
                $rows = [
                    ['cats are better than dogs'],
                    ['cats eat kibble'],
                    ['cats are better than hamsters'],
                    ['cats are awesome'],
                    ['cats are people too'],
                    ['cats eat mice'],
                    ['cats meowing'],
                    ['cats in the cradle'],
                    ['cats eat mice'],
                    ['cats in the cradle lyrics'],
                    ['cats eat kibble'],
                    ['cats for adoption'],
                    ['cats are family'],
                    ['cats eat mice'],
                    ['cats are better than kittens'],
                    ['cats are evil'],
                    ['cats are weird'],
                    ['cats eat mice'],
                ];

                $options = [
                    'wordtree' => ['format' => 'implicit', 'word' => 'cats']
                ];
 

                echo ChartManager::setChartType('wordtree-chart')
                        ->setOptions($options)
                        ->setCols($cols)
                        ->setRows($rows)
                        ->render();

?>
</body>
</html>