@extends('components.main')
@section('content')
<div class="account-maintenance">
    <table class="table align-middle mb-0 bg-white">
        <thead class="bg-light">
          <tr>
            <th>Name</th>
            <th>Role</th>
            <th colspan="2">Actions</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)


          <tr>
            <td>
              <div class="d-flex align-items-center">
                <img
                    src="{{asset('/storage/images/' .$user->display_picture_link)}}"
                    alt=""
                    style="width: 45px; height: 45px"
                    class="rounded-circle"
                    />
                <div class="ms-3">
                  <p class="fw-bold mb-1">{{$user->first_name ." " .$user->last_name}}</p>
                  <p class="text-muted mb-0">{{$user->email}}</p>
                </div>
              </div>
            </td>
            <td>{{$user->getRole->name}}</td>
            <td>
              <button type="button" id="update-role" class="btn btn-link btn-sm btn-rounded" data-id="{{$user->id}}" data-role="{{$user->role_id}}">
                <i class="fa-solid fa-pen-to-square" ></i>
              </button>
            </td>
            <td>
               <form action="{{route('delete-account')}}" method="POST">
                @method('delete')
                @csrf
                <input type="hidden" name="id" value="{{$user->id}}">
                <button  class="btn btn-link btn-sm btn-rounded">
                    <i class="fa-solid fa-trash"></i>
                </button>
            </form>
              </td>

          </tr>
          @endforeach
        </tbody>
      </table>
</div>
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Update Role</h5>
          <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="{{route('update-role')}}" method="POST">
                @csrf
                <input type="hidden" name="id" id="id">
                <div class="form-floating">
                    <select class="form-select" id="role" name="role" aria-label="Floating label select example">
                      <option value="1">Admin</option>
                      <option value="2">User</option>
                    </select>
                    <label for="floatingSelect">Role</label>
                  </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">Close</button>
          <button class="btn btn-primary">Save changes</button>
        </div>
    </form>
      </div>
    </div>
  </div>
@endsection
