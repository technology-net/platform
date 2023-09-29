<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Bootstrap CSS/JS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
            integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.js"
            integrity="sha512-lbwH47l/tPXJYG9AcFNoJaTMhGvYWhVM9YI43CT+uteTRRaiLCui8snIgyAN8XWgNjNhCqlAUdzZptso6OCoFQ=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.css"
          integrity="sha512-6S2HWzVFxruDlZxI3sXOZZ4/eJ8AcxkQH1+JjSe/ONCEqR9L4Ysq5JdT5ipqtzU7WHalNwzwBv+iE51gNHJNqQ=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
          integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <title>Document</title>
</head>
<body>
<div class="container mt-5">
    <form method="POST" action="{{ route('users.update', ['user' => $user]) }}" id="updateFormUser">
        @csrf
        @method('PUT')
        <div class="container row">
            <div class="col-12">
                <div class="main-form">
                    <div class="form-body">
                        <div class="row">
                            <div class="form-group mb-3 col-md-6">
                                <label for="username" class="control-label required" aria-required="true">Username
                                    <strong class="text-required text-danger">*</strong>
                                </label>
                                <input class="form-control" autocomplete="off" label="Username" validate="true"
                                       validate-pattern="required" name="username" type="text" value="{{ $user->username }}" id="username">
                                <div id="error_username"></div>
                            </div>
                            <div class="form-group mb-3 col-md-6">
                                <label for="email" class="control-label required" aria-required="true">Email
                                    <strong class="text-required text-danger">*</strong>
                                </label>
                                <input class="form-control" autocomplete="off" value="{{ $user->email }}" label="Email" validate="true"
                                       validate-pattern="required|email" placeholder="Ex: example@gmail.com"
                                       name="email" type="text" id="email">
                                <div id="error_email"></div>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-12 d-flex justify-content-center">
                    <button type="submit" name="submit" value="submit" class="btn btn-success">
                        <i class="fa fa-check-circle"></i> Update
                    </button>
                </div>
            </div>
        </div>
    </form>
</div>
<script type="text/javascript" src="{{ asset('iboot/platform/js/validate.js') }}" defer></script>
<script type="text/javascript" src="{{ asset('iboot/platform/js/user.js') }}" defer></script>
<script>
    let route_index = '{{ route('users.index') }}'
    let validateMessage = {!! json_encode(trans('packages/platform::validation')) !!}
</script>
</body>
</html>
