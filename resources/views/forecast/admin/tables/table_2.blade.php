@php
    //var_dump($info['info']);
@endphp
<table class="table2">
    <thead>
        <tr>
            <th>Январь (2026)</th>
            <th>Февраль (2026)</th>
            <th>Март (2026)</th>
            <th>Апрель (2026)</th>
            <th>Май (2026)</th>
            <th>Июнь (2026)</th>
            <th>Июль (2025)</th>
            <th>Август (2025)</th>
            <th>Сентябрь (2025)</th>
            <th>Октябрь (2025)</th>
            <th>Ноябрь (2025)</th>
            <th>Декабрь (2025)</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            @foreach($info['info'] as $monthNumber => $isActive)
                @if($loop->iteration > 6)
                    @break
                @endif
                <td style="background-color: {{ $isActive ? 'green' : 'red' }}; color: white;">
                    <b>{{ $isActive ? 'отлично' : 'ошибка' }}</b>
                </td>
            @endforeach
            <td style="background-color: green; color: white;"><b>отлично</b></td>
            <td style="background-color: green; color: white;"><b>отлично</b></td>
            <td style="background-color: green; color: white;"><b>отлично</b></td>
            <td style="background-color: green; color: white;"><b>отлично</b></td>
            <td style="background-color: green; color: white;"><b>отлично</b></td>
            <td style="background-color: green; color: white;"><b>отлично</b></td>
        </tr>
    </tbody>
</table>

