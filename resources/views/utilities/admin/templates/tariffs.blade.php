<table>
    <tr>
        <input type="hidden" class="mounth" value="{{ $info['mounth'] }}">
        <td style="min-width: 300px; width: 300px;"><p><a href="" onclick="return false"><img src="{{ asset('assets/icons/calculator.png') }}" alt="" id='synch'></a>- синхронизировать тарифы</p></td>
    </tr>
</table>
<table>
    <thead>
        <tr bgcolor="blue">
            <th style="min-width: 270px; width: 270px;"><font color="White">Услуга</th>
            <th style="min-width: 120px; width: 120px;"><font color="White">min тариф</th>
            <th style="min-width: 120px; width: 120px;"><font color="White">max тариф</th>
            <th style="min-width: 160px; width: 160px;"><font color="White">дата обновления</th>
        </tr>
    </thead>
    <tbody>
        @for($i = 0; $i < 6; $i++)
            <tr>
                <input type="hidden" class="id" value="{{ $info['tariffs'][$i]['id'] }}">
                <th><font color="RoyalBlue">{{ $info['name'][$i] }}</th>
                <td><input type="text" style="width: 100%;" class="min" value="{{ number_format($info['tariffs'][$i]['tarif_min'], 4, ',', ' ') }}"></td>
                <td><input type="text" style="width: 100%;" class="max" value="{{ number_format($info['tariffs'][$i]['tarif_max'], 4, ',', ' ') }}"></td>
                <td style="text-align: center;"><font color="Blue">{{ $info['tariffs'][$i]['date'] }}</td>
            </tr>
        @endfor
    </tbody>
</table> 
@php
    //var_dump($info);
@endphp

