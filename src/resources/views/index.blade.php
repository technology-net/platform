<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
          integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
          integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
          crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.js"
            integrity="sha512-lbwH47l/tPXJYG9AcFNoJaTMhGvYWhVM9YI43CT+uteTRRaiLCui8snIgyAN8XWgNjNhCqlAUdzZptso6OCoFQ=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.css"
          integrity="sha512-6S2HWzVFxruDlZxI3sXOZZ4/eJ8AcxkQH1+JjSe/ONCEqR9L4Ysq5JdT5ipqtzU7WHalNwzwBv+iE51gNHJNqQ=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <link rel="stylesheet" href="{{ asset('iboot/platform/css/user.css') }}">
    <title>Document</title>
</head>
<body>
<div class="container mt-5">
    <div class="table-wrapper">
        <div class="table-configuration-wrap">
            <div class="portlet-body">
                <div class="table-responsive table-has-actions table-has-filter ">
                    <div id="" class="form-inline dt-bootstrap no-footer">
                        <div class="dt-buttons btn-group flex-wrap float-end">
                            <a href="{{ route('users.create') }}">
                                <button class="btn btn-success bg-success action-item btn-primary rounded" tabindex="0"
                                        aria-controls="botble-a-c-l-tables-user-table" type="button">
                                    <span>
                                        <span data-action="create" data-href="">
                                            <i class="fa fa-plus"></i> Create
                                        </span>
                                    </span>
                                </button>
                            </a>
                        </div>
                    </div>
                    <table class="table table-striped table-hover vertical-middle"
                           id="" role="grid" aria-describedby="">
                        <thead>
                        <tr role="row">
                            <th class="text-start no-column-visibility sorting_disabled" rowspan="1"
                                colspan="1" style="width: 20px;" aria-label="">
                                <label>
                                    <input class="table-check-all" data-set=".dataTable .checkboxes" name=""
                                           type="checkbox">
                                </label>
                            </th>
                            <th title="Username" class="text-start column-key-0 sorting_desc" tabindex="0"
                                aria-controls="botble-a-c-l-tables-user-table" rowspan="1" colspan="1"
                                aria-sort="descending" aria-label="">Username
                            </th>
                            <th title="Email" class="text-start" tabindex="0"
                                aria-controls="" rowspan="1" colspan="1" aria-label="">Email
                            </th>
                            <th title="Created At" class="text-start" tabindex="0"
                                aria-controls="" rowspan="1" colspan="1"
                                aria-label="">Created At
                            </th>
                            <th title="Status" class="" rowspan="1"
                                colspan="1" aria-label="Status">Status
                            </th>
                            <th title="Operations" class="text-end sorting_disabled" rowspan="1"
                                colspan="1" aria-label="Operations">Operations
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                            <tr role="row" class="odd">
                                <td class="text-start no-column-visibility dtr-control pt-3">
                                    <div class="text-start">
                                        <div class="checkbox checkbox-primary table-checkbox">
                                            <label>
                                                <input class="checkboxes" name="id[]" type="checkbox"
                                                       value="{{ $user->id }}">
                                            </label>
                                        </div>
                                    </div>
                                </td>
                                <td class="text-start pt-3">
                                    <a href="">{{ $user->username }}</a>
                                </td>
                                <td class="text-start  column-key-1 pt-3">{{ $user->email }}</td>
                                <td class="column-key-3 pt-3">{{ $user->created_at }}</td>
                                <td class="column-key-4 pt-3">
                                    <span class="label-info status-label">{{ $user->status }}
                                    </span>
                                </td>
                                <td class="text-end">
                                    <a class="btn btn-icon btn-secondary btn-view-user" data-bs-toggle="tooltip"
                                       data-bs-original-title="View user's profile"
                                       href="{{ route('users.edit', ['user' => $user->id]) }}">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                    <a class="btn btn-icon btn-danger btn-delete-user" data-bs-toggle="tooltip"
                                       data-section=""
                                       data-bs-original-title="Delete" data-url="{{ route('users.destroy', ['user' => $user->id]) }}" role="button">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div class="d-flex justify-content-center">
                        {!! $users->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="{{ asset('iboot/platform/js/user.js') }}" defer></script>
</body>
</html>
