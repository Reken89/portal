<font color="Black">
<table class="table2">
    <thead>
        <tr>
            <th style="min-width: 200px; width: 400px;"><font color="White">Наименование</th>
            <th style="min-width: 70px; width: 70px;"><font color="White">ЭКР</th>
            <th style="min-width: 150px; width: 150px;"><font color="White">0104<br>Расходы администрации</th>
            <th style="min-width: 150px; width: 150px;"><font color="White">0105<br>Судебная система</th>
            <th style="min-width: 150px; width: 150px;"><font color="White">0111<br>Резервный фонд</th>
            <th style="min-width: 150px; width: 150px;"><font color="White">0113<br>Другие общегосударственные расходы</th>
            <th style="min-width: 150px; width: 150px;"><font color="White">0309<br>ГО и ЧС</th>
            <th style="min-width: 150px; width: 150px;"><font color="White">0405<br>Животные</th>
            <th style="min-width: 150px; width: 150px;"><font color="White">0408<br>Транспорт</th>
            <th style="min-width: 150px; width: 150px;"><font color="White">0409<br>Дорожный фонд</th>
            <th style="min-width: 150px; width: 150px;"><font color="White">0412<br>Другие вопросы нац. экономики</th>
            <th style="min-width: 150px; width: 150px;"><font color="White">0502<br>Коммунальное хозяйство</th>
            <th style="min-width: 150px; width: 150px;"><font color="White">0503<br>Благоустройство</th>
            <th style="min-width: 150px; width: 150px;"><font color="White">0909<br>Костомукша город здоровья</th>
            <th style="min-width: 150px; width: 150px;"><font color="White">1001<br>Пенсии</th>
            <th style="min-width: 150px; width: 150px;"><font color="White">1003<br>Социальная поддержка граждан</th>
            <th style="min-width: 150px; width: 150px;"><font color="White">1101<br>Физкультура и спорт</th>
            <th style="min-width: 150px; width: 150px;"><font color="White">1301<br>Обслуживание МД</th>
            <th style="min-width: 150px; width: 150px;"><font color="White">0314<br>Другие вопросы</th>
            <th style="min-width: 150px; width: 150px;"><font color="White">0501<br>Жилищное хозяйство</th>
            
            <th style="min-width: 150px; width: 150px;"><font color="White">0104<br>Расходы администрации</th>
            <th style="min-width: 150px; width: 150px;"><font color="White">0105<br>Судебная система</th>
            <th style="min-width: 150px; width: 150px;"><font color="White">0111<br>Резервный фонд</th>
            <th style="min-width: 150px; width: 150px;"><font color="White">0113<br>Другие общегосударственные расходы</th>
            <th style="min-width: 150px; width: 150px;"><font color="White">0309<br>ГО и ЧС</th>
            <th style="min-width: 150px; width: 150px;"><font color="White">0405<br>Животные</th>
            <th style="min-width: 150px; width: 150px;"><font color="White">0408<br>Транспорт</th>
            <th style="min-width: 150px; width: 150px;"><font color="White">0409<br>Дорожный фонд</th>
            <th style="min-width: 150px; width: 150px;"><font color="White">0412<br>Другие вопросы нац. экономики</th>
            <th style="min-width: 150px; width: 150px;"><font color="White">0502<br>Коммунальное хозяйство</th>
            <th style="min-width: 150px; width: 150px;"><font color="White">0503<br>Благоустройство</th>
            <th style="min-width: 150px; width: 150px;"><font color="White">0909<br>Костомукша город здоровья</th>
            <th style="min-width: 150px; width: 150px;"><font color="White">1001<br>Пенсии</th>
            <th style="min-width: 150px; width: 150px;"><font color="White">1003<br>Социальная поддержка граждан</th>
            <th style="min-width: 150px; width: 150px;"><font color="White">1101<br>Физкультура и спорт</th>
            <th style="min-width: 150px; width: 150px;"><font color="White">1301<br>Обслуживание МД</th>
            <th style="min-width: 150px; width: 150px;"><font color="White">0314<br>Другие вопросы</th>
            <th style="min-width: 150px; width: 150px;"><font color="White">0501<br>Жилищное хозяйство</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($info['budget'] as $value) 
            @if ($value['ekr']['main'] === 'Yes')
            <tr>
                <td style="height: 65px;" class="sticky-col"><b><p class="text-scale">{{ $value['ekr']['title'] }}</b></p></td>
                <td><b>{{ $value['ekr']['ekr'] }}</b></td>
                <td><b>{{ number_format($value['data'][53]['sum_fu'], 2, ',', ' ') }}</b></td>
                <td><b>{{ number_format($value['data'][54]['sum_fu'], 2, ',', ' ') }}</b></td>
                <td><b>{{ number_format($value['data'][55]['sum_fu'], 2, ',', ' ') }}</b></td>
                <td><b>{{ number_format($value['data'][56]['sum_fu'], 2, ',', ' ') }}</b></td>
                <td><b>{{ number_format($value['data'][57]['sum_fu'], 2, ',', ' ') }}</b></td>
                <td><b>{{ number_format($value['data'][58]['sum_fu'], 2, ',', ' ') }}</b></td>
                <td><b>{{ number_format($value['data'][59]['sum_fu'], 2, ',', ' ') }}</b></td>
                <td><b>{{ number_format($value['data'][60]['sum_fu'], 2, ',', ' ') }}</b></td>
                <td><b>{{ number_format($value['data'][61]['sum_fu'], 2, ',', ' ') }}</b></td>
                <td><b>{{ number_format($value['data'][62]['sum_fu'], 2, ',', ' ') }}</b></td>
                <td><b>{{ number_format($value['data'][63]['sum_fu'], 2, ',', ' ') }}</b></td>
                <td><b>{{ number_format($value['data'][64]['sum_fu'], 2, ',', ' ') }}</b></td>
                <td><b>{{ number_format($value['data'][65]['sum_fu'], 2, ',', ' ') }}</b></td>
                <td><b>{{ number_format($value['data'][66]['sum_fu'], 2, ',', ' ') }}</b></td>
                <td><b>{{ number_format($value['data'][67]['sum_fu'], 2, ',', ' ') }}</b></td>
                <td><b>{{ number_format($value['data'][68]['sum_fu'], 2, ',', ' ') }}</b></td>
                <td><b>{{ number_format($value['data'][73]['sum_fu'], 2, ',', ' ') }}</b></td>
                <td><b>{{ number_format($value['data'][74]['sum_fu'], 2, ',', ' ') }}</b></td>
                
                <td><font color="blue"><b>{{ number_format($value['data'][53]['sum_cb'], 2, ',', ' ') }}</b></td>
                <td><font color="blue"><b>{{ number_format($value['data'][54]['sum_cb'], 2, ',', ' ') }}</b></td>
                <td><font color="blue"><b>{{ number_format($value['data'][55]['sum_cb'], 2, ',', ' ') }}</b></td>
                <td><font color="blue"><b>{{ number_format($value['data'][56]['sum_cb'], 2, ',', ' ') }}</b></td>
                <td><font color="blue"><b>{{ number_format($value['data'][57]['sum_cb'], 2, ',', ' ') }}</b></td>
                <td><font color="blue"><b>{{ number_format($value['data'][58]['sum_cb'], 2, ',', ' ') }}</b></td>
                <td><font color="blue"><b>{{ number_format($value['data'][59]['sum_cb'], 2, ',', ' ') }}</b></td>
                <td><font color="blue"><b>{{ number_format($value['data'][60]['sum_cb'], 2, ',', ' ') }}</b></td>
                <td><font color="blue"><b>{{ number_format($value['data'][61]['sum_cb'], 2, ',', ' ') }}</b></td>
                <td><font color="blue"><b>{{ number_format($value['data'][62]['sum_cb'], 2, ',', ' ') }}</b></td>
                <td><font color="blue"><b>{{ number_format($value['data'][63]['sum_cb'], 2, ',', ' ') }}</b></td>
                <td><font color="blue"><b>{{ number_format($value['data'][64]['sum_cb'], 2, ',', ' ') }}</b></td>
                <td><font color="blue"><b>{{ number_format($value['data'][65]['sum_cb'], 2, ',', ' ') }}</b></td>
                <td><font color="blue"><b>{{ number_format($value['data'][66]['sum_cb'], 2, ',', ' ') }}</b></td>
                <td><font color="blue"><b>{{ number_format($value['data'][67]['sum_cb'], 2, ',', ' ') }}</b></td>
                <td><font color="blue"><b>{{ number_format($value['data'][68]['sum_cb'], 2, ',', ' ') }}</b></td>
                <td><font color="blue"><b>{{ number_format($value['data'][73]['sum_cb'], 2, ',', ' ') }}</b></td>
                <td><font color="blue"><b>{{ number_format($value['data'][74]['sum_cb'], 2, ',', ' ') }}</b></td>
            </tr>
            @else
            <tr>
                <td style="height: 65px;" class="sticky-col"><p class="text-scale">{{ $value['ekr']['title'] }}</p></td>
                <td>{{ $value['ekr']['ekr'] }}</td>
                <td>{{ number_format($value['data'][53]['sum_fu'], 2, ',', ' ') }}</td>
                <td>{{ number_format($value['data'][54]['sum_fu'], 2, ',', ' ') }}</td>
                <td>{{ number_format($value['data'][55]['sum_fu'], 2, ',', ' ') }}</td>
                <td>{{ number_format($value['data'][56]['sum_fu'], 2, ',', ' ') }}</td>
                <td>{{ number_format($value['data'][57]['sum_fu'], 2, ',', ' ') }}</td>
                <td>{{ number_format($value['data'][58]['sum_fu'], 2, ',', ' ') }}</td>
                <td>{{ number_format($value['data'][59]['sum_fu'], 2, ',', ' ') }}</td>
                <td>{{ number_format($value['data'][60]['sum_fu'], 2, ',', ' ') }}</td>
                <td>{{ number_format($value['data'][61]['sum_fu'], 2, ',', ' ') }}</td>
                <td>{{ number_format($value['data'][62]['sum_fu'], 2, ',', ' ') }}</td>
                <td>{{ number_format($value['data'][63]['sum_fu'], 2, ',', ' ') }}</td>
                <td>{{ number_format($value['data'][64]['sum_fu'], 2, ',', ' ') }}</td>
                <td>{{ number_format($value['data'][65]['sum_fu'], 2, ',', ' ') }}</td>
                <td>{{ number_format($value['data'][66]['sum_fu'], 2, ',', ' ') }}</td>
                <td>{{ number_format($value['data'][67]['sum_fu'], 2, ',', ' ') }}</td>
                <td>{{ number_format($value['data'][68]['sum_fu'], 2, ',', ' ') }}</td>
                <td>{{ number_format($value['data'][73]['sum_fu'], 2, ',', ' ') }}</td>
                <td>{{ number_format($value['data'][74]['sum_fu'], 2, ',', ' ') }}</td>
                
                <td><font color="blue">{{ number_format($value['data'][53]['sum_cb'], 2, ',', ' ') }}</td>
                <td><font color="blue">{{ number_format($value['data'][54]['sum_cb'], 2, ',', ' ') }}</td>
                <td><font color="blue">{{ number_format($value['data'][55]['sum_cb'], 2, ',', ' ') }}</td>
                <td><font color="blue">{{ number_format($value['data'][56]['sum_cb'], 2, ',', ' ') }}</td>
                <td><font color="blue">{{ number_format($value['data'][57]['sum_cb'], 2, ',', ' ') }}</td>
                <td><font color="blue">{{ number_format($value['data'][58]['sum_cb'], 2, ',', ' ') }}</td>
                <td><font color="blue">{{ number_format($value['data'][59]['sum_cb'], 2, ',', ' ') }}</td>
                <td><font color="blue">{{ number_format($value['data'][60]['sum_cb'], 2, ',', ' ') }}</td>
                <td><font color="blue">{{ number_format($value['data'][61]['sum_cb'], 2, ',', ' ') }}</td>
                <td><font color="blue">{{ number_format($value['data'][62]['sum_cb'], 2, ',', ' ') }}</td>
                <td><font color="blue">{{ number_format($value['data'][63]['sum_cb'], 2, ',', ' ') }}</td>
                <td><font color="blue">{{ number_format($value['data'][64]['sum_cb'], 2, ',', ' ') }}</td>
                <td><font color="blue">{{ number_format($value['data'][65]['sum_cb'], 2, ',', ' ') }}</td>
                <td><font color="blue">{{ number_format($value['data'][66]['sum_cb'], 2, ',', ' ') }}</td>
                <td><font color="blue">{{ number_format($value['data'][67]['sum_cb'], 2, ',', ' ') }}</td>
                <td><font color="blue">{{ number_format($value['data'][68]['sum_cb'], 2, ',', ' ') }}</td>
                <td><font color="blue">{{ number_format($value['data'][73]['sum_cb'], 2, ',', ' ') }}</td>
                <td><font color="blue">{{ number_format($value['data'][74]['sum_cb'], 2, ',', ' ') }}</td>
            </tr>
            @endif
        @endforeach
        <tr>
            <td style="height: 65px;" class="sticky-col"><p class="text-scale"><b>Итог</b></td>
            <td></td>
            <td><b>{{ number_format($info['total'][53]['sum_fu'], 2, ',', ' ') }}</b></td>
            <td><b>{{ number_format($info['total'][54]['sum_fu'], 2, ',', ' ') }}</b></td>
            <td><b>{{ number_format($info['total'][55]['sum_fu'], 2, ',', ' ') }}</b></td>
            <td><b>{{ number_format($info['total'][56]['sum_fu'], 2, ',', ' ') }}</b></td>
            <td><b>{{ number_format($info['total'][57]['sum_fu'], 2, ',', ' ') }}</b></td>
            <td><b>{{ number_format($info['total'][58]['sum_fu'], 2, ',', ' ') }}</b></td>
            <td><b>{{ number_format($info['total'][59]['sum_fu'], 2, ',', ' ') }}</b></td>
            <td><b>{{ number_format($info['total'][60]['sum_fu'], 2, ',', ' ') }}</b></td>
            <td><b>{{ number_format($info['total'][61]['sum_fu'], 2, ',', ' ') }}</b></td>
            <td><b>{{ number_format($info['total'][62]['sum_fu'], 2, ',', ' ') }}</b></td>
            <td><b>{{ number_format($info['total'][63]['sum_fu'], 2, ',', ' ') }}</b></td>
            <td><b>{{ number_format($info['total'][64]['sum_fu'], 2, ',', ' ') }}</b></td>
            <td><b>{{ number_format($info['total'][65]['sum_fu'], 2, ',', ' ') }}</b></td>
            <td><b>{{ number_format($info['total'][66]['sum_fu'], 2, ',', ' ') }}</b></td>
            <td><b>{{ number_format($info['total'][67]['sum_fu'], 2, ',', ' ') }}</b></td>
            <td><b>{{ number_format($info['total'][68]['sum_fu'], 2, ',', ' ') }}</b></td>
            <td><b>{{ number_format($info['total'][73]['sum_fu'], 2, ',', ' ') }}</b></td>
            <td><b>{{ number_format($info['total'][74]['sum_fu'], 2, ',', ' ') }}</b></td>
            
            <td><font color="blue"><b>{{ number_format($info['total'][53]['sum_cb'], 2, ',', ' ') }}</b></td>
            <td><font color="blue"><b>{{ number_format($info['total'][54]['sum_cb'], 2, ',', ' ') }}</b></td>
            <td><font color="blue"><b>{{ number_format($info['total'][55]['sum_cb'], 2, ',', ' ') }}</b></td>
            <td><font color="blue"><b>{{ number_format($info['total'][56]['sum_cb'], 2, ',', ' ') }}</b></td>
            <td><font color="blue"><b>{{ number_format($info['total'][57]['sum_cb'], 2, ',', ' ') }}</b></td>
            <td><font color="blue"><b>{{ number_format($info['total'][58]['sum_cb'], 2, ',', ' ') }}</b></td>
            <td><font color="blue"><b>{{ number_format($info['total'][59]['sum_cb'], 2, ',', ' ') }}</b></td>
            <td><font color="blue"><b>{{ number_format($info['total'][60]['sum_cb'], 2, ',', ' ') }}</b></td>
            <td><font color="blue"><b>{{ number_format($info['total'][61]['sum_cb'], 2, ',', ' ') }}</b></td>
            <td><font color="blue"><b>{{ number_format($info['total'][62]['sum_cb'], 2, ',', ' ') }}</b></td>
            <td><font color="blue"><b>{{ number_format($info['total'][63]['sum_cb'], 2, ',', ' ') }}</b></td>
            <td><font color="blue"><b>{{ number_format($info['total'][64]['sum_cb'], 2, ',', ' ') }}</b></td>
            <td><font color="blue"><b>{{ number_format($info['total'][65]['sum_cb'], 2, ',', ' ') }}</b></td>
            <td><font color="blue"><b>{{ number_format($info['total'][66]['sum_cb'], 2, ',', ' ') }}</b></td>
            <td><font color="blue"><b>{{ number_format($info['total'][67]['sum_cb'], 2, ',', ' ') }}</b></td>
            <td><font color="blue"><b>{{ number_format($info['total'][68]['sum_cb'], 2, ',', ' ') }}</b></td>
            <td><font color="blue"><b>{{ number_format($info['total'][73]['sum_cb'], 2, ',', ' ') }}</b></td>
            <td><font color="blue"><b>{{ number_format($info['total'][74]['sum_cb'], 2, ',', ' ') }}</b></td>
        </tr>
    </tbody>
</table>    
