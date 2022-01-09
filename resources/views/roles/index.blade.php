@extends('layouts.backend')
@section('content')
    <div class="content content-full content-boxed mt-6">
        <h3>Выдача ролей/разрешений пользователям: </h3>

        <form action="{{ route('roles.store') }}" method="post" class="form-control" style="width: 1100px;">
            @csrf
            <select class="form-select" id="user" name="user" style="width: 350px; display: inline-block">
                <option selected="">Выбрать пользователя</option>
                @foreach($users as $user)
                    <option value="{{ $user->name }}">{{ $user->name }}</option>
                @endforeach
            </select>
            <select class="form-select" id="role" name="role" style="width: 350px; display: inline-block">
                <option selected="">Выбрать роль</option>
                @foreach($roles as $role)
                    <option value="{{ $role->name }}">{{ $role->name }}</option>
                @endforeach
            </select>
            <select class="form-select" id="permissions" name="permissions" style="width: 350px; display: inline-block">
                <option selected="">Выбрать разрешение</option>
                @foreach($permissions as $permission)
                    <option value="{{ $permission->name }}">{{ $permission->name }}</option>
                @endforeach
            </select>
            <button type="submit" class="btn btn-primary mt-3">Выдать</button>
        </form>

        <h3 class="mt-3">Удаление ролей/разрешений пользователей: </h3>
        <form action="{{ route('roles.destroy') }}" method="post" class="mt-2 form-control" style="width: 1100px;">
            @csrf
            <select class="form-select" id="user" name="user" style="width: 350px; display: inline-block">
                <option selected="">Выбрать пользователя</option>
                @foreach($users as $user)
                    <option value="{{ $user->name }}">{{ $user->name }}</option>
                @endforeach
            </select>
            <select class="form-select" id="role" name="role" style="width: 350px; display: inline-block">
                <option selected="">Выбрать роль</option>
                @foreach($roles as $role)
                    <option value="{{ $role->name }}">{{ $role->name }}</option>
                @endforeach
            </select>
            <select class="form-select" id="permissions" name="permissions" style="width: 350px; display: inline-block">
                <option selected="">Выбрать разрешение</option>
                @foreach($permissions as $permission)
                    <option value="{{ $permission->name }}">{{ $permission->name }}</option>
                @endforeach
            </select>
            <button type="submit" class="btn btn-danger mt-3">Удалить</button>
        </form>
      <div id="DataTables_Table_3_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer mt-2"><div class="row"><div class="col-sm-12">
        <table class="table table-bordered table-striped table-vcenter js-dataTable-simple dataTable no-footer" id="DataTables_Table_3" >
            <thead>
              <tr>
                  <th class="text-center" style="width: 100px;" tabindex="0" aria-controls="DataTables_Table_3" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending">
                      Пользователь
                  </th>
                  <th class="text-center" style="width: 50px;">
                      Роль
                  </th>
                  <th class="text-center" style="width: 50px;">
                      Разрешения
                  </th>
              </tr>
            </thead>
            <tbody>
                @for($i = 0; $i < count($userRolesPermissions); $i++)
                    <tr class="odd">
                        <td class="text-center">{{$userRolesPermissions[$i]->name}}</td>
                        <td class="text-center">
                            @if(isset($userRolesPermissions[$i]->roles))
                                @foreach($userRolesPermissions[$i]->roles as $role)
                                    <span class="badge bg-primary">{{$role->name}}</span>
                                @endforeach
                            @endif
                        </td>
                        <td class="text-center">
                            @if(isset($userRolesPermissions[$i]->permissions))
                                @foreach($userRolesPermissions[$i]->permissions as $permission)
                                    <span class="badge bg-success">{{$permission->name}}</span>
                                @endforeach
                            @endif
                        </td>
                    </tr>
                @endfor
            </tbody>
        </table>
              </div>
          </div>
      </div>
    </div>
@endsection
