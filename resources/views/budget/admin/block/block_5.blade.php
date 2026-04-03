<font color="Black">
<table class="table2">
    <thead>
        <tr>
            <th style="min-width: 200px; width: 400px;"><font color="White">Наименование</th>
            <th style="min-width: 70px; width: 70px;"><font color="White">ЭКР</th>
            <th style="min-width: 150px; width: 150px;"><font color="White">Итог ФЭУ</th>
            <th style="min-width: 150px; width: 150px;"><font color="White">ДХШ</th>
            <th style="min-width: 150px; width: 150px;"><font color="White">ДМШ</th>
            <th style="min-width: 150px; width: 150px;"><font color="White">Итог ЦБ</th>
            <th style="min-width: 150px; width: 150px;"><font color="White">(ЦБ) ДХШ</th>
            <th style="min-width: 150px; width: 150px;"><font color="White">(ЦБ) ДМШ</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($info['budget'] as $value) 
            @if ($value['ekr']['main'] == 'Yes')
            <tr>
                <td style="height: 65px;" class="sticky-col"><b><p class="text-scale">{{ $value['ekr']['title'] }}</b></p></td>
                <td><b>{{ $value['ekr']['ekr'] }}</b></td>
                <td><b>{{ number_format($value['data'][18]['sum_fu'] + $value['data'][19]['sum_fu'], 2, ',', ' ') }}</b></td>
                <td><b>{{ number_format($value['data'][18]['sum_fu'], 2, ',', ' ') }}</b></td>
                <td><b>{{ number_format($value['data'][19]['sum_fu'], 2, ',', ' ') }}</b></td>
                <td><font color="blue"><b>{{ number_format($value['data'][18]['sum_cb'] + $value['data'][19]['sum_cb'], 2, ',', ' ') }}</b></td>
                <td><font color="blue"><b>{{ number_format($value['data'][18]['sum_cb'], 2, ',', ' ') }}</b></td>
                <td><font color="blue"><b>{{ number_format($value['data'][19]['sum_cb'], 2, ',', ' ') }}</b></td>
            </tr>
            @else
            <tr>
                <td style="height: 65px;" class="sticky-col"><p class="text-scale">{{ $value['ekr']['title'] }}</p></td>
                <td>{{ $value['ekr']['ekr'] }}</td>
                <td>{{ number_format($value['data'][18]['sum_fu'] + $value['data'][19]['sum_fu'], 2, ',', ' ') }}</td>
                <td>{{ number_format($value['data'][18]['sum_fu'], 2, ',', ' ') }}</td>
                <td>{{ number_format($value['data'][19]['sum_fu'], 2, ',', ' ') }}</td>
                <td><font color="blue">{{ number_format($value['data'][18]['sum_cb'] + $value['data'][19]['sum_cb'], 2, ',', ' ') }}</td>
                <td><font color="blue">{{ number_format($value['data'][18]['sum_cb'], 2, ',', ' ') }}</td>
                <td><font color="blue">{{ number_format($value['data'][19]['sum_cb'], 2, ',', ' ') }}</td>
            </tr>
            @endif
        @endforeach
        <tr>
            <td style="height: 65px;" class="sticky-col"><p class="text-scale"><b>Итог</b></td>
            <td></td>
            <td><b>{{ number_format($info['total'][18]['sum_fu'] + $info['total'][19]['sum_fu'], 2, ',', ' ') }}</b></td>
            <td><b>{{ number_format($info['total'][18]['sum_fu'], 2, ',', ' ') }}</b></td>
            <td><b>{{ number_format($info['total'][19]['sum_fu'], 2, ',', ' ') }}</b></td>
            <td><font color="blue"><b>{{ number_format($info['total'][18]['sum_cb'] + $info['total'][19]['sum_cb'], 2, ',', ' ') }}</b></td>
            <td><font color="blue"><b>{{ number_format($info['total'][18]['sum_cb'], 2, ',', ' ') }}</b></td>
            <td><font color="blue"><b>{{ number_format($info['total'][19]['sum_cb'], 2, ',', ' ') }}</b></td>
        </tr>
    </tbody>
</table>    






