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
            @if($results)
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>{{ __('admin.power_transformation_th1') }}</th>
                        <th>{{ __('admin.power_transformation_th2') }}</th>
                        <th>{{ __('admin.power_transformation_th3') }}</th>
                        <th>{{ __('admin.power_transformation_th4') }}</th>
                        <th>{{ __('admin.power_transformation_th5') }}</th>
                        <th>{{ __('admin.power_transformation_th6') }}</th>
                        <th>{{ __('admin.power_transformation_th7') }}</th>
                        <th>{{ __('admin.power_transformation_th8') }}</th>
                        <th>{{ __('admin.power_transformation_th9') }}</th>
                        <th>{{ __('admin.power_transformation_th10') }}</th>
                        <th>{{ __('admin.power_transformation_th11') }}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($results as $result)
                        <tr>
                            <td>{{$result->id}}</td>
                            <td>{{$result->name}}</td>
                            <td>{{$result->email}}</td>
                            <td>{{$result->phone}}</td>
                            <td>{{$result->company}}</td>
                            <td>{{$result->theme}}</td>
                            <td>{{$result->number_of_people}}</td>
                            <td>{{$result->location}}</td>
                            <td>{{$result->tell_me}}</td>
                            <td>{{$result->date}}</td>
                            <td>
                                <a data-app-id="{{$result->id}}" href="{{route('power-transformation.destroy',['contact_application}'=>$result->id])}}"
                                   class="btn btn-danger btn-labeled btn-labeled-left btn-lg legitRipple" data-toggle="modal"data-target="#confirm_delete_contacts"><b><i
                                                class="icon-pin-alt"></i></b>{{ __('admin.contact-applications_delete_button_label') }}
                                </a>
                            </td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
                {{ $results->links() }}
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
