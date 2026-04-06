<table>
    <thead>
        <tr>
            <th style="min-width: 200px; width: 400px;">Наименование</th>
            <th style="min-width: 70px; width: 70px;">ЭКР</th>
            <th style="min-width: 150px; width: 150px;">Итог ФЭУ</th>
            <th style="min-width: 150px; width: 150px;">Вокнаволок школа</th>
            <th style="min-width: 150px; width: 150px;">Вокнаволок сад</th>
            <th style="min-width: 150px; width: 150px;">Итог ЦБ</th>
            <th style="min-width: 150px; width: 150px;">(ЦБ) Вокнаволок школа</th>
            <th style="min-width: 150px; width: 150px;">(ЦБ) Вокнаволок сад</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($info['budget'] as $value) 
            @if ($value['ekr']['main'] == 'Yes')
            <tr>
                <td><b>{{ $value['ekr']['title'] }}</b></td>
                <td><b>{{ $value['ekr']['ekr'] }}</b></td>
                <td><b>{{ $value['data'][8]['sum_fu'] + $value['data'][36]['sum_fu'] }}</b></td>
                <td><b>{{ $value['data'][8]['sum_fu'] }}</b></td>
                <td><b>{{ $value['data'][36]['sum_fu'] }}</b></td>
                <td><b>{{ $value['data'][8]['sum_cb'] + $value['data'][36]['sum_cb'] }}</b></td>
                <td><b>{{ $value['data'][8]['sum_cb'] }}</b></td>
                <td><b>{{ $value['data'][36]['sum_cb'] }}</b></td>
            </tr>
            @else
            <tr>
                <td>{{ $value['ekr']['title'] }}</td>
                <td>{{ $value['ekr']['ekr'] }}</td>
                <td>{{ $value['data'][8]['sum_fu'] + $value['data'][36]['sum_fu'] }}</td>
                <td>{{ $value['data'][8]['sum_fu'] }}</td>
                <td>{{ $value['data'][36]['sum_fu'] }}</td>
                <td>{{ $value['data'][8]['sum_cb'] + $value['data'][36]['sum_cb'] }}</td>
                <td>{{ $value['data'][8]['sum_cb'] }}</td>
                <td>{{ $value['data'][36]['sum_cb'] }}</td>
            </tr>
            @endif
        @endforeach
        <tr>
            <td><b>Итог</b></td>
            <td></td>
            <td><b>{{ $info['total'][8]['sum_fu'] + $info['total'][36]['sum_fu'] }}</b></td>
            <td><b>{{ $info['total'][8]['sum_fu'] }}</b></td>
            <td><b>{{ $info['total'][36]['sum_fu'] }}</b></td>
            <td><b>{{ $info['total'][8]['sum_cb'] + $info['total'][36]['sum_cb'] }}</b></td>
            <td><b>{{ $info['total'][8]['sum_cb'] }}</b></td>
            <td><b>{{ $info['total'][36]['sum_cb'] }}</b></td>
        </tr>
    </tbody>
</table>    






