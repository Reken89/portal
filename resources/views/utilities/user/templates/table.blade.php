@php
    function color($sum, $volume, $min, $max)
    {
        if($sum / $volume >= $min && $sum / $volume <= $max){
            return "green";
        }else{
            return "red";
        }
    }
@endphp
<table>
    <tr>
        <input type="hidden" class="mounth" value="{{ $info['mounth'][0] }}">
        <input type="hidden" class="status" value="{{ $info['utilities']['status'] }}">
        <input type="hidden" class="id" value="{{ $info['utilities']['id'] }}">
        <td style="min-width: 200px; width: 200px;"><p><a href="#"><img src="{{ asset('assets/icons/excel-48.png') }}" alt=""></a>- экспорт в EXCEL</p></td>
        @if ($info['utilities']['status'] == 2)
            <td style="min-width: 200px; width: 200px;"><p><a href="" onclick="return false"><img src="{{ asset('assets/icons/tick.png') }}" alt="" id="status"></a>- отправить в ФЭУ</p></td>
        @else
            <td style="min-width: 200px; width: 200px;"><p><a href="" onclick="return false"><img src="{{ asset('assets/icons/system.png') }}" alt="" id="status"></a>- редактировать</p></td>
        @endif
    </tr>
</table>
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
                <input type="hidden" class="type" value="{{ $info['type'][$i] }}">
                @if ($info['utilities']['status'] == 2 && $info['type'][$i] !== "negative")
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
                    @php
                        $color = color($info['utilities'][$sum], $info['utilities'][$volume], $info['tariffs'][$i]['tarif_min'], $info['tariffs'][$i]['tarif_max']);
                    @endphp
                    <td><font color="{{ $color }}">{{ number_format($info['utilities'][$sum] / $info['utilities'][$volume], 4, ',', ' ') }}</td>
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

