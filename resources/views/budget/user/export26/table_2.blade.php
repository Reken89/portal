@php 
    $keys = array_merge(range(53, 68), [73, 74, 77, 78]); 
    $fu = 0;
    $cb = 0;
@endphp
<table>
    <thead>
        <tr>
            <th style="min-width: 200px; width: 400px;">Наименование (Год: {{ $info['year'] }})</th>
            <th style="min-width: 70px; width: 70px;">ЭКР</th>
            <th style="min-width: 150px; width: 150px;">Итог ЦБ</th>
            <th style="min-width: 150px; width: 150px;">Совет КМО</th>
            <th style="min-width: 150px; width: 150px;">КСО</th>
            <th style="min-width: 150px; width: 150px;">Глава</th>
            <th style="min-width: 150px; width: 150px;">Администрация</th>
            <th style="min-width: 150px; width: 150px;">Итог ФЭУ</th>
            <th style="min-width: 150px; width: 150px;">(ФЭУ) Совет КМО</th>
            <th style="min-width: 150px; width: 150px;">(ФЭУ) КСО</th>
            <th style="min-width: 150px; width: 150px;">(ФЭУ) Глава</th>
            <th style="min-width: 150px; width: 150px;">(ФЭУ) Администрация</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($info['budget'] as $value) 
                @php
                    $admin_fu = 0; 
                    $admin_cb = 0;
                @endphp
            @foreach ($keys as $key)
                @php
                    $admin_fu += $value['data'][$key]['sum_fu'];
                    $admin_cb += $value['data'][$key]['sum_cb'];
                @endphp
            @endforeach
            
            @if (($value['ekr']['main'] == 'Yes') && ($value['ekr']['ekr'] >= 341 && $value['ekr']['ekr'] <= 349))
                @continue
            @endif
            
            @php 
                $displayEkr = ($value['ekr']['ekr'] >= 341 && $value['ekr']['ekr'] <= 349) ? 340 : $value['ekr']['ekr'];
            @endphp
            
            @if ($value['ekr']['main'] == 'Yes')
            <tr>
                <td><b>{{ $value['ekr']['title'] }}</b></td>
                <td><b>{{ $displayEkr }}</b></td> 
                <td><b>{{ $value['data'][27]['sum_cb'] + $value['data'][28]['sum_cb'] + $value['data'][35]['sum_cb'] + $admin_cb }}</b></td>
                <td><b>{{ $value['data'][27]['sum_cb'] }}</b></td>
                <td><b>{{ $value['data'][28]['sum_cb'] }}</b></td>
                <td><b>{{ $value['data'][35]['sum_cb'] }}</b></td>
                <td><b>{{ $admin_cb }}</b></td>
                <td><b>{{ $value['data'][27]['sum_fu'] + $value['data'][28]['sum_fu'] + $value['data'][35]['sum_fu'] + $admin_fu }}</b></td>
                <td><b>{{ $value['data'][27]['sum_fu'] }}</b></td>
                <td><b>{{ $value['data'][28]['sum_fu'] }}</b></td>
                <td><b>{{ $value['data'][35]['sum_fu'] }}</b></td>
                <td><b>{{ $admin_fu }}</b></td>
            </tr>
            @else
            <tr>
                <td>{{ $value['ekr']['title'] }}</td>
                <td>{{ $displayEkr }}</td> 
                <td>{{ $value['data'][27]['sum_cb'] + $value['data'][28]['sum_cb'] + $value['data'][35]['sum_cb'] + $admin_cb }}</td>          
                <td>{{ $value['data'][27]['sum_cb'] }}</td>
                <td>{{ $value['data'][28]['sum_cb'] }}</td>
                <td>{{ $value['data'][35]['sum_cb'] }}</td>

                <td>{{ $admin_cb }}</td>
                <td>{{ $value['data'][27]['sum_fu'] + $value['data'][28]['sum_fu'] + $value['data'][35]['sum_fu'] + $admin_fu }}</td>
                <td>{{ $value['data'][27]['sum_fu'] }}</td>
                <td>{{ $value['data'][28]['sum_fu'] }}</td>
                <td>{{ $value['data'][35]['sum_fu'] }}</td>
                <td>{{ $admin_fu }}</td>
            </tr>
            @endif
        @endforeach
        @foreach ($keys as $key)
            @php
                $fu += $info['total'][$key]['sum_fu'];
                $cb += $info['total'][$key]['sum_cb'];
            @endphp
        @endforeach
        <tr>
            <td><b>Итог</b></td>
            <td></td>
            <td><b>{{ $info['total'][27]['sum_cb'] + $info['total'][28]['sum_cb'] + $info['total'][35]['sum_cb'] + $cb }}</b></td>
            <td><b>{{ $info['total'][27]['sum_cb'] }}</b></td>
            <td><b>{{ $info['total'][28]['sum_cb'] }}</b></td>
            <td><b>{{ $info['total'][35]['sum_cb'] }}</b></td>
            <td><b>{{ $cb }}</b></td>
            <td><b>{{ $info['total'][27]['sum_fu'] + $info['total'][28]['sum_fu'] + $info['total'][35]['sum_fu'] + $fu }}</b></td>
            <td><b>{{ $info['total'][27]['sum_fu'] }}</b></td>
            <td><b>{{ $info['total'][28]['sum_fu'] }}</b></td>
            <td><b>{{ $info['total'][35]['sum_fu'] }}</b></td>
            <td><b>{{ $fu }}</b></td>
        </tr>
    </tbody>
</table>    





