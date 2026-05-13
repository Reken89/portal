<font color="Black">
<table class="table2">
    <thead>
        <tr>
            <th style="min-width: 200px; width: 400px;"><font color="White">Год: {{ $info['year'] }}</br>Наименование</th>
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
            <tr data-id="{{ $value['id'] }}" data-year="{{ $value['year'] }}">
                <td style="height: 65px;" class="sticky-col"><p class="text-scale">{{ $value['ekr']['title'] }}</p></td>
                <td>{{ $displayEkr }}</td> {{-- Используем подмененную переменную --}}
                <td>{{ number_format($value['data'][9]['sum_cb'] + $value['data'][10]['sum_cb'] + $value['data'][13]['sum_cb'] + $value['data'][15]['sum_cb'], 2, ',', ' ') }}</td>
                @if ($info['structure'] == "close")
                    <td>{{ number_format($value['data'][9]['sum_cb'], 2, ',', ' ') }}</td>
                    <td>{{ number_format($value['data'][10]['sum_cb'], 2, ',', ' ') }}</td>
                    <td>{{ number_format($value['data'][13]['sum_cb'], 2, ',', ' ') }}</td>
                    <td>{{ number_format($value['data'][15]['sum_cb'], 2, ',', ' ') }}</td>
                @else
                    <td data-user-id="9">
                        <span class="sum-editable" contenteditable="true">
                            {{ number_format($value['data'][9]['sum_cb'], 2, ',', ' ') }}
                        </span>
                    </td>
                    <td data-user-id="10">
                        <span class="sum-editable" contenteditable="true">
                            {{ number_format($value['data'][10]['sum_cb'], 2, ',', ' ') }}
                        </span>
                    </td>
                    <td data-user-id="13">
                        <span class="sum-editable" contenteditable="true">
                            {{ number_format($value['data'][13]['sum_cb'], 2, ',', ' ') }}
                        </span>
                    </td>
                    <td data-user-id="15">
                        <span class="sum-editable" contenteditable="true">
                            {{ number_format($value['data'][15]['sum_cb'], 2, ',', ' ') }}
                        </span>
                    </td>
                @endif
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





