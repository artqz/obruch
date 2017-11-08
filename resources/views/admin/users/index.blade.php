список всех пользователей
<a href="users/create">add user</a>
@foreach ($users as $user)
    <p>This is user {{ $user->name }}</p>
@endforeach