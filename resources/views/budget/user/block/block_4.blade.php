<font color="Black">
<table class="table2">
    <thead>
        <tr>
            <th style="min-width: 200px; width: 400px;"><font color="White">Наименование</th>
            <th style="min-width: 70px; width: 70px;"><font color="White">ЭКР</th>
            <th style="min-width: 150px; width: 150px;"><font color="White">Итог ЦБ</th>
            <th style="min-width: 150px; width: 150px;"><font color="White">Ауринко</th>
            <th style="min-width: 150px; width: 150px;"><font color="White">Березка</th>
            <th style="min-width: 150px; width: 150px;"><font color="White">Кораблик</th>
            <th style="min-width: 150px; width: 150px;"><font color="White">Солнышко</th>
            <th style="min-width: 150px; width: 150px;"><font color="White">Итог ФЭУ</th>
            <th style="min-width: 150px; width: 150px;"><font color="White">(ФЭУ) Ауринко</th>
            <th style="min-width: 150px; width: 150px;"><font color="White">(ФЭУ) Березка</th>
            <th style="min-width: 150px; width: 150px;"><font color="White">(ФЭУ) Кораблик</th>
            <th style="min-width: 150px; width: 150px;"><font color="White">(ФЭУ) Солнышко</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($info['budget'] as $value) 
            @if ($value['ekr']['main'] == 'Yes')
            <tr>
                <td style="height: 65px;" class="sticky-col"><b><p class="text-scale">{{ $value['ekr']['title'] }}</b></p></td>
                <td><b>{{ $value['ekr']['ekr'] }}</b></td>
                <td><b>{{ number_format($value['data'][9]['sum_cb'] + $value['data'][10]['sum_cb'] + $value['data'][13]['sum_cb'] + $value['data'][15]['sum_cb'], 2, ',', ' ') }}</b></td>
                <td><b>{{ number_format($value['data'][9]['sum_cb'], 2, ',', ' ') }}</b></td>
                <td><b>{{ number_format($value['data'][10]['sum_cb'], 2, ',', ' ') }}</b></td>
                <td><b>{{ number_format($value['data'][13]['sum_cb'], 2, ',', ' ') }}</b></td>
                <td><b>{{ number_format($value['data'][15]['sum_cb'], 2, ',', ' ') }}</b></td>
                <td><font color="blue"><b>{{ number_format($value['data'][9]['sum_fu'] + $value['data'][10]['sum_fu'] + $value['data'][13]['sum_fu'] + $value['data'][15]['sum_fu'], 2, ',', ' ') }}</b></td>
                <td><font color="blue"><b>{{ number_format($value['data'][9]['sum_fu'], 2, ',', ' ') }}</b></td>
                <td><font color="blue"><b>{{ number_format($value['data'][10]['sum_fu'], 2, ',', ' ') }}</b></td>
                <td><font color="blue"><b>{{ number_format($value['data'][13]['sum_fu'], 2, ',', ' ') }}</b></td>
                <td><font color="blue"><b>{{ number_format($value['data'][15]['sum_fu'], 2, ',', ' ') }}</b></td>
            </tr>
            @else
            <tr>
                <td style="height: 65px;" class="sticky-col"><p class="text-scale">{{ $value['ekr']['title'] }}</p></td>
                <td>{{ $value['ekr']['ekr'] }}</td>
                <td>{{ number_format($value['data'][9]['sum_cb'] + $value['data'][10]['sum_cb'] + $value['data'][13]['sum_cb'] + $value['data'][15]['sum_cb'], 2, ',', ' ') }}</td>
                <td>{{ number_format($value['data'][9]['sum_cb'], 2, ',', ' ') }}</td>
                <td>{{ number_format($value['data'][10]['sum_cb'], 2, ',', ' ') }}</td>
                <td>{{ number_format($value['data'][13]['sum_cb'], 2, ',', ' ') }}</td>
                <td>{{ number_format($value['data'][15]['sum_cb'], 2, ',', ' ') }}</td>
                <td><font color="blue">{{ number_format($value['data'][9]['sum_fu'] + $value['data'][10]['sum_fu'] + $value['data'][13]['sum_fu'] + $value['data'][15]['sum_fu'], 2, ',', ' ') }}</td>
                <td><font color="blue">{{ number_format($value['data'][9]['sum_fu'], 2, ',', ' ') }}</td>
                <td><font color="blue">{{ number_format($value['data'][10]['sum_fu'], 2, ',', ' ') }}</td>
                <td><font color="blue">{{ number_format($value['data'][13]['sum_fu'], 2, ',', ' ') }}</td>
                <td><font color="blue">{{ number_format($value['data'][15]['sum_fu'], 2, ',', ' ') }}</td>
            </tr>
            @endif
        @endforeach
        <tr>
            <td style="height: 65px;" class="sticky-col"><p class="text-scale"><b>Итог</b></td>
            <td></td>
            <td><b>{{ number_format($info['total'][9]['sum_cb'] + $info['total'][10]['sum_cb'] + $info['total'][13]['sum_cb'] + $info['total'][15]['sum_cb'], 2, ',', ' ') }}</b></td>
            <td><b>{{ number_format($info['total'][9]['sum_cb'], 2, ',', ' ') }}</b></td>
            <td><b>{{ number_format($info['total'][10]['sum_cb'], 2, ',', ' ') }}</b></td>
            <td><b>{{ number_format($info['total'][13]['sum_cb'], 2, ',', ' ') }}</b></td>
            <td><b>{{ number_format($info['total'][15]['sum_cb'], 2, ',', ' ') }}</b></td>
            <td><font color="blue"><b>{{ number_format($info['total'][9]['sum_fu'] + $info['total'][10]['sum_fu'] + $info['total'][13]['sum_fu'] + $info['total'][15]['sum_fu'], 2, ',', ' ') }}</b></td>
            <td><font color="blue"><b>{{ number_format($info['total'][9]['sum_fu'], 2, ',', ' ') }}</b></td>
            <td><font color="blue"><b>{{ number_format($info['total'][10]['sum_fu'], 2, ',', ' ') }}</b></td>
            <td><font color="blue"><b>{{ number_format($info['total'][13]['sum_fu'], 2, ',', ' ') }}</b></td>
            <td><font color="blue"><b>{{ number_format($info['total'][15]['sum_fu'], 2, ',', ' ') }}</b></td>
        </tr>
    </tbody>
</table>    





