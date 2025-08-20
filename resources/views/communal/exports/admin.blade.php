<p>Выбранные параметры: год @foreach($info['year'] AS $value) {{ $value }}, @endforeach месяц @foreach($info['mounth_name'] AS $value) {{ $value }}, @endforeach</p>
<p></p>
<table class="table2">
    <thead>
        <tr>
            <th style="min-width: 200px; width: 200px;"><b>Учреждение</b></th>
            <th style="min-width: 200px; width: 200px;" colspan="2"><b>Теплоснабжение</b></th> 
            <th style="min-width: 200px; width: 200px;" colspan="2"><b>Водоотведение</b></th> 
            <th style="min-width: 200px; width: 200px;" colspan="2"><b>Негативное воздействие</b></th> 
            <th style="min-width: 200px; width: 200px;" colspan="2"><b>Водоснабжение</b></th> 
            <th style="min-width: 200px; width: 200px;" colspan="2"><b>Электроснабжение</b></th> 
            <th style="min-width: 200px; width: 200px;" colspan="2"><b>Вывоз мусора</b></th>    
            <th style="min-width: 150px; width: 150px;" rowspan="2"><b>ИТОГО</b></th> 
        </tr>
    </thead>
    <tbody>
        <tr>
            <th></th>
            <td style="min-width: 100px; width: 100px;"><b>Объем</b></td><td style="min-width: 100px; width: 100px;"><b>Сумма</b></td>
            <td style="min-width: 100px; width: 100px;"><b>Объем</b></td><td style="min-width: 100px; width: 100px;"><b>Сумма</b></td>
            <td style="min-width: 100px; width: 100px;"><b>Объем</b></td><td style="min-width: 100px; width: 100px;"><b>Сумма</b></td>
            <td style="min-width: 100px; width: 100px;"><b>Объем</b></td><td style="min-width: 100px; width: 100px;"><b>Сумма</b></td>
            <td style="min-width: 100px; width: 100px;"><b>Объем</b></td><td style="min-width: 100px; width: 100px;"><b>Сумма</b></td>
            <td style="min-width: 100px; width: 100px;"><b>Объем</b></td><td style="min-width: 100px; width: 100px;"><b>Сумма</b></td>
            <td></td>
        </tr>  
        @foreach ($info['communals'] as $value) 
            @if($info['variant'] == "one")
                <tr>
                    <th><b>{{ $value['user']['name'] }}</b></th>
                    <td>{{ $value['heat-volume'] }}</td>
                    <td>{{ $value['heat-sum'] }}</td>
                    <td>{{ $value['drainage-volume'] }}</td>
                    <td>{{ $value['drainage-sum'] }}</td>
                    <td>{{ $value['negative-volume'] }}</td>
                    <td>{{ $value['negative-sum'] }}</td>
                    <td>{{ $value['water-volume'] }}</td>
                    <td>{{ $value['water-sum'] }}</td>
                    <td>{{ $value['power-volume'] }}</td>
                    <td>{{ $value['power-sum'] }}</td>
                    <td>{{ $value['trash-volume'] }}</td>
                    <td>{{ $value['trash-sum'] }}</td>                                                
                    <td>{{ $value['total'] }}</td>
                </tr>
            @else
                <tr>
                    <th><b>{{ $value['user']['name'] }}</b></th>
                    <td>{{ $value['heat_volume'] }}</td>
                    <td>{{ $value['heat_sum'] }}</td>
                    <td>{{ $value['drainage_volume'] }}</td>
                    <td>{{ $value['drainage_sum'] }}</td>
                    <td>{{ $value['negative_volume'] }}</td>
                    <td>{{ $value['negative_sum'] }}</td>
                    <td>{{ $value['water_volume'] }}</td>
                    <td>{{ $value['water_sum'] }}</td>
                    <td>{{ $value['power_volume'] }}</td>
                    <td>{{ $value['power_sum'] }}</td>
                    <td>{{ $value['trash_volume'] }}</td>
                    <td>{{ $value['trash_sum'] }}</td>                                                
                    <td>{{ $value['total'] }}</td>
                </tr>
            @endif
        @endforeach
        <tr>
            <th><b>Итог</b></th>
            <td>{{ $info['total']['heat_volume'] }}</td>
            <td>{{ $info['total']['heat_sum'] }}</td>
            <td>{{ $info['total']['drainage_volume'] }}</td>
            <td>{{ $info['total']['drainage_sum'] }}</td>
            <td>{{ $info['total']['negative_volume'] }}</td>
            <td>{{ $info['total']['negative_sum'] }}</td>
            <td>{{ $info['total']['water_volume'] }}</td>
            <td>{{ $info['total']['water_sum'] }}</td>
            <td>{{ $info['total']['power_volume'] }}</td>
            <td>{{ $info['total']['power_sum'] }}</td>
            <td>{{ $info['total']['trash_volume'] }}</td>
            <td>{{ $info['total']['trash_sum'] }}</td>                                                
            <td>{{ $info['total']['total'] }}</td>                                           
        </tr>
    </tbody>
</table>

