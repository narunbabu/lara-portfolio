<!DOCTYPE html>
<html lang="en">


<head>

<style>
html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
table {
    border-collapse: collapse;
}

table, th, td {
    border: 1px solid black;
}
td{
    bgcolor: #DDFFFF;
}

#sides{
margin:0;
}
#left{
float:left;
width:75%;

}
#right{

width:25%;

} 

.container {
    width: 80%;
    height: 300px;
    background: aqua;
    margin: auto;
    padding: 10px;
}
.one {
    width: 30%;
    height: 300px;

    float: left;
}
.two {
    width: 60%;
    height: 300px;
   
    float: right;
}
</style>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
  google.charts.load('current', {packages: ['corechart']});

</script>
</head>

<body class="page-header-fixed">
<section class="container">
    <div class="one">
        <?php
        $options['title']="MF Summary";
        $options['width']= 300;
        $options['height']= 300;
        $totval = array_slice($totrows[0], 1); 
   
        ?>
        {!!ChartManager::setChartType('combo-chart')
                ->setOptions($options)
                ->setCols($cols)
                ->setRows($totrows)
                ->render() !!}
    </div>
    <div class="two">
                <table width="200">
                <tr>
                        
                    @foreach ($cols as $v) 
                    <th>
                            {{$v}}
                            </th>
                        @endforeach 

                </tr>
                {{--  @foreach ($output as $key => $task)   --}}
                    <tr>
                    <td>
                           Total Vlaue
                            </td>
                    @foreach ($totval as $v) 
                    <td>                    
                            {{number_format($v,1) }}                  
                            </td>    
                    @endforeach 
                    </tr>
                    <tr>
                    <td>
                           Value gain
                            </td>
                    @foreach ($valuegain as $v) 
                    <td>
                    
                            {{number_format($v,2) }}
                  
                            </td>    
                    @endforeach 
                    </tr>
                    <tr>
                    <td>
                           Percentage gain
                            </td>
                    @foreach ($percgain as $v) 
                    <td>
                    
                            {{number_format($v,2) }}
                  
                            </td>    
                    @endforeach 
                    </tr>
                {{--  @endforeach  --}}
            </table> 
    </div>
</section>


<div id="wrapper">


  <div >
        <?php
        $options['title']="Nav Summary";
        $options['width']= 900;
        $options['height']= 400;

        ?>
  {!!ChartManager::setChartType('combo-chart')
        ->setOptions($options)
        ->setCols($cols)
        ->setRows($navrows)
        ->render()!!}

      </div>    
  <div >
<?php
$options['title']="Value Summary";
$options['width']= 900;
$options['height']= 400;
?>
  {!!ChartManager::setChartType('combo-chart')
        ->setOptions($options)
        ->setCols($cols)
        ->setRows($valrows)
        ->render()!!}
  </div>
</div>

<?php
/* 
echo ChartManager::setChartType('combo-chart')
        ->setOptions($options)
        ->setCols($cols)
        ->setRows($navrows)
        ->render()  ;
       */



        ?>
        
</body>
</html>