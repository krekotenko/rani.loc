<!-- Page header -->
<div class="page-header page-header-light">
    <div class="page-header-content header-elements-md-inline">
        <div class="page-title d-flex">
            <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">{{$title}}</span></h4>
            <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
        </div>
    </div>
</div>
<!-- /page header -->

<!-- Content area -->
<div class="content">
    <!-- Hover rows -->
    <div class="card">
        <div class="table-responsive">
            @if($applications)
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>{{ __('admin.ultimate_th1') }}</th>
                        <th>{{ __('admin.ultimate_th2') }}</th>
                        <th>{{ __('admin.ultimate_th3') }}</th>
                        <th>{{ __('admin.ultimate_th4') }}</th>
                        <th>{{ __('admin.ultimate_th5') }}</th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach($applications as $application)
                        <tr>
                            <td>{{$application->id}}</td>
                            <td>{{$application->name}}</td>
                            <td>{{$application->email}}</td>
                            <td>{{$application->created_at->format('d.m.Y')}}</td>
                            <td>
                                <a data-app-id="{{$application->id}}" href="{{route('ultimate-desicions.destroy',['ultimate_desicion'=>$application->id])}}"
                                   class="btn btn-danger btn-labeled btn-labeled-left btn-lg legitRipple" data-toggle="modal" data-target="#confirm_delete_contacts"><b><i
                                                class="icon-pin-alt"></i></b>{{ __('admin.ultimate_delete_button_label') }}
                                </a>

                            </td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
                {{ $applications->links() }}
                <div style="display:none">
                    <form method="post" id="contact-applications-delete" action="">
                        @csrf
                        @method('DELETE')
                    </form>
                </div>
            @endif
        </div>
    </div>
    <!-- /hover rows -->

</div>
<!-- /content area -->
