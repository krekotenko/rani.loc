<div>
    <table>
        @foreach($free_application->toArray() as $k=>$v)
            <tr>
                <td><strong>{{ __('free_session_application.'.$k) }}</strong></td>
                <td>
                    @if($k == 'signature' && $v != "")
                        <img src="{{storage_path('app/public/files/signaturs/').$v}}">
                    @else

                        {{ $v }}

                    @endif

                </td>
            </tr>
        @endforeach

    </table>
</div>

