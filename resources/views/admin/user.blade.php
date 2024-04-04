@extends('layouts.admin')
<style>
    .userData h1 {
        margin-bottom: 1rem;
    }
    .del{
        display: flex;
        justify-content: center;
    }
    .del a{
        color: #ffffff;
        padding: 2px 10px;
        background-color: #ae1c1c;
        border-radius: 10px;
    }
</style>
@section('content')
    <main>
        <div class="cont">
            <div class="userData">
                <h1>User list</h1>
                <table id="myTable">
                    <thead>
                        <th>ID</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Operator</th>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td><a href="{{route('admin.albums',['id' => $user->id])}}">{{ $user->name }}</a></td>
                                
                                <td>{{ $user->email }}</td>
                                <td>
                                    <div class="del">
                                        <a href="{{ route('admin.destroyuser',['id' => $user->id]) }}">ลบ</a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <script script src="https://code.jquery.com/jquery-3.7.0.js"></script>
        <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
        <script>
            $(Document).ready(function() {
                $('#myTable').DataTable();
            });
        </script>
    </main>
@endsection
