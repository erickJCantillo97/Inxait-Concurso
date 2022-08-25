<table>
    <thead>
    <tr>
        <th>Name</th>
        <th>apellidos</th>
        <th>Email</th>
        <th>Celular</th>
        <th>Cedula</th>
        <th>Departamento</th>
        <th>Ciudad</th>
       
    </tr>
    </thead>
    <tbody>
    @foreach($users as $user)
        <tr>
            <td>{{ $user->name }}</td>
            <td>{{ $user->apellidos }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->cedula }}</td>
            <td>{{ $user->celular }}</td>
            <td>{{ $user->ciudad->departamento->name }}</td>
            <td>{{ $user->ciudad->name }}</td>
        </tr>
    @endforeach
    </tbody>
</table>