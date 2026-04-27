<table>
    <thead>
        <tr>
            <th style="min-width: 300px; width: 300px;">{{ $info['tariff'][$info['info'][0]['title']] }} (МБ+ПД)</th>
            <th style="min-width: 150px; width: 150px;">Объем 1-полугодие</th>
            <th style="min-width: 150px; width: 150px;">Сумма 1-полугодие</th>
            <th style="min-width: 150px; width: 150px;">Объем 2-полугодие</th>
            <th style="min-width: 150px; width: 150px;">Сумма 2-полугодие</th>
            <th style="min-width: 150px; width: 150px;">Объем за год</th>
            <th style="min-width: 150px; width: 150px;">Сумма за год</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($info['info'] as $value)
            <tr>
                <td>{{ $value['user']['name'] }}</td>
                <td>{{ $value['vol_bud_bus_h1'] }}</td>
                <td>{{ $value['sum_bud_bus_h1'] }}</td>
                <td>{{ $value['vol_bud_bus_h2'] }}</td>
                <td>{{ $value['sum_bud_bus_h2'] }}</td>
                <td>{{ $value['vol'] }}</td>
                <td>{{ $value['sum'] }}</td>
            </tr>
        @endforeach
        <tr>
            <td><b>ИТОГ</b></td>
            <td><b>{{ $info['total']['vol_bud_bus_h1'] }}</b></td>
            <td><b>{{ $info['total']['sum_bud_bus_h1'] }}</b></td>
            <td><b>{{ $info['total']['vol_bud_bus_h2'] }}</b></td>
            <td><b>{{ $info['total']['sum_bud_bus_h2'] }}</b></td>
            <td><b>{{ $info['total']['vol'] }}</b></td>
            <td><b>{{ $info['total']['sum'] }}</b></td>
        </tr>
    </tbody>
</table>