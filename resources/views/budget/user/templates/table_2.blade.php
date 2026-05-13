@php 
    $keys = array_merge(range(53, 68), [73, 74, 77, 78]); 
    $fu = 0;
    $cb = 0;
@endphp
<font color="Black">
<table class="table2">
    <thead>
        <tr>
            <th style="min-width: 200px; width: 400px;"><font color="White">Год: {{ $info['year'] }}</br>Наименование</th>
            <th style="min-width: 70px; width: 70px;"><font color="White">ЭКР</th>
            <th style="min-width: 150px; width: 150px;"><font color="White">Итог ЦБ</th>
            <th style="min-width: 150px; width: 150px;"><font color="White">Совет КМО</th>
            <th style="min-width: 150px; width: 150px;"><font color="White">КСО</th>
            <th style="min-width: 150px; width: 150px;"><font color="White">Глава</th>
            <th style="min-width: 150px; width: 150px;"><font color="White">Администрация</th>
            <th style="min-width: 150px; width: 150px;"><font color="White">Итог ФЭУ</th>
            <th style="min-width: 150px; width: 150px;"><font color="White">(ФЭУ) Совет КМО</th>
            <th style="min-width: 150px; width: 150px;"><font color="White">(ФЭУ) КСО</th>
            <th style="min-width: 150px; width: 150px;"><font color="White">(ФЭУ) Глава</th>
            <th style="min-width: 150px; width: 150px;"><font color="White">(ФЭУ) Администрация</th>
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
            
            {{-- 1. Скрываем строки с EKR 341-349, если это main --}}
            @if (($value['ekr']['main'] == 'Yes') && ($value['ekr']['ekr'] >= 341 && $value['ekr']['ekr'] <= 349))
                @continue
            @endif
            
            {{-- 2. Подменяем отображение EKR для остальных случаев --}}
            @php 
                $displayEkr = ($value['ekr']['ekr'] >= 341 && $value['ekr']['ekr'] <= 349) ? 340 : $value['ekr']['ekr'];
            @endphp
            
            @if ($value['ekr']['main'] == 'Yes')
            <tr>
                <td style="height: 65px;" class="sticky-col"><b><p class="text-scale">{{ $value['ekr']['title'] }}</b></p></td>
                <td><b>{{ $displayEkr }}</b></td> {{-- Используем подмененную переменную --}}
                <td><b>{{ number_format($value['data'][27]['sum_cb'] + $value['data'][28]['sum_cb'] + $value['data'][35]['sum_cb'] + $admin_cb, 2, ',', ' ') }}</b></td>
                <td><b>{{ number_format($value['data'][27]['sum_cb'], 2, ',', ' ') }}</b></td>
                <td><b>{{ number_format($value['data'][28]['sum_cb'], 2, ',', ' ') }}</b></td>
                <td><b>{{ number_format($value['data'][35]['sum_cb'], 2, ',', ' ') }}</b></td>
                <td><b>{{ number_format($admin_cb, 2, ',', ' ') }}</b></td>
                <td><font color="blue"><b>{{ number_format($value['data'][27]['sum_fu'] + $value['data'][28]['sum_fu'] + $value['data'][35]['sum_fu'] + $admin_fu, 2, ',', ' ') }}</b></td>
                <td><font color="blue"><b>{{ number_format($value['data'][27]['sum_fu'], 2, ',', ' ') }}</b></td>
                <td><font color="blue"><b>{{ number_format($value['data'][28]['sum_fu'], 2, ',', ' ') }}</b></td>
                <td><font color="blue"><b>{{ number_format($value['data'][35]['sum_fu'], 2, ',', ' ') }}</b></td>
                <td><font color="blue"><b>{{ number_format($admin_fu, 2, ',', ' ') }}</b></td>
            </tr>
            @else
            <tr data-id="{{ $value['id'] }}" data-year="{{ $value['year'] }}">
                <td style="height: 65px;" class="sticky-col"><p class="text-scale">{{ $value['ekr']['title'] }}</p></td>
                <td>{{ $displayEkr }}</td> {{-- Используем подмененную переменную --}}
                <td>{{ number_format($value['data'][27]['sum_cb'] + $value['data'][28]['sum_cb'] + $value['data'][35]['sum_cb'] + $admin_cb, 2, ',', ' ') }}</td>
                @if ($info['structure'] == "close")               
                    <td>{{ number_format($value['data'][27]['sum_cb'], 2, ',', ' ') }}</td>
                    <td>{{ number_format($value['data'][28]['sum_cb'], 2, ',', ' ') }}</td>
                    <td>{{ number_format($value['data'][35]['sum_cb'], 2, ',', ' ') }}</td>
                @else
                    <td data-user-id="27">
                        <span class="sum-editable" contenteditable="true">
                            {{ number_format($value['data'][27]['sum_cb'], 2, ',', ' ') }}
                        </span>
                    </td>
                    <td data-user-id="28">
                        <span class="sum-editable" contenteditable="true">
                            {{ number_format($value['data'][28]['sum_cb'], 2, ',', ' ') }}
                        </span>
                    </td>
                    <td data-user-id="35">
                        <span class="sum-editable" contenteditable="true">
                            {{ number_format($value['data'][35]['sum_cb'], 2, ',', ' ') }}
                        </span>
                    </td>
                @endif
                <td>{{ number_format($admin_cb, 2, ',', ' ') }}</td>
                <td><font color="blue">{{ number_format($value['data'][27]['sum_fu'] + $value['data'][28]['sum_fu'] + $value['data'][35]['sum_fu'] + $admin_fu, 2, ',', ' ') }}</td>
                <td><font color="blue">{{ number_format($value['data'][27]['sum_fu'], 2, ',', ' ') }}</td>
                <td><font color="blue">{{ number_format($value['data'][28]['sum_fu'], 2, ',', ' ') }}</td>
                <td><font color="blue">{{ number_format($value['data'][35]['sum_fu'], 2, ',', ' ') }}</td>
                <td><font color="blue">{{ number_format($admin_fu, 2, ',', ' ') }}</td>
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
            <td style="height: 65px;" class="sticky-col"><p class="text-scale"><b>Итог</b></td>
            <td></td>
            <td><b>{{ number_format($info['total'][27]['sum_cb'] + $info['total'][28]['sum_cb'] + $info['total'][35]['sum_cb'] + $cb, 2, ',', ' ') }}</b></td>
            <td><b>{{ number_format($info['total'][27]['sum_cb'], 2, ',', ' ') }}</b></td>
            <td><b>{{ number_format($info['total'][28]['sum_cb'], 2, ',', ' ') }}</b></td>
            <td><b>{{ number_format($info['total'][35]['sum_cb'], 2, ',', ' ') }}</b></td>
            <td><b>{{ number_format($cb, 2, ',', ' ') }}</b></td>
            <td><font color="blue"><b>{{ number_format($info['total'][27]['sum_fu'] + $info['total'][28]['sum_fu'] + $info['total'][35]['sum_fu'] + $fu, 2, ',', ' ') }}</b></td>
            <td><font color="blue"><b>{{ number_format($info['total'][27]['sum_fu'], 2, ',', ' ') }}</b></td>
            <td><font color="blue"><b>{{ number_format($info['total'][28]['sum_fu'], 2, ',', ' ') }}</b></td>
            <td><font color="blue"><b>{{ number_format($info['total'][35]['sum_fu'], 2, ',', ' ') }}</b></td>
            <td><font color="blue"><b>{{ number_format($fu, 2, ',', ' ') }}</b></td>
        </tr>
    </tbody>
</table>    




