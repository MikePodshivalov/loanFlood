@extends('layouts.backend')
@section('content')
    <div class="content content-full content-boxed mt-6">
        <h3>Выдача/удаление ролей/разрешений верифицированным пользователям: </h3>

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
            <select class="form-select" id="role" name="permissions" style="width: 350px; display: inline-block">
                <option selected="">Выбрать разрешение</option>
                @foreach($roles as $role)
                    <option value="{{ $role->name }}">{{ $role->name }}</option>
                @endforeach
            </select>
            <button type="submit" class="btn btn-primary mt-3">Выдать</button>
        </form>

        <form action="{{ route('roles.store') }}" method="post" class="mt-2 form-control" style="width: 1100px;">
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
            <select class="form-select" id="role" name="permissions" style="width: 350px; display: inline-block">
                <option selected="">Выбрать разрешение</option>
                @foreach($roles as $role)
                    <option value="{{ $role->name }}">{{ $role->name }}</option>
                @endforeach
            </select>
            <button type="submit" class="btn btn-danger mt-3">Удалить</button>
        </form>

      <div id="DataTables_Table_3_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer"><div class="row"><div class="col-sm-12">
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
            <pre>
{{--               {{print_r($userRoles)}}--}}
{{--                {{dd(1)}}--}}
            </pre>

                @for($i = 0; $i < count($userRoles); $i++)
                    <tr class="odd">
                      <td class="text-center">{{$userRoles[$i]->name}}</td>
                      <td class="text-center">
                          @if(isset($userRoles[$i]['roles']))
                              @foreach($userRoles[$i]['roles'] as $role)
                                  <span class="badge bg-primary">{{$role->name}}</span>
                              @endforeach
                          @endif
                      </td>
                      <td class="text-center">

                      </td>
                    </tr>
                @endfor
            </tbody>
        </table>
              </div>
          </div>
      </div>
    </div>
{{--                <p class="mb-0">{{dd($userRole->roles)}}</p>--}}
{{--                <p class="mb-0">{{dd($userRole->name)}}</p>--}}



@endsection
