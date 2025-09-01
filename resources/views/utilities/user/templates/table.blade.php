<table class="table2">
    <thead>
        <tr>
            <th style="min-width: 80px; width: 80px;"><font color="White">Услуга</th>
            <th style="min-width: 100px; width: 100px;"><font color="White">Объём МБ</th>
            <th style="min-width: 100px; width: 100px;"><font color="White">Объём ПД</th>
            <th style="min-width: 100px; width: 100px;"><font color="White">Сумма МБ</th>
            <th style="min-width: 100px; width: 100px;"><font color="White">Сумма ПД</th>
            <th style="min-width: 100px; width: 100px;"><font color="White">Объём всего</th>
            <th style="min-width: 100px; width: 100px;"><font color="White">Сумма всего</th>
            <th style="min-width: 100px; width: 100px;"><font color="White">Ваш тариф</th>
            <th style="min-width: 100px; width: 100px;"><font color="White">min тариф</th>
            <th style="min-width: 100px; width: 100px;"><font color="White">max тариф</th>
        </tr>
    </thead>
    <tbody>
        @for($i = 0; $i < 6; $i++)
            <tr>
                <input type="hidden" class="id" value="{{ $info['utilities']['id'] }}">
                <th><font color="RoyalBlue">{{ $info['name'][$i] }}</th>
                @php $type = $info['type']; $mbvolume = "mb_volume_$type[$i]"; $pdvolume = "pd_volume_$type[$i]"; 
                $mbsum = "mb_sum_$type[$i]"; $pdsum = "pd_sum_$type[$i]"; 
                $volume = "volume_$type[$i]"; $sum = "sum_$type[$i]"; 
                @endphp
                @if ($info['utilities']['status'] == 2)
                    <td><input type="text" style="width: 100%;" class="mb_volume" value="{{ number_format($info['utilities'][$mbvolume], 4, ',', ' ') }}"></td>
                    <td><input type="text" style="width: 100%;" class="pd_volume" value="{{ number_format($info['utilities'][$pdvolume], 4, ',', ' ') }}"></td>
                    <td><input type="text" style="width: 100%;" class="mb_sum" value="{{ number_format($info['utilities'][$mbsum], 2, ',', ' ') }}"></td>
                    <td><input type="text" style="width: 100%;" class="pd_sum" value="{{ number_format($info['utilities'][$pdsum], 2, ',', ' ') }}"></td>
                @else
                    <td>{{ number_format($info['utilities'][$mbvolume], 4, ',', ' ') }}</td>
                    <td>{{ number_format($info['utilities'][$pdvolume], 4, ',', ' ') }}</td>
                    <td>{{ number_format($info['utilities'][$mbsum], 2, ',', ' ') }}</td>
                    <td>{{ number_format($info['utilities'][$pdsum], 2, ',', ' ') }}</td>
                @endif
                <td>{{ number_format($info['utilities'][$volume], 4, ',', ' ') }}</td>
                <td>{{ number_format($info['utilities'][$sum], 2, ',', ' ') }}</td>
                @if ($info['utilities'][$volume] == 0)
                    <td><font color="green">0</td>
                @else
                    <td></td>
                @endif
                <td>{{ number_format($info['tariffs'][$i]['tarif_min'], 4, ',', ' ') }}</td>
                <td>{{ number_format($info['tariffs'][$i]['tarif_max'], 4, ',', ' ') }}</td>
            </tr>
        @endfor
    </tbody>
</table>    
@php
    //var_dump($info['tariffs']);
@endphp    

