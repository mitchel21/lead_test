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
                <h4 class="fw-bold">Elenco richieste</h4>
                    @if($posts->count() >0)
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead-inverse">
                                <tr>
                                    <th>N°</th>
                                    <th>Nome</th>
                                    <th>Cognome</th>
                                    <th class="text-end">Visualizza dettaglio</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($posts as $post)
                                    <tr>
                                        <td class="align-middle">{{ $loop->iteration }}</td>
                                        <td class="align-middle">{{$post->name}}</td>
                                        <td class="align-middle">{{$post->surname}}</td>
                                        {{--<td >{{$post->province->name}}</td>
                                        <td >{{$post->city->name}}</td>--}}
                                        <td class="text-end">
                                            <a href="{{route('viewLead',['post'=>$post])}}" class="btn btn-primary">Visualizza dettaglio</a>
                                        </td>
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
