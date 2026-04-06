<table>
    <thead>
        <tr>
            <th style="min-width: 200px; width: 400px;">Наименование</th>
            <th style="min-width: 70px; width: 70px;">ЭКР</th>
            <th style="min-width: 150px; width: 150px;">Итог ФЭУ</th>
            <th style="min-width: 150px; width: 150px;">ДХШ</th>
            <th style="min-width: 150px; width: 150px;">ДМШ</th>
            <th style="min-width: 150px; width: 150px;">Итог ЦБ</th>
            <th style="min-width: 150px; width: 150px;">(ЦБ) ДХШ</th>
            <th style="min-width: 150px; width: 150px;">(ЦБ) ДМШ</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($info['budget'] as $value) 
            @if ($value['ekr']['main'] == 'Yes')
            <tr>
                <td><b>{{ $value['ekr']['title'] }}</b></td>
                <td><b>{{ $value['ekr']['ekr'] }}</b></td>
                <td><b>{{ $value['data'][18]['sum_fu'] + $value['data'][19]['sum_fu'] }}</b></td>
                <td><b>{{ $value['data'][18]['sum_fu'] }}</b></td>
                <td><b>{{ $value['data'][19]['sum_fu'] }}</b></td>
                <td><b>{{ $value['data'][18]['sum_cb'] + $value['data'][19]['sum_cb'] }}</b></td>
                <td><b>{{ $value['data'][18]['sum_cb'] }}</b></td>
                <td><b>{{ $value['data'][19]['sum_cb'] }}</b></td>
            </tr>
            @else
            <tr>
                <td>{{ $value['ekr']['title'] }}</td>
                <td>{{ $value['ekr']['ekr'] }}</td>
                <td>{{ $value['data'][18]['sum_fu'] + $value['data'][19]['sum_fu'] }}</td>
                <td>{{ $value['data'][18]['sum_fu'] }}</td>
                <td>{{ $value['data'][19]['sum_fu'] }}</td>
                <td>{{ $value['data'][18]['sum_cb'] + $value['data'][19]['sum_cb'] }}</td>
                <td>{{ $value['data'][18]['sum_cb'] }}</td>
                <td>{{ $value['data'][19]['sum_cb'] }}</td>
            </tr>
            @endif
        @endforeach
        <tr>
            <td><b>Итог</b></td>
            <td></td>
            <td><b>{{ $info['total'][18]['sum_fu'] + $info['total'][19]['sum_fu'] }}</b></td>
            <td><b>{{ $info['total'][18]['sum_fu'] }}</b></td>
            <td><b>{{ $info['total'][19]['sum_fu'] }}</b></td>
            <td><b>{{ $info['total'][18]['sum_cb'] + $info['total'][19]['sum_cb'] }}</b></td>
            <td><b>{{ $info['total'][18]['sum_cb'] }}</b></td>
            <td><b>{{ $info['total'][19]['sum_cb'] }}</b></td>
        </tr>
    </tbody>
</table>    






