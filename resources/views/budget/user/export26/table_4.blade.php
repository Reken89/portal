<table>
    <thead>
        <tr>
            <th style="min-width: 200px; width: 400px;">Наименование (Год: {{ $info['year'] }})</th>
            <th style="min-width: 70px; width: 70px;">ЭКР</th>
            <th style="min-width: 150px; width: 150px;">Итог ЦБ</th>
            <th style="min-width: 150px; width: 150px;">Ауринко</th>
            <th style="min-width: 150px; width: 150px;">Березка</th>
            <th style="min-width: 150px; width: 150px;">Кораблик</th>
            <th style="min-width: 150px; width: 150px;">Солнышко</th>
            <th style="min-width: 150px; width: 150px;">Итог ФЭУ</th>
            <th style="min-width: 150px; width: 150px;">(ФЭУ) Ауринко</th>
            <th style="min-width: 150px; width: 150px;">(ФЭУ) Березка</th>
            <th style="min-width: 150px; width: 150px;">(ФЭУ) Кораблик</th>
            <th style="min-width: 150px; width: 150px;">(ФЭУ) Солнышко</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($info['budget'] as $value) 
            @if (($value['ekr']['main'] == 'Yes') && ($value['ekr']['ekr'] >= 341 && $value['ekr']['ekr'] <= 349))
                @continue
            @endif
            
            @php 
                $displayEkr = ($value['ekr']['ekr'] >= 341 && $value['ekr']['ekr'] <= 349) ? 340 : $value['ekr']['ekr'];
            @endphp
        
            @if ($value['ekr']['main'] == 'Yes')
            <tr>
                <td><b>{{ $value['ekr']['title'] }}</b></td>
                <td><b>{{ $displayEkr }}</b></td> 
                <td><b>{{ $value['data'][9]['sum_cb'] + $value['data'][10]['sum_cb'] + $value['data'][13]['sum_cb'] + $value['data'][15]['sum_cb'] }}</b></td>
                <td><b>{{ $value['data'][9]['sum_cb'] }}</b></td>
                <td><b>{{ $value['data'][10]['sum_cb'] }}</b></td>
                <td><b>{{ $value['data'][13]['sum_cb'] }}</b></td>
                <td><b>{{ $value['data'][15]['sum_cb'] }}</b></td>
                <td><b>{{ $value['data'][9]['sum_fu'] + $value['data'][10]['sum_fu'] + $value['data'][13]['sum_fu'] + $value['data'][15]['sum_fu'] }}</b></td>
                <td><b>{{ $value['data'][9]['sum_fu'] }}</b></td>
                <td><b>{{ $value['data'][10]['sum_fu'] }}</b></td>
                <td><b>{{ $value['data'][13]['sum_fu'] }}</b></td>
                <td><b>{{ $value['data'][15]['sum_fu'] }}</b></td>
            </tr>
            @else
            <tr>
                <td>{{ $value['ekr']['title'] }}</td>
                <td>{{ $displayEkr }}</td> 
                <td>{{ $value['data'][9]['sum_cb'] + $value['data'][10]['sum_cb'] + $value['data'][13]['sum_cb'] + $value['data'][15]['sum_cb'] }}</td>
                <td>{{ $value['data'][9]['sum_cb'] }}</td>
                <td>{{ $value['data'][10]['sum_cb'] }}</td>
                <td>{{ $value['data'][13]['sum_cb'] }}</td>
                <td>{{ $value['data'][15]['sum_cb'] }}</td>

                <td>{{ $value['data'][9]['sum_fu'] + $value['data'][10]['sum_fu'] + $value['data'][13]['sum_fu'] + $value['data'][15]['sum_fu'] }}</td>
                <td>{{ $value['data'][9]['sum_fu'] }}</td>
                <td>{{ $value['data'][10]['sum_fu'] }}</td>
                <td>{{ $value['data'][13]['sum_fu'] }}</td>
                <td>{{ $value['data'][15]['sum_fu'] }}</td>
            </tr>
            @endif
        @endforeach
        <tr>
            <td><b>Итог</b></td>
            <td></td>
            <td><b>{{ $info['total'][9]['sum_cb'] + $info['total'][10]['sum_cb'] + $info['total'][13]['sum_cb'] + $info['total'][15]['sum_cb'] }}</b></td>
            <td><b>{{ $info['total'][9]['sum_cb'] }}</b></td>
            <td><b>{{ $info['total'][10]['sum_cb'] }}</b></td>
            <td><b>{{ $info['total'][13]['sum_cb'] }}</b></td>
            <td><b>{{ $info['total'][15]['sum_cb'] }}</b></td>
            <td><b>{{ $info['total'][9]['sum_fu'] + $info['total'][10]['sum_fu'] + $info['total'][13]['sum_fu'] + $info['total'][15]['sum_fu'] }}</b></td>
            <td><b>{{ $info['total'][9]['sum_fu'] }}</b></td>
            <td><b>{{ $info['total'][10]['sum_fu'] }}</b></td>
            <td><b>{{ $info['total'][13]['sum_fu'] }}</b></td>
            <td><b>{{ $info['total'][15]['sum_fu'] }}</b></td>
        </tr>
    </tbody>
</table>    





