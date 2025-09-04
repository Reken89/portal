<table class="table2">
    <thead>
        <tr>
            <th style="min-width: 80px; width: 80px;">Месяц</th>
            <th style="min-width: 200px; width: 200px;" colspan="6">Теплоснабжение</th> 
            <th style="min-width: 200px; width: 200px;" colspan="6">Водоотведение</th> 
            <th style="min-width: 200px; width: 200px;" colspan="6">Негативное воздействие</th> 
            <th style="min-width: 200px; width: 200px;" colspan="6">Водоснабжение</th> 
            <th style="min-width: 200px; width: 200px;" colspan="6">Электроснабжение</th> 
            <th style="min-width: 200px; width: 200px;" colspan="6">Вывоз мусора</th>    
        </tr>
    </thead>
    <tbody>
        <tr>
            <th><b>2026 год</b></th>
            <td style="min-width: 150px; width: 150px;"><b>Объём МБ</b></td><td style="min-width: 150px; width: 150px;"><b>Объём ПД</b></td>
            <td style="min-width: 150px; width: 150px;"><b>Объем всего</b></td><td style="min-width: 150px; width: 150px;"><b>Сумма МБ</b></td>
            <td style="min-width: 150px; width: 150px;"><b>Сумма ПД</b></td><td style="min-width: 150px; width: 150px;"><b>Сумма всего</b></td>

            <td style="min-width: 150px; width: 150px;"><b>Объём МБ</b></td><td style="min-width: 150px; width: 150px;"><b>Объём ПД</b></td>
            <td style="min-width: 150px; width: 150px;"><b>Объем всего</b></td><td style="min-width: 150px; width: 150px;"><b>Сумма МБ</b></td>
            <td style="min-width: 150px; width: 150px;"><b>Сумма ПД</b></td><td style="min-width: 150px; width: 150px;"><b>Сумма всего</b></td>

            <td style="min-width: 150px; width: 150px;"><b>Объём МБ</b></td><td style="min-width: 150px; width: 150px;"><b>Объём ПД</b></td>
            <td style="min-width: 150px; width: 150px;"><b>Объем всего</b></td><td style="min-width: 150px; width: 150px;"><b>Сумма МБ</b></td>
            <td style="min-width: 150px; width: 150px;"><b>Сумма ПД</b></td><td style="min-width: 150px; width: 150px;"><b>Сумма всего</b></td>

            <td style="min-width: 150px; width: 150px;"><b>Объём МБ</b></td><td style="min-width: 150px; width: 150px;"><b>Объём ПД</b></td>
            <td style="min-width: 150px; width: 150px;"><b>Объем всего</b></td><td style="min-width: 150px; width: 150px;"><b>Сумма МБ</b></td>
            <td style="min-width: 150px; width: 150px;"><b>Сумма ПД</b></td><td style="min-width: 150px; width: 150px;"><b>Сумма всего</b></td>

            <td style="min-width: 150px; width: 150px;"><b>Объём МБ</b></td><td style="min-width: 150px; width: 150px;"><b>Объём ПД</b></td>
            <td style="min-width: 150px; width: 150px;"><b>Объем всего</b></td><td style="min-width: 150px; width: 150px;"><b>Сумма МБ</b></td>
            <td style="min-width: 150px; width: 150px;"><b>Сумма ПД</b></td><td style="min-width: 150px; width: 150px;"><b>Сумма всего</b></td>

            <td style="min-width: 150px; width: 150px;"><b>Объём МБ</b></td><td style="min-width: 150px; width: 150px;"><b>Объём ПД</b></td>
            <td style="min-width: 150px; width: 150px;"><b>Объем всего</b></td><td style="min-width: 150px; width: 150px;"><b>Сумма МБ</b></td>
            <td style="min-width: 150px; width: 150px;"><b>Сумма ПД</b></td><td style="min-width: 150px; width: 150px;"><b>Сумма всего</b></td>
        </tr> 
        @foreach ($info['utilities'] as $value) 
            <tr>
                <th><b>{{ $info['mounth'][$value['mounth']] }}</b></th>
                <td>{{ $value['mb_volume_heat'] }}</td>
                <td>{{ $value['pd_volume_heat'] }}</td>
                <td>{{ $value['volume_heat'] }}</td>
                <td>{{ $value['mb_sum_heat'] }}</td>
                <td>{{ $value['pd_sum_heat'] }}</td>
                <td>{{ $value['sum_heat'] }}</td>

                <td>{{ $value['mb_volume_drainage'] }}</td>
                <td>{{ $value['pd_volume_drainage'] }}</td>
                <td>{{ $value['volume_drainage'] }}</td>
                <td>{{ $value['mb_sum_drainage'] }}</td>
                <td>{{ $value['pd_sum_drainage'] }}</td>
                <td>{{ $value['sum_drainage'] }}</td>

                <td>{{ $value['mb_volume_negative'] }}</td>
                <td>{{ $value['pd_volume_negative'] }}</td>
                <td>{{ $value['volume_negative'] }}</td>
                <td>{{ $value['mb_sum_negative'] }}</td>
                <td>{{ $value['pd_sum_negative'] }}</td>
                <td>{{ $value['sum_negative'] }}</td>

                <td>{{ $value['mb_volume_water'] }}</td>
                <td>{{ $value['pd_volume_water'] }}</td>
                <td>{{ $value['volume_water'] }}</td>
                <td>{{ $value['mb_sum_water'] }}</td>
                <td>{{ $value['pd_sum_water'] }}</td>
                <td>{{ $value['sum_water'] }}</td>

                <td>{{ $value['mb_volume_power'] }}</td>
                <td>{{ $value['pd_volume_power'] }}</td>
                <td>{{ $value['volume_power'] }}</td>
                <td>{{ $value['mb_sum_power'] }}</td>
                <td>{{ $value['pd_sum_power'] }}</td>
                <td>{{ $value['sum_power'] }}</td>

                <td>{{ $value['mb_volume_trash'] }}</td>
                <td>{{ $value['pd_volume_trash'] }}</td>
                <td>{{ $value['volume_trash'] }}</td>
                <td>{{ $value['mb_sum_trash'] }}</td>
                <td>{{ $value['pd_sum_trash'] }}</td>
                <td>{{ $value['sum_trash'] }}</td>
            </tr>
        @endforeach
        <tr>
            <th><b>Итог</b></th>                                
            <td>{{ $info['total']['mbvolume_heat'] }}</td>
            <td>{{ $info['total']['pdvolume_heat'] }}</td>
            <td>{{ $info['total']['volume_heat'] }}</td>
            <td>{{ $info['total']['mbsum_heat'] }}</td>
            <td>{{ $info['total']['pdsum_heat'] }}</td>
            <td>{{ $info['total']['sum_heat'] }}</td>

            <td>{{ $info['total']['mbvolume_drainage'] }}</td>
            <td>{{ $info['total']['pdvolume_drainage'] }}</td>
            <td>{{ $info['total']['volume_drainage'] }}</td>
            <td>{{ $info['total']['mbsum_drainage'] }}</td>
            <td>{{ $info['total']['pdsum_drainage'] }}</td>
            <td>{{ $info['total']['sum_drainage'] }}</td>

            <td>{{ $info['total']['mbvolume_negative'] }}</td>
            <td>{{ $info['total']['pdvolume_negative'] }}</td>
            <td>{{ $info['total']['volume_negative'] }}</td>
            <td>{{ $info['total']['mbsum_negative'] }}</td>
            <td>{{ $info['total']['pdsum_negative'] }}</td>
            <td>{{ $info['total']['sum_negative'] }}</td>

            <td>{{ $info['total']['mbvolume_water'] }}</td>
            <td>{{ $info['total']['pdvolume_water'] }}</td>
            <td>{{ $info['total']['volume_water'] }}</td>
            <td>{{ $info['total']['mbsum_water'] }}</td>
            <td>{{ $info['total']['pdsum_water'] }}</td>
            <td>{{ $info['total']['sum_water'] }}</td>

            <td>{{ $info['total']['mbvolume_power'] }}</td>
            <td>{{ $info['total']['pdvolume_power'] }}</td>
            <td>{{ $info['total']['volume_power'] }}</td>
            <td>{{ $info['total']['mbsum_power'] }}</td>
            <td>{{ $info['total']['pdsum_power'] }}</td>
            <td>{{ $info['total']['sum_power'] }}</td>

            <td>{{ $info['total']['mbvolume_trash'] }}</td>
            <td>{{ $info['total']['pdvolume_trash'] }}</td>
            <td>{{ $info['total']['volume_trash'] }}</td>
            <td>{{ $info['total']['mbsum_trash'] }}</td>
            <td>{{ $info['total']['pdsum_trash'] }}</td>
            <td>{{ $info['total']['sum_trash'] }}</td>
        </tr>
    </tbody>   
</table>    
