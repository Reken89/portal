<table>
    <thead>
        <tr>
            <th style="min-width: 200px; width: 400px;">Наименование</th>
            <th style="min-width: 70px; width: 70px;">ЭКР</th>
            <th style="min-width: 150px; width: 150px;">Итог ФЭУ</th>
            <th style="min-width: 150px; width: 150px;">КУМС</th>
            <th style="min-width: 150px; width: 150px;">Управление собственностью</th>
            <th style="min-width: 150px; width: 150px;">ЕДДС</th>
            <th style="min-width: 150px; width: 150px;">Итог ЦБ</th>
            <th style="min-width: 150px; width: 150px;">(ЦБ) КУМС</th>
            <th style="min-width: 150px; width: 150px;">(ЦБ) Управление собственностью</th>
            <th style="min-width: 150px; width: 150px;">(ЦБ) ЕДДС</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($info['budget'] as $value) 
            @if ($value['ekr']['main'] == 'Yes')
            <tr>
                <td><b>{{ $value['ekr']['title'] }}</b></td>
                <td><b>{{ $value['ekr']['ekr'] }}</b></td>
                <td><b>{{ $value['data'][23]['sum_fu'] + $value['data'][37]['sum_fu'] + $value['data'][38]['sum_fu'] }}</b></td>
                <td><b>{{ $value['data'][23]['sum_fu'] }}</b></td>
                <td><b>{{ $value['data'][37]['sum_fu'] }}</b></td>
                <td><b>{{ $value['data'][38]['sum_fu'] }}</b></td>
                <td><b>{{ $value['data'][23]['sum_cb'] + $value['data'][37]['sum_cb'] + $value['data'][38]['sum_cb'] }}</b></td>
                <td><b>{{ $value['data'][23]['sum_cb'] }}</b></td>
                <td><b>{{ $value['data'][37]['sum_cb'] }}</b></td>
                <td><b>{{ $value['data'][38]['sum_cb'] }}</b></td>
            </tr>
            @else
            <tr>
                <td>{{ $value['ekr']['title'] }}</td>
                <td>{{ $value['ekr']['ekr'] }}</td>
                <td>{{ $value['data'][23]['sum_fu'] + $value['data'][37]['sum_fu'] + $value['data'][38]['sum_fu'] }}</td>
                <td>{{ $value['data'][23]['sum_fu'] }}</td>
                <td>{{ $value['data'][37]['sum_fu'] }}</td>
                <td>{{ $value['data'][38]['sum_fu'] }}</td>
                <td>{{ $value['data'][23]['sum_cb'] + $value['data'][37]['sum_cb'] + $value['data'][38]['sum_cb'] }}</td>
                <td>{{ $value['data'][23]['sum_cb'] }}</td>
                <td>{{ $value['data'][37]['sum_cb'] }}</td>
                <td>{{ $value['data'][38]['sum_cb'] }}</td>
            </tr>
            @endif
        @endforeach
        <tr>
            <td><b>Итог</b></td>
            <td></td>
            <td><b>{{ $info['total'][23]['sum_fu'] + $info['total'][37]['sum_fu'] + $info['total'][38]['sum_fu'] }}</b></td>
            <td><b>{{ $info['total'][23]['sum_fu'] }}</b></td>
            <td><b>{{ $info['total'][37]['sum_fu'] }}</b></td>
            <td><b>{{ $info['total'][38]['sum_fu'] }}</b></td>
            <td><b>{{ $info['total'][23]['sum_cb'] + $info['total'][37]['sum_cb'] + $info['total'][38]['sum_cb'] }}</b></td>
            <td><b>{{ $info['total'][23]['sum_cb'] }}</b></td>
            <td><b>{{ $info['total'][37]['sum_cb'] }}</b></td>
            <td><b>{{ $info['total'][38]['sum_cb'] }}</b></td>
        </tr>
    </tbody>
</table>    





