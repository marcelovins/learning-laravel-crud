<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dados dos Clientes') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <table class="table container">
                        <thead class="table-dark">
                            <tr>
                                <th scope="col"></th>
                                <th scope="col">Nome</th>
                                <th scope="col">Email</th>
                                <th scope="col">Actions</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody >
                            @foreach($users as $user)
                                <tr>
                                    <th scope="row"><img src="{{ asset('images/avatar.png') }}" width="50px" height="50px" class="rounded-circle"></th>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>
                                        <form action="{{ route('user.destroy', $user->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-warning">Delete</button>
                                        </form>    
                                    </td>
                                    <td>
                                        <a href="user/edit/{{ $user->id }}" class="btn btn-dark" method="POST">Edit</a>  
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="justify-content-center pagination">
                        {{ $users->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>