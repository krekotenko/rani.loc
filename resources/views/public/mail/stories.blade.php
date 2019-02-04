<div>
    <table>
        @foreach($story->toArray() as $k=>$v)
            <tr>
                <td>{{ $k }} </td>
                <td>{{ $v }}</td>
            </tr>
        @endforeach

    </table>
</div>