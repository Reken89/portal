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
            @if ($value['ekr']['main'] == 'Yes')
            <tr>
                <td style="height: 65px;" class="sticky-col"><b><p class="text-scale">{{ $value['ekr']['title'] }}</b></p></td>
                <td><b>{{ $value['ekr']['ekr'] }}</b></td>
                <td><b>???</b></td>
                <td><font color="blue"><b>???</b></td>
            </tr>
            @else
            <tr>
                <td style="height: 65px;" class="sticky-col"><p class="text-scale">{{ $value['ekr']['title'] }}</p></td>
                <td>{{ $value['ekr']['ekr'] }}</td>
                <td>???</td>
                <td><font color="blue">???</td>
            </tr>
            @endif
        @endforeach
        <tr>
            <td style="height: 65px;" class="sticky-col"><p class="text-scale"><b>Итог</b></td>
            <td></td>
            <td><b>???</b></td>
            <td><font color="blue"><b>???</b></td>
        </tr>
    </tbody>
</table>    






