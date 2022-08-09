@php
{{ $i=0;  }}
@endphp

<table>
    <thead>
    <tr>
        <th style="border: 1px solid black; background: pink;">№</th>
        <th style="border: 1px solid black; background: pink;">Наименование</th>
        <th style="border: 1px solid black; background: pink;">Нормы азота</th>
        <th style="border: 1px solid black; background: pink;">Нормы фосфора</th>
        <th style="border: 1px solid black; background: pink;">Нормы калия</th>
        <th style="border: 1px solid black; background: pink;">Культура</th>
        <th style="border: 1px solid black; background: pink;">Район</th>
        <th style="border: 1px solid black; background: pink;">Стоимость</th>
        <th style="border: 1px solid black; background: pink;">Описание</th>
        <th style="border: 1px solid black; background: pink;">Назначение</th>
    </tr>
    </thead>
    <tbody>
    @foreach($fertilizers as $fertilizer)
        <tr>
            <td style="border: 1px solid black;">{{ ++$i }}</td>
            <td style="border: 1px solid black;">{{$fertilizer->title}}</td>
            <td style="border: 1px solid black;">{{$fertilizer->norm_azot}}</td>
            <td style="border: 1px solid black;">{{$fertilizer->norm_fosfor}}</td>
            <td style="border: 1px solid black;">{{$fertilizer->norm_kalii}}</td>
            <td style="border: 1px solid black;">{{$fertilizer->cultures->title}}</td>
            <td style="border: 1px solid black;">{{$fertilizer->raion}}</td>
            <td style="border: 1px solid black;">{{$fertilizer->cost}}</td>
            <td style="border: 1px solid black;">{{$fertilizer->description}}</td>
            <td style="border: 1px solid black;">{{$fertilizer->target}}</td>
        </tr>
    @endforeach
    </tbody>
</table>
