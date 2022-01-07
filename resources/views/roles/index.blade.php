@extends('layouts.backend')
@section('content')
    <div class="content content-full content-boxed mt-9">
        <h3>Раздача ролей верифицированным пользователям: </h3>
        <form action="{{ route('roles.store') }}" method="post" class="form-control" style="width: 750px;">
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
            <button type="submit" class="btn btn-primary mt-3">Отправить</button>
        </form>
      <div id="DataTables_Table_3_wrapper" class=" mt-3 dataTables_wrapper dt-bootstrap5 no-footer"><div class="row"><div class="col-sm-12">
        <table class="table table-bordered table-striped table-vcenter js-dataTable-simple dataTable no-footer" id="DataTables_Table_3" aria-describedby="DataTables_Table_3_info">
            <thead>
              <tr>
                  <th class="text-center" tabindex="0" aria-controls="DataTables_Table_3" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending">
                      Пользователь
                  </th>
                  <th class="text-center" style="width: 12%;" tabindex="0" aria-controls="DataTables_Table_3" rowspan="1" colspan="1" aria-label="Email: activate to sort column ascending">
                      Роль
                  </th>
                  <th class="text-center" style="width: 12%;" tabindex="0" aria-controls="DataTables_Table_3" rowspan="1" colspan="1" aria-label="Access: activate to sort column ascending">
                      Разрешения
                  </th>
              </tr>
            </thead>
            <tbody>
                <tr class="odd">
                  <td class="text-center">Megan Fuller</td>
                  <td class="d-none d-sm-table-cell">
                    client1<em class="text-muted">@example.com</em>
                  </td>
                  <td class="d-none d-sm-table-cell">
                    <span class="badge bg-success">VIP</span>
                  </td>
                  <td>
                    <em class="text-muted">2 days ago</em>
                  </td>
                </tr>
            </tbody>
        </table>
              </div>
          </div>
      </div>
    </div>
{{--                <p class="mb-0">{{dd($userRole->roles)}}</p>--}}
{{--                <p class="mb-0">{{dd($userRole->name)}}</p>--}}



@endsection
