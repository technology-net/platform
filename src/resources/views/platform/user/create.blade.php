@extends('packages/core::layouts.admin')
@section('css')
    <link href="{{ mix('platform/css/user.css') }}" rel="stylesheet" />
@endsection
@section('content')
<div class="container-fluid mt-3">
    <div class="container-fluid mx-1 mb-4 bg-white">
        <div class="container-fluid btn-group flex-wrap text-black border border-white justify-content-center">
            <span class="title-create-user mt-2 mb-2">{{ trans('packages/platform::user.create_title') }}</span>
        </div>
    </div>
    <div class="form-create-user">
        <form method="POST" action="{{ route('users.store') }}" id="submitFormUser">
            @csrf
            <div class="row container-fluid border border-white bg-white mx-1">
                <div class="col-12 container-fluid mt-5 mb-4">
                    <div class="main-form container">
                        <div class="form-body">
                            <div class="row">
                                <div class="form-group mb-3 col-md-6">
                                    <label for="username" class="control-label required text-black" aria-required="true">Username
                                        <strong class="text-required text-danger">*</strong>
                                    </label>
                                    <input class="form-control" autocomplete="off" label="Username" validate="true"
                                           validate-pattern="required" name="username" type="text" value="" id="username">
                                    <div id="error_username"></div>
                                </div>
                                <div class="form-group mb-3 col-md-6">
                                    <label for="email" class="control-label required text-black" aria-required="true">Email
                                        <strong class="text-required text-danger">*</strong>
                                    </label>
                                    <input class="form-control" autocomplete="off" label="Email" validate="true"
                                        validate-pattern="required|email" placeholder="Ex: example@gmail.com"
                                        name="email" type="text" id="email">
                                    <div id="error_email"></div>
                                </div>
                                <div class="form-group mb-3 col-md-6">
                                    <label for="name" class="control-label required text-black mt-2" aria-required="true">Name
                                        <strong class="text-required text-danger">*</strong>
                                    </label>
                                    <input class="form-control" autocomplete="off" label="Name" validate="true"
                                        validate-pattern="required" name="name" type="text" id="name">
                                    <div id="error_name"></div>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
                <div class="row mt-3 container-fluid mb-4">
                    <div class="col-12 d-flex justify-content-center">
                        <button type="submit" name="submit" value="submit" class="btn btn-success">
                        <span>
                        <span data-action="create" data-href="">
                            <svg xmlns="http://www.w3.org/2000/svg" height="28px" width="20px"
                                viewBox="0 0 24 24"><title>account-plus-outline</title>
                                <path
                                    fill="#ffffff"
                                    d="M15,4A4,4 0 0,0 11,8A4,4 0 0,0 15,12A4,4 0 0,0 19,8A4,4 0 0,0 15,4M15,
                                    5.9C16.16,5.9 17.1,6.84 17.1,8C17.1,9.16 16.16,10.1 15,10.1A2.1,2.1 0 0,1 12.9,
                                    8A2.1,2.1 0 0,1 15,5.9M4,7V10H1V12H4V15H6V12H9V10H6V7H4M15,13C12.33,13 7,14.33 7,
                                    17V20H23V17C23,14.33 17.67,13 15,13M15,14.9C17.97,14.9 21.1,16.36 21.1,
                                    17V18.1H8.9V17C8.9,16.36 12,14.9 15,14.9Z"/>
                            </svg>
                            {{ trans('packages/core::common.create') }}
                        </span>
                    </span>
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
@section('js')
    <script type="text/javascript">
        let route_index = "{!! route('users.index') !!}"
    </script>
    <script type="text/javascript" src="{{ mix('platform/js/user.js') }}" defer></script>
@endsection
