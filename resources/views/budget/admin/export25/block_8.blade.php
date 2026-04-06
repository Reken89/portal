<table>
    <thead>
        <tr>
            <th style="min-width: 200px; width: 200px;">Наименование</th>
            <th style="min-width: 70px; width: 70px;">ЭКР</th>
            <th style="min-width: 150px; width: 150px;">СВОД ФЭУ</th>
            <th style="min-width: 150px; width: 150px;">СВОД ЦБ</th>
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
                <td><b>{{ $value['ekr']['title'] }}</b></td>
                <td><b>{{ $value['ekr']['ekr'] }}</b></td>
                <td><b>{{ $sum_fu }}</b></td>
                <td><b>{{ $sum_cb }}</b></td>
            </tr>
            @else
            <tr>
                <td>{{ $value['ekr']['title'] }}</td>
                <td>{{ $value['ekr']['ekr'] }}</td>
                <td>{{ $sum_fu }}</td>
                <td>{{ $sum_cb }}</td>
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
            <td><b>Итог</b></td>
            <td></td>
            <td><b>{{ $fu }}</b></td>
            <td><b>{{ $cb }}</b></td>
        </tr>
    </tbody>
</table>    






