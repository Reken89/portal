@php
    //var_dump($info);
@endphp
<table class="table2">
    <thead>
        <tr>
            <th>Учреждение (Местный бюджет)</th>
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
                <td>{{ number_format($value['vol_budget_h1'], 4, ',', ' ') }}</td>
                <td>{{ number_format($value['sum_budget_h1'], 2, ',', ' ') }}</td>
                <td>{{ number_format($value['vol_budget_h2'], 4, ',', ' ') }}</td>
                <td>{{ number_format($value['sum_budget_h2'], 2, ',', ' ') }}</td>
                <td>{{ number_format($value['vol_budget'], 4, ',', ' ') }}</td>
                <td>{{ number_format($value['sum_budget'], 2, ',', ' ') }}</td>
            </tr>
        @endforeach
        <tr>
            <td><b>ИТОГ</b></td>
            <td><b>{{ number_format($info['total']['vol_budget_h1'], 4, ',', ' ') }}</b></td>
            <td><b>{{ number_format($info['total']['sum_budget_h1'], 2, ',', ' ') }}</b></td>
            <td><b>{{ number_format($info['total']['vol_budget_h2'], 4, ',', ' ') }}</b></td>
            <td><b>{{ number_format($info['total']['sum_budget_h2'], 2, ',', ' ') }}</b></td>
            <td><b>{{ number_format($info['total']['vol_budget'], 4, ',', ' ') }}</b></td>
            <td><b>{{ number_format($info['total']['sum_budget'], 2, ',', ' ') }}</b></td>
        </tr>
    </tbody>
</table>