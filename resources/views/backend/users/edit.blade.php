@extends('layouts.admin')
@section('style')
@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex">
        <h6 class="m-0 font-weight-bold text-primary">Edit User</h6>
        <div class="ml-auto">
            <a href="{{ route('admin.users.index') }}" class="text-decoration-none">
                <span class="text">Users Table</span>
                <span class="icon primary">
                    <i class="fa fa-home"></i>
                </span>
            </a>
        </div>
    </div>
    <div class="card-body">
        {!! Form::model($user, ['route'=>['admin.users.update', [$user->id,'id'=>$user->id]], 'method'=>'PUT', 'files'=>true]) !!}
        <div class="row">
            <div class="col-4">
                <div class="form-group">
                    {!! Form::label('name', 'Name') !!}
                    {!! Form::text('name', old('name', $user->name), ['class'=>'form-control']) !!}
                    @error('name')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="col-4">
                <div class="form-group">
                    {!! Form::label('email', 'Email') !!}
                    {!! Form::email('email', old('email', $user->email), ['class'=>'form-control']) !!}
                    @error('email')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="col-4">
                <div class="form-group">
                    {!! Form::label('mobile', 'Mobile') !!}
                    {!! Form::text('mobile', old('mobile', $user->mobile), ['class'=>'form-control']) !!}
                    @error('mobile')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <div class="form-group">
                    {!! Form::label('username', 'Username') !!}
                    {!! Form::text('username', old('username', $user->username), ['class'=>'form-control']) !!}
                    @error('username')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    {!! Form::label('password', 'Password') !!}
                    {!! Form::password('password', ['class'=>'form-control','autocomplete'=>'new-password']) !!}
                    @error('password')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <div class="form-group">
                    {!! Form::label('status', 'Status') !!}
                    {!! Form::select('status', [''=>'Status','1'=>'Active','0'=>'Pending'], old('status', $user->status), ['class'=>'form-control']) !!}
                    @error('status')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    {!! Form::label('receive_email', 'Receive Email') !!}
                    {!! Form::select('receive_email', [''=>'Receive Email','1'=>'Yes','0'=>'No'], old('receive_email', $user->receive_email), ['class'=>'form-control']) !!}
                    @error('receive_email')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="form-group">
                    {!! Form::label('bio', 'Bio') !!}
                    {!! Form::textarea('bio', old('bio', $user->bio), ['class'=>'form-control', 'rows'=>'6']) !!}
                    @error('bio')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        </div>
        <div class="row pb-4">
            {{-- @if ($user->user_image)
                <div class="col-12 text-center">
                    <div id="image-area">
                        <img
                            src="{{ asset("assets/users/{$user->user_image}") }}"
                            width="200"
                            height="200"
                            alt="{{ Str::limit($user->username, 10, '...') }}" />
                        <button class="btn btn-danger remove-image">
                            Remove Image</button>
                    </div>
                </div>
            @endif --}}
            <div class="col-12">
                {!! Form::label('user_image', 'Profile Image') !!}
                <br />
                <div class="file-loading">
                    {!! Form::file('user_image', ['id'=>'edit-user-image', 'class'=>'file-input-overview']) !!}
                    <span class="form-text text-muted">Image width should be 300X300</span>
                    @error('user_image')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        </div>
        <div class="form-group">
            {!! Form::button('Update User', ['type' => 'submit', 'class'=>'btn btn-lg btn-block btn-primary']) !!}
        </div>
        {!! Form::close() !!}
    </div>
</div>
@endsection
@section('script')
    <script>
        $(function () {
            $('.remove-image').click(function () {
                $.post("{{ route('admin.users.media.destroy') }}",
                    {
                        user_id: '{{ $user->id }}',
                        _token : '{{ csrf_token() }}'
                    },
                    function (data, textStatus, jqXHR) {
                        if (data == true) window.location.href = window.location;
                    }
                );
            });

            $('#edit-user-image').fileinput({
                theme           : 'fas',
                maxFileCount    : 1,
                allowedFileTypes: ['image'],
                showCancel      : true,
                showRemove      : false,
                showUpload      : false,
                overwriteInitial: false,
            });
        });
    </script>
@endsection
