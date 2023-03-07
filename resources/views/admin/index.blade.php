<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 bg-gray">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                <h4>Nuove Lead</h4>
                    @if($posts->count() >0)
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead-inverse">
                                <tr>
                                    <th>N°</th>
                                    <th>Nome</th>
                                    <th>Cognome</th>
                                    <th>Dettaglio</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($posts as $post)
                                    <tr>

                                        <td >{{$post->name}}</td>
                                        <td >{{$post->surname}}</td>
                                        <td >{{$post->province->name}}</td>
                                        <td >{{$post->city->name}}</td>
                                        {{--<td><a href="{{route('account.user',['user'=>$user])}}" class="btn btn-sm btn-fill-4">Visualizza</a></td>--}}
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        Non hai ricevuto lead
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
