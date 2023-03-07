<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-bold text-xl text-gray-800 leading-tight">
            {{ __('Visualizza dettagli') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 bg-gray">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <ul class="list-group pb-4">
                        <li class="list-group-item">
                            <strong class="fw-bold">Nome: {{$post->name}}</strong>
                        </li>
                        <li class="list-group-item">
                            <strong class="fw-bold">Nome: {{$post->surname}}</strong>
                        </li>
                        <li class="list-group-item">
                            <strong class="fw-bold">Data di compleanno: {{ \Carbon\Carbon::parse($post->date_of_birth)->format('d/m/Y') }}</strong>
                        </li>
                        <li class="list-group-item">
                            <strong class="fw-bold">Provincia: {{$post->province->name}}</strong></li>
                        <li class="list-group-item">
                            <strong class="fw-bold">Comune: {{$post->city->name}}</strong></li>
                    </ul>
                    <a class="btn btn-primary" href="{{route('admin.index')}}">Torna all'elenco delle lead </a>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
