<p>Тест</p>
<table width="700px">             
    <thead>
        <tr>
            <th style="min-width: 200px; width: 200px;">Наименование расходов</th>
            <th style="min-width: 70px; width: 70px;">ЭКР</th>
            <th style="min-width: 200px; width: 200px;">Плановые назначения ЛБО</th>
            <th style="min-width: 200px; width: 200px;">Зачет авансов, выплаченных в прошлом году</th>
            <th style="min-width: 200px; width: 200px;" colspan="2">Кредиторская задолженность на начало года</th>
            <th style="min-width: 200px; width: 200px;" colspan="2">Дебиторская задолженность на начало года</th>
            <th style="min-width: 200px; width: 200px;" colspan="2">Факт</th>
            <th style="min-width: 200px; width: 200px;" colspan="2">Кассовые расходы</th>
            <th style="min-width: 200px; width: 200px;" colspan="2">Кредиторская задолженность на конец отчетного периода</th>
            <th style="min-width: 200px; width: 200px;" colspan="2">Дебиторская задолженность на конец отчетного периода</th>
            <th style="min-width: 200px; width: 200px;">Возвращено Дт прошлых лет в доход бюджета</th>
            <th style="min-width: 200px; width: 200px;">Контрольное соотношение</th>
            <th style="min-width: 200px; width: 200px;">Контрольное соотношение к плану ЛБО</th>
        </tr>
    </thead>

    <tbody>
        <tr>
            <td>1</td><td>2</td><td>3</td><td>4</td>
            <td>5</td><td>6</td><td>7</td><td>8</td>
            <td>9</td><td>10</td><td>11</td><td>12</td>
            <td>13</td><td>14</td><td>15</td><td>16</td>
            <td>17</td><td>18</td><td>19</td>
        </tr>             
        <tr>
            <td></td><td></td><td></td><td></td>
            <td style="min-width: 150px; width: 150px;">Всего</td><td style="min-width: 150px; width: 150px;">Просроченная</td><td style="min-width: 150px; width: 150px;">Всего</td><td style="min-width: 150px; width: 150px;">Просроченная</td>
            <td style="min-width: 150px; width: 150px;">Всего</td><td style="min-width: 150px; width: 150px;">Текущий месяц</td><td style="min-width: 150px; width: 150px;">Всего</td><td style="min-width: 150px; width: 150px;">Текущий месяц</td>
            <td style="min-width: 150px; width: 150px;">Всего</td><td style="min-width: 150px; width: 150px;">Просроченная</td><td style="min-width: 150px; width: 150px;">Всего</td><td style="min-width: 150px; width: 150px;">Просроченная</td>
            <td></td><td></td><td></td>
        </tr>
               
            @foreach ($info['ofs'] as $value)  
                
                @if ($value['main'] == 'Yes' || $value['main'] == 'Yes')
                    <tr>
                        <td><b>{{ $value['title'] }}</b></td>
                        <td><b>{{ $value['ekr'] }}</b></td>
                        <td><b>{{ $value['lbo'] }}</b></td>
                        <td><b>{{ $value['prepaid'] }}</b></td>
                        <td><b>{{ $value['credit_year_all'] }}</b></td>
                        <td><b>{{ $value['credit_year_term'] }}</b></td>
                        <td><b>{{ $value['debit_year_all'] }}</b></td>
                        <td><b>{{ $value['debit_year_term'] }}</b></td>
                        <td><b>{{ $value['fact_all'] }}</b></td>
                        <td><b>{{ $value['fact_mounth'] }}</b></td>
                        <td><b>{{ $value['kassa_all'] }}</b></td>
                        <td><b>{{ $value['kassa_mounth'] }}</b></td>
                        <td><b>{{ $value['credit_end_all'] }}</b></td>
                        <td><b>{{ $value['credit_end_term'] }}</b></td>
                        <td><b>{{ $value['debit_end_all'] }}</b></td>
                        <td><b>{{ $value['debit_end_term'] }}</b></td>
                        <td><b>{{ $value['return_old_year'] }}</b></td>
                        <td><b>{{ $value['total1'] }}</b></td>
                        <td><b>{{ $value['total2'] }}</b></td>
                    </tr>                
                @else
                    <tr>
                        <td>{{ $value['title'] }}</td>
                        <td>{{ $value['ekr'] }}</td>
                        <td>{{ $value['lbo'] }}</td>  
                        <td>{{ $value['prepaid'] }}</td>
                        <td>{{ $value['credit_year_all'] }}</td>
                        <td>{{ $value['credit_year_term'] }}</td>
                        <td>{{ $value['debit_year_all'] }}</td>
                        <td>{{ $value['debit_year_term'] }}</td>
                        <td>{{ $value['fact_all'] }}</td>
                        <td>{{ $value['fact_mounth'] }}</td>
                        <td>{{ $value['kassa_all'] }}</td>
                        <td>{{ $value['kassa_mounth'] }}</td>
                        <td>{{ $value['credit_end_all'] }}</td>
                        <td>{{ $value['credit_end_term'] }}</td>
                        <td>{{ $value['debit_end_all'] }}</td>
                        <td>{{ $value['debit_end_term'] }}</td>
                        <td>{{ $value['return_old_year'] }}</td>
                        <td>{{ $value['total1'] }}</td>
                        <td>{{ $value['total2'] }}</td>
                    </tr>
                @endif                   
            @endforeach  
        <tr>
            <td><b>ИТОГ</b></td>
            <td></td>
            <td><b>{{ $info['total']['lbo'] }}</b></td>  
            <td><b>{{ $info['total']['prepaid'] }}</b></td>
            <td><b>{{ $info['total']['credit_year_all'] }}</b></td>
            <td><b>{{ $info['total']['credit_year_term'] }}</b></td>
            <td><b>{{ $info['total']['debit_year_all'] }}</b></td>
            <td><b>{{ $info['total']['debit_year_term'] }}</b></td>
            <td><b>{{ $info['total']['fact_all'] }}</b></td>
            <td><b>{{ $info['total']['fact_mounth'] }}</b></td>
            <td><b>{{ $info['total']['kassa_all'] }}</b></td>
            <td><b>{{ $info['total']['kassa_mounth'] }}</b></td>
            <td><b>{{ $info['total']['credit_end_all'] }}</b></td>
            <td><b>{{ $info['total']['credit_end_term'] }}</b></td>
            <td><b>{{ $info['total']['debit_end_all'] }}</b></td>
            <td><b>{{ $info['total']['debit_end_term'] }}</b></td>
            <td><b>{{ $info['total']['return_old_year'] }}</b></td>
            <td><b>{{ $info['total']['total1'] }}</b></td>
            <td><b>{{ $info['total']['total2'] }}</b></td>
        </tr>
    </tbody>
</table>

