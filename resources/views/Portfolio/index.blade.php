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
  google.charts.setOnLoadCallback(drawChart);

</script>
</head>

<body class="page-header-fixed">


    <div style="margin-top: 10%;"></div>
 
 <table>
    <tr>
            <th>Scheme Name</th>           
            <th>Units</th>
           @foreach ($output[0][2] as $k =>$v) 
           <th>
                {{substr($v,0,10)}}
                </th>
            @endforeach 

    </tr>
     @foreach ($output as $key => $task) 
        <tr>
            <td>{{ $task[0] }}</td>
            <td>{{ number_format($task[1],1) }}</td>
            @foreach ($task[3] as $k =>$v) 
                <td>{{ number_format($v,1) }}</td>
            @endforeach      

        </tr>
    @endforeach
</table> 

 <table>
    <tr>
            <th>Scheme Name</th>           
            <th>Units</th>
           @foreach ($output[0][2] as $k =>$v) 
           <th>
                {{substr($v,0,10)}}
                </th>
            @endforeach 

    </tr>
     @foreach ($output as $key => $task) 
        <tr>
            <td>{{ $task[0] }}</td>
            <td>{{ number_format($task[1],1) }}</td>
            @foreach ($task[3] as $k =>$v) 
                <td>{{ number_format($v*$task[1],0)  }}</td>
            @endforeach      

        </tr>
    @endforeach
</table> 

    </div>

    {!!ChartManager::setChartType('bar-chart')
                        ->setOptions($options)
                        ->setCols($cols)
                        ->setRows($rows)
                     ->render()!!}


</body>
</html>
 
