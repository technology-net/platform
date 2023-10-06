@extends('packages/core::layouts.admin')
@section('css')
    <link href="{{ mix('platform/css/user.css') }}" rel="stylesheet" />
@endsection
@section('content')
<div class="table-wrapper mx-3 my-3" id="user-table">
    @include('packages/platform::platform.user.user_table')
</div>
@endsection
@section('js')
    <script type="text/javascript">
        let route_index = "{!! route('users.index') !!}"
        let config_limit = "{{ config('platform.user.pagination') }}";
    </script>
    <script type="text/javascript" src="{{ mix('platform/js/user.js') }}" defer></script>
@endsection
