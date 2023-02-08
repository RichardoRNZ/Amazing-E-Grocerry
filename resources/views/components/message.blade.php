@if ($message = Session::get('success'))
    <script>
        alert('{{ $message }}');
    </script>
@endif
@error('email')
    <div class="alert alert-danger alert-dismissible fade show">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>{{ $message }}</strong>
    </div>
@enderror
@error('first_name')
    <div class="alert alert-danger alert-dismissible fade show">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>{{ $message }}</strong>
    </div>
@enderror
@error('last_name')
    <div class="alert alert-danger alert-dismissible fade show">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>{{ $message }}</strong>
    </div>
@enderror
@error('gender')
    <div class="alert alert-danger alert-dismissible fade show">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>{{ $message }}</strong>
    </div>
@enderror
@error('role')
    <div class="alert alert-danger alert-dismissible fade show">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>{{ $message }}</strong>
    </div>
@enderror
@error('image')
    <div class="alert alert-danger alert-dismissible fade show">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>{{ $message }}</strong>
    </div>
@enderror

