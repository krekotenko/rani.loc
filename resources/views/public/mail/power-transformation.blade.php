<div>
    <table>
        @foreach($contact->toArray() as $k=>$v)
            <tr>
                <td>{{ $k }} </td>
                <td>{{ $v }}</td>
            </tr>
        @endforeach

    </table>
</div>

