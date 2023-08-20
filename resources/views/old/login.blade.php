@if ($errors->any())
    <ul>
        @foreach($errors->all() as $error)
            <li>{{$error}}</li>
        @endforeach
    </ul>
@endif

<form action="{{ route('authenticate') }}" method="post">
    @csrf
    <input type="email" name="email" placeholder="Email">
    <input type="password" name="password"
           placeholder="Password">
    <button type="submit">Login</button>
</form>
