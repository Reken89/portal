@if ($info['status'] == true)  
@php
    $shared_id = 1;
    //var_dump($info['ofs']);
@endphp
<font color="Black">
<table class="table2">             
    <thead>
        <tr>
            <th style="min-width: 200px; width: 200px;"><font color="White">Наименование расходов</th>
            <th style="min-width: 70px; width: 70px;"><font color="White">ЭКР</th>
            <th style="min-width: 100px; width: 100px;"><font color="White">Плановые назначения ЛБО</th>
            <th style="min-width: 100px; width: 100px;"><font color="White">Аванс (прошлый год)</th>
            <th style="min-width: 100px; width: 100px;" colspan="2"><font color="White">Кредиторская задолженность</br> на начало года</th>
            <th style="min-width: 100px; width: 100px;" colspan="2"><font color="White">Дебиторская задолженность</br> на начало года</th>
            <th style="min-width: 100px; width: 100px;" colspan="2"><font color="White">Факт</th>
            <th style="min-width: 100px; width: 100px;" colspan="2"><font color="White">Кассовые расходы</th>
            <th style="min-width: 100px; width: 100px;" colspan="2"><font color="White">Кредиторская задолженность на</br> конец отчетного периода</th>
            <th style="min-width: 100px; width: 100px;" colspan="2"><font color="White">Дебиторская задолженность на</br> конец отчетного периода</th>
            <th style="min-width: 100px; width: 100px;"><font color="White">Дт прошлых лет</th>
            <th style="min-width: 100px; width: 100px;"><font color="White">Контрольное соотношение</th>
            <th style="min-width: 100px; width: 100px;"><font color="White">Контрольное соотношение к плану ЛБО</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td class="sticky-col">1</td><td>2</td><td>3</td><td>4</td>
            <td>5</td><td>6</td><td>7</td><td>8</td>
            <td>9</td><td>10</td><td>11</td><td>12</td>
            <td>13</td><td>14</td><td>15</td><td>16</td>
            <td>17</td><td>18</td><td>19</td>
        </tr>             
        <tr>
            <td class="sticky-col"><b>{{ $info['ofs'][0]['user']['name'] }} "{{ $info['chapter'][$info['ofs'][0]['chapter']] }}"</b></td><td></td><td></td><td></td>
            <td style="min-width: 50px; width: 50px;">Всего</td><td style="min-width: 50px; width: 50px;">Просроченная</td>
            <td style="min-width: 50px; width: 50px;">Всего</td><td style="min-width: 50px; width: 50px;">Просроченная</td>
            <td style="min-width: 110px; width: 110px;">Всего</td><td style="min-width: 50px; width: 50px;">Текущий</td>
            <td style="min-width: 110px; width: 110px;">Всего</td><td style="min-width: 50px; width: 50px;">Текущий</td>
            <td style="min-width: 50px; width: 50px;">Всего</td><td style="min-width: 50px; width: 50px;">Просроченная</td>
            <td style="min-width: 50px; width: 50px;">Всего</td><td style="min-width: 50px; width: 50px;">Просроченная</td>
            <td></td><td></td><td></td>
        </tr>               
        @foreach ($info['ofs'] as $value)  

            @if ($value['total1'] < "0" || $value['total1'] > "0")
                @php $color_t1 = "red"; @endphp 
            @else
                @php $color_t1 = "black"; @endphp 
            @endif  

            @if ($value['total2'] < "0")
                @php $color_t2 = "red"; @endphp 
            @else
                @php $color_t2 = "black"; @endphp 
            @endif  

            @if ($value['ekr']['main'] == 'Yes' || $value['ekr']['main'] == 'Yes')
                @php
                    if($value['ekr']['shared'] == 'Yes'){
                        $shared_id = $value['id'];
                    }
                    $main_id = $value['id'];
                @endphp
                <tr>
                    <td style="height: 65px;" class="sticky-col"><p class="text-scale">{{ $value['ekr']['title'] }}</p></td>
                    <td>{{ $value['ekr']['ekr'] }}</td>
                    <td>{{ number_format($value['lbo'], 2, ',', ' ') }}</td>
                    <td>{{ number_format($value['prepaid'], 2, ',', ' ') }}</td>
                    <td>{{ number_format($value['credit_year_all'], 2, ',', ' ') }}</td>
                    <td>{{ number_format($value['credit_year_term'], 2, ',', ' ') }}</td>
                    <td>{{ number_format($value['debit_year_all'], 2, ',', ' ') }}</td>
                    <td>{{ number_format($value['debit_year_term'], 2, ',', ' ') }}</td>
                    <td>{{ number_format($value['fact_all'], 2, ',', ' ') }}</td>
                    <td>{{ number_format($value['fact_mounth'], 2, ',', ' ') }}</td>
                    <td>{{ number_format($value['kassa_all'], 2, ',', ' ') }}</td>
                    <td>{{ number_format($value['kassa_mounth'], 2, ',', ' ') }}</td>
                    <td>{{ number_format($value['credit_end_all'], 2, ',', ' ') }}</td>
                    <td>{{ number_format($value['credit_end_term'], 2, ',', ' ') }}</td>
                    <td>{{ number_format($value['debit_end_all'], 2, ',', ' ') }}</td>
                    <td>{{ number_format($value['debit_end_term'], 2, ',', ' ') }}</td>
                    <td>{{ number_format($value['return_old_year'], 2, ',', ' ') }}</td>
                    <td><font color="{{ $color_t1 }}">{{ number_format($value['total1'], 2, ',', ' ') }}</td>
                    <td><font color="{{ $color_t2 }}">{{ number_format($value['total2'], 2, ',', ' ') }}</td>
                </tr>                
            @elseif ($value['status'] == '2')
                <tr class="line-row">
                    <input type="hidden" class="ekr_id" value="{{ $value['ekr_id'] }}">
                    <input type="hidden" class="user_id" value="{{ $value['user_id'] }}">
                    <input type="hidden" class="number" value="{{ $value['ekr']['number'] }}">
                    <input type="hidden" class="mounth" value="{{ $value['mounth'] }}">
                    <input type="hidden" class="chapter" value="{{ $value['chapter'] }}">
                    <input type="hidden" class="shared_id" value="{{ $shared_id }}">
                    <input type="hidden" class="main_id" value="{{ $main_id }}">
                    <input type="hidden" class="id" value="{{ $value['id'] }}">
                    
                    <input type="hidden" class="lbo_old" value="{{ $value['lbo'] }}">
                    <input type="hidden" class="prepaid_old" value="{{ $value['prepaid'] }}">
                    <input type="hidden" class="credit_year_all_old" value="{{ $value['credit_year_all'] }}">
                    <input type="hidden" class="credit_year_term_old" value="{{ $value['credit_year_term'] }}">
                    <input type="hidden" class="debit_year_all_old" value="{{ $value['debit_year_all'] }}">
                    <input type="hidden" class="debit_year_term_old" value="{{ $value['debit_year_term'] }}">
                    <input type="hidden" class="fact_mounth_old" value="{{ $value['fact_mounth'] }}">
                    <input type="hidden" class="kassa_mounth_old" value="{{ $value['kassa_mounth'] }}">
                    <input type="hidden" class="credit_end_all_old" value="{{ $value['credit_end_all'] }}">
                    <input type="hidden" class="credit_end_term_old" value="{{ $value['credit_end_term'] }}">
                    <input type="hidden" class="debit_end_all_old" value="{{ $value['debit_end_all'] }}">
                    <input type="hidden" class="debit_end_term_old" value="{{ $value['debit_end_term'] }}">
                    <input type="hidden" class="return_old_year_old" value="{{ $value['return_old_year'] }}">
                    
                    <td style="height: 65px;" class="sticky-col"><p class="text-scale">{{ $value['ekr']['title'] }}</p></td>
                    <td>{{ $value['ekr']['ekr'] }}</td>
                    <td><input type="text" size="10" class="lbo" value="{{ number_format($value['lbo'], 2, ',', ' ') }}"></td>  
                    <td><input type="text" size="10" class="prepaid" value="{{ number_format($value['prepaid'], 2, ',', ' ') }}"></td>
                    <td><input type="text" size="10" class="credit_year_all" value="{{ number_format($value['credit_year_all'], 2, ',', ' ') }}"></td>
                    <td><input type="text" size="10" class="credit_year_term" value="{{ number_format($value['credit_year_term'], 2, ',', ' ') }}"></td>
                    <td><input type="text" size="10" class="debit_year_all" value="{{ number_format($value['debit_year_all'], 2, ',', ' ') }}"></td>
                    <td><input type="text" size="10" class="debit_year_term" value="{{ number_format($value['debit_year_term'], 2, ',', ' ') }}"></td>
                    <td>{{ number_format($value['fact_all'], 2, ',', ' ') }}</td>
                    <td><input type="text" size="10" class="fact_mounth" value="{{ number_format($value['fact_mounth'], 2, ',', ' ') }}"></td>
                    <td>{{ number_format($value['kassa_all'], 2, ',', ' ') }}</td>
                    <td><input type="text" size="10" class="kassa_mounth" value="{{ number_format($value['kassa_mounth'], 2, ',', ' ') }}"></td>
                    <td><input type="text" size="10" class="credit_end_all" value="{{ number_format($value['credit_end_all'], 2, ',', ' ') }}"></td>
                    <td><input type="text" size="10" class="credit_end_term" value="{{ number_format($value['credit_end_term'], 2, ',', ' ') }}"></td>
                    <td><input type="text" size="10" class="debit_end_all" value="{{ number_format($value['debit_end_all'], 2, ',', ' ') }}"></td>
                    <td><input type="text" size="10" class="debit_end_term" value="{{ number_format($value['debit_end_term'], 2, ',', ' ') }}"></td>
                    <td><input type="text" size="10" class="return_old_year" value="{{ number_format($value['return_old_year'], 2, ',', ' ') }}"></td>
                    <td><font color="{{ $color_t1 }}">{{ number_format($value['total1'], 2, ',', ' ') }}</td>
                    <td><font color="{{ $color_t2 }}">{{ number_format($value['total2'], 2, ',', ' ') }}</td>
                </tr>
            @else
                <tr>
                    <td style="height: 65px;" class="sticky-col"><p class="text-scale">{{ $value['ekr']['title'] }}</p></td>
                    <td>{{ $value['ekr']['ekr'] }}</td>
                    <td>{{ number_format($value['lbo'], 2, ',', ' ') }}</td>  
                    <td>{{ number_format($value['prepaid'], 2, ',', ' ') }}</td>
                    <td>{{ number_format($value['credit_year_all'], 2, ',', ' ') }}</td>
                    <td>{{ number_format($value['credit_year_term'], 2, ',', ' ') }}</td>
                    <td>{{ number_format($value['debit_year_all'], 2, ',', ' ') }}</td>
                    <td>{{ number_format($value['debit_year_term'], 2, ',', ' ') }}</td>
                    <td>{{ number_format($value['fact_all'], 2, ',', ' ') }}</td>
                    <td>{{ number_format($value['fact_mounth'], 2, ',', ' ') }}</td>
                    <td>{{ number_format($value['kassa_all'], 2, ',', ' ') }}</td>
                    <td>{{ number_format($value['kassa_mounth'], 2, ',', ' ') }}</td>
                    <td>{{ number_format($value['credit_end_all'], 2, ',', ' ') }}</td>
                    <td>{{ number_format($value['credit_end_term'], 2, ',', ' ') }}</td>
                    <td>{{ number_format($value['debit_end_all'], 2, ',', ' ') }}</td>
                    <td>{{ number_format($value['debit_end_term'], 2, ',', ' ') }}</td>
                    <td>{{ number_format($value['return_old_year'], 2, ',', ' ') }}</td>
                    <td>{{ number_format($value['total1'], 2, ',', ' ') }}</td>
                    <td>{{ number_format($value['total2'], 2, ',', ' ') }}</td>
                </tr>
            @endif                   
        @endforeach 
        <tr>
            <td style="height: 65px;" class="sticky-col">ИТОГ</td>
            <td></td>
            <td><font color="blue">{{ number_format($info['total']['lbo'], 2, ',', ' ') }}</td>  
            <td><font color="blue">{{ number_format($info['total']['prepaid'], 2, ',', ' ') }}</td>
            <td><font color="blue">{{ number_format($info['total']['credit_year_all'], 2, ',', ' ') }}</td>
            <td><font color="blue">{{ number_format($info['total']['credit_year_term'], 2, ',', ' ') }}</td>
            <td><font color="blue">{{ number_format($info['total']['debit_year_all'], 2, ',', ' ') }}</td>
            <td><font color="blue">{{ number_format($info['total']['debit_year_term'], 2, ',', ' ') }}</td>
            <td><font color="blue">{{ number_format($info['total']['fact_all'], 2, ',', ' ') }}</td>
            <td><font color="blue">{{ number_format($info['total']['fact_mounth'], 2, ',', ' ') }}</td>
            <td><font color="blue">{{ number_format($info['total']['kassa_all'], 2, ',', ' ') }}</td>
            <td><font color="blue">{{ number_format($info['total']['kassa_mounth'], 2, ',', ' ') }}</td>
            <td><font color="blue">{{ number_format($info['total']['credit_end_all'], 2, ',', ' ') }}</td>
            <td><font color="blue">{{ number_format($info['total']['credit_end_term'], 2, ',', ' ') }}</td>
            <td><font color="blue">{{ number_format($info['total']['debit_end_all'], 2, ',', ' ') }}</td>
            <td><font color="blue">{{ number_format($info['total']['debit_end_term'], 2, ',', ' ') }}</td>
            <td><font color="blue">{{ number_format($info['total']['return_old_year'], 2, ',', ' ') }}</td>
            <td><font color="blue">{{ number_format($info['total']['total1'], 2, ',', ' ') }}</td>
            <td><font color="blue">{{ number_format($info['total']['total2'], 2, ',', ' ') }}</td>
        </tr>
    </tbody>
</table>
<script>
    $(document).ready(function(){ 
        const rows = document.querySelectorAll('.text-scale'); // Получаем все строки
        rows.forEach(row => {
            // Добавляем обработчик при наведении мышью
            row.addEventListener('mouseenter', () => {
                console.log('Навели на:', row.textContent); // Выполнить действие, например, вывод в консоль
                //row.style.fontWeight = 'bold'; // Изменить стиль
            });

            // Добавляем обработчик при выходе мышью
            row.addEventListener('mouseleave', () => {
                console.log('Ушли с:', row.textContent);
                row.style.fontWeight = 'normal'; // Вернуть стиль к исходному
            });
        });

        const rows2 = document.querySelectorAll('.line-row');
        rows2.forEach(row => {
            row.addEventListener('click', () => {
              // Сначала удаляем класс "selected" у всех строк
              rows2.forEach(r => r.classList.remove('text-selected'));
              // Добавляем класс "selected" к текущей строке
              row.classList.add('text-selected');
            });
        });
    });
</script>    
@else
    <p>Не выбраны параметры для формирования таблицы!</p>
@endif

