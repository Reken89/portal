<table class="table2">
    <thead>
        <tr>
            <th>{{ $info['tariff'][$info['info'][0]['title']] }} (МБ+ПД)</th>
            <th>Объем 1-полугодие</th>
            <th>Сумма 1-полугодие</th>
            <th>Объем 2-полугодие</th>
            <th>Сумма 2-полугодие</th>
            <th>Объем за год</th>
            <th>Сумма за год</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($info['info'] as $value)
            <tr>
                <td>{{ $value['user']['name'] }}</td>
                <td>{{ number_format($value['vol_bud_bus_h1'], 4, ',', ' ') }}</td>
                <td>{{ number_format($value['sum_bud_bus_h1'], 2, ',', ' ') }}</td>
                <td>{{ number_format($value['vol_bud_bus_h2'], 4, ',', ' ') }}</td>
                <td>{{ number_format($value['sum_bud_bus_h2'], 2, ',', ' ') }}</td>
                <td>{{ number_format($value['vol'], 4, ',', ' ') }}</td>
                <td>{{ number_format($value['sum'], 2, ',', ' ') }}</td>
            </tr>
        @endforeach
        <tr>
            <td><b>ИТОГ</b></td>
            <td><b>{{ number_format($info['total']['vol_bud_bus_h1'], 4, ',', ' ') }}</b></td>
            <td><b>{{ number_format($info['total']['sum_bud_bus_h1'], 2, ',', ' ') }}</b></td>
            <td><b>{{ number_format($info['total']['vol_bud_bus_h2'], 4, ',', ' ') }}</b></td>
            <td><b>{{ number_format($info['total']['sum_bud_bus_h2'], 2, ',', ' ') }}</b></td>
            <td><b>{{ number_format($info['total']['vol'], 4, ',', ' ') }}</b></td>
            <td><b>{{ number_format($info['total']['sum'], 2, ',', ' ') }}</b></td>
        </tr>
    </tbody>
</table>

