<font color="Black">
<table class="table2">
    <thead>
        <tr>
            <th style="min-width: 200px; width: 200px;"><font color="White">Наименование</th>
            <th style="min-width: 70px; width: 70px;"><font color="White">ЭКР</th>
            <th style="min-width: 150px; width: 150px;"><font color="White">СВОД ФЭУ</th>
            <th style="min-width: 150px; width: 150px;"><font color="White">СВОД ЦБ</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($info['budget'] as $value) 
            @php 
                $sum_fu = 0;
                $sum_cb = 0;
            @endphp    
                @foreach ($value['data'] as $data)
                    @php
                        $sum_fu += $data['sum_fu'];
                        $sum_cb += $data['sum_cb'];
                    @endphp
                @endforeach
            @if ($value['ekr']['main'] == 'Yes')
            <tr>
                <td style="height: 65px;" class="sticky-col"><b><p class="text-scale">{{ $value['ekr']['title'] }}</b></p></td>
                <td><b>{{ $value['ekr']['ekr'] }}</b></td>
                <td><b>{{ number_format($sum_fu, 2, ',', ' ') }}</b></td>
                <td><font color="blue"><b>{{ number_format($sum_cb, 2, ',', ' ') }}</b></td>
            </tr>
            @else
            <tr>
                <td style="height: 65px;" class="sticky-col"><p class="text-scale">{{ $value['ekr']['title'] }}</p></td>
                <td>{{ $value['ekr']['ekr'] }}</td>
                <td>{{ number_format($sum_fu, 2, ',', ' ') }}</td>
                <td><font color="blue">{{ number_format($sum_cb, 2, ',', ' ') }}</td>
            </tr>
            @endif
        @endforeach
        @php
            $fu = 0;
            $cb = 0;
            foreach($info['total'] as $total){
                $fu += $total['sum_fu'];
                $cb += $total['sum_cb'];
            }
        @endphp
        <tr>
            <td style="height: 65px;" class="sticky-col"><p class="text-scale"><b>Итог</b></td>
            <td></td>
            <td><b>{{ number_format($fu, 2, ',', ' ') }}</b></td>
            <td><font color="blue"><b>{{ number_format($cb, 2, ',', ' ') }}</b></td>
        </tr>
    </tbody>
</table>    






