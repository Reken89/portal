@php
    //var_dump($info['info']['1']);
@endphp
<table class="table2">
    <thead>
        <tr>
            <th>Месяц</th>
            <th>Теплоснабжение</th>
            <th>Водоснабжение</th>
            <th>Водоотведение</th>
            <th>Электроснабжение</th>
            <th>Вывоз мусора</th>
            <th>Негативное воздействие</th>
        </tr>
    </thead>
    <tbody>
        @for ($m = 1; $m <= 12; $m++)
        @php 
            // Группируем данные месяца так, чтобы ключом был title, 
            // а значением — весь массив с tariff и id
            $row = array_column($info['info'][$m], null, 'title'); 
        @endphp
            <tr>
                <td>{{ $info['month'][$m] }}</td>
                <td><input type="hidden" class="tariff-id" value="{{ $row['heat']['id'] }}">
                    <input type="text" size="10" class="tariff" value="{{ number_format($row['heat']['tariff'], 4, ',', ' ') }}">
                </td> 
                <td><input type="hidden" class="tariff-id" value="{{ $row['water']['id'] }}">
                    <input type="text" size="10" class="tariff" value="{{ number_format($row['water']['tariff'], 4, ',', ' ') }}">
                </td> 
                <td><input type="hidden" class="tariff-id" value="{{ $row['drainage']['id'] }}">
                    <input type="text" size="10" class="tariff" value="{{ number_format($row['drainage']['tariff'], 4, ',', ' ') }}">
                </td> 
                <td><input type="hidden" class="tariff-id" value="{{ $row['power']['id'] }}">
                    <input type="text" size="10" class="tariff" value="{{ number_format($row['power']['tariff'], 4, ',', ' ') }}">
                </td> 
                <td><input type="hidden" class="tariff-id" value="{{ $row['trash']['id'] }}">
                    <input type="text" size="10" class="tariff" value="{{ number_format($row['trash']['tariff'], 4, ',', ' ') }}">
                </td>  
                <td><input type="hidden" class="tariff-id" value="{{ $row['negative']['id'] }}">
                    <input type="text" size="10" class="tariff" value="{{ number_format($row['negative']['tariff'], 4, ',', ' ') }}">
                </td>  
            </tr>
        @endfor
    </tbody>
</table>