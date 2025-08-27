<p>Выбранные параметры: год 2026, месяц @foreach($info['mounth_name'] AS $value) {{ $value }}, @endforeach</p>
<p></p>
<table class="table2">
    <thead>
        <tr>
            <th style="min-width: 80px; width: 80px;">Учреждение</th>
            <th style="min-width: 200px; width: 200px;" colspan="6">Теплоснабжение</th> 
            <th style="min-width: 200px; width: 200px;" colspan="6">Водоотведение</th> 
            <th style="min-width: 200px; width: 200px;" colspan="6">Негативное воздействие</th> 
            <th style="min-width: 200px; width: 200px;" colspan="6">Водоснабжение</th> 
            <th style="min-width: 200px; width: 200px;" colspan="6">Электроснабжение</th> 
            <th style="min-width: 200px; width: 200px;" colspan="6">Вывоз мусора</th>    
            <th style="min-width: 150px; width: 150px;" rowspan="2">ИТОГО</th> 
        </tr>
    </thead>
    <tbody>
        <tr>
            <th></th>
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
            <td></td>
        </tr>  
        @foreach ($info['utilities'] as $value) 
            @if($info['variant'] == "one")
                <tr>
                    <th>{{ $value['user']['name'] }}</th>
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

                    <td>{{ $value['total'] }}</td>
                </tr>
            @else
                <tr>
                    <th>{{ $value['user']['name'] }}</th>                                
                    <td>{{ $value['mbvolume_heat'] }}</td>
                    <td>{{ $value['pdvolume_heat'] }}</td>
                    <td>{{ $value['volume_heat'] }}</td>
                    <td>{{ $value['mbsum_heat'] }}</td>
                    <td>{{ $value['pdsum_heat'] }}</td>
                    <td>{{ $value['sum_heat'] }}</td>

                    <td>{{ $value['mbvolume_drainage'] }}</td>
                    <td>{{ $value['pdvolume_drainage'] }}</td>
                    <td>{{ $value['volume_drainage'] }}</td>
                    <td>{{ $value['mbsum_drainage'] }}</td>
                    <td>{{ $value['pdsum_drainage'] }}</td>
                    <td>{{ $value['sum_drainage'] }}</td>

                    <td>{{ $value['mbvolume_negative'] }}</td>
                    <td>{{ $value['pdvolume_negative'] }}</td>
                    <td>{{ $value['volume_negative'] }}</td>
                    <td>{{ $value['mbsum_negative'] }}</td>
                    <td>{{ $value['pdsum_negative'] }}</td>
                    <td>{{ $value['sum_negative'] }}</td>

                    <td>{{ $value['mbvolume_water'] }}</td>
                    <td>{{ $value['pdvolume_water'] }}</td>
                    <td>{{ $value['volume_water'] }}</td>
                    <td>{{ $value['mbsum_water'] }}</td>
                    <td>{{ $value['pdsum_water'] }}</td>
                    <td>{{ $value['sum_water'] }}</td>

                    <td>{{ $value['mbvolume_power'] }}</td>
                    <td>{{ $value['pdvolume_power'] }}</td>
                    <td>{{ $value['volume_power'] }}</td>
                    <td>{{ $value['mbsum_power'] }}</td>
                    <td>{{ $value['pdsum_power'] }}</td>
                    <td>{{ $value['sum_power'] }}</td>

                    <td>{{ $value['mbvolume_trash'] }}</td>
                    <td>{{ $value['pdvolume_trash'] }}</td>
                    <td>{{ $value['volume_trash'] }}</td>
                    <td>{{ $value['mbsum_trash'] }}</td>
                    <td>{{ $value['pdsum_trash'] }}</td>
                    <td>{{ $value['sum_trash'] }}</td>

                    <td>{{ $value['total'] }}</td>
                </tr>
            @endif
        @endforeach
        <tr>
            <th>Итог</th>                                
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

            <td>{{ $info['total']['total'] }}</td>
        </tr>
    </tbody>
</table>

