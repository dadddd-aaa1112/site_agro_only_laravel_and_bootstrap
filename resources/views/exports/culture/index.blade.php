@php
    {{ $i=0; }}
@endphp


<table>
    <thead>
    <tr>
        <th style="background: blue; border: 1px solid black">№</th>
        <th style="background: blue; border: 1px solid black">Наименование</th>
    </tr>
    </thead>
    <tbody>
    @foreach($cultures as $culture)
        <tr>
            <td style="border: 1px solid black">{{ ++$i }}</td>
            <td style="border: 1px solid black">{{ $culture->title }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
