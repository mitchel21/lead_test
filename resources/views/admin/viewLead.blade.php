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
                            <div class="row">
                                <div class="col-sm-4 col-md-3 col-xl-2">Nome:</div>
                                <div class="col-sm-8 col-md-9 col-xl-10">
                                        <strong class="fw-bold">{{$post->name}}</strong>
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="row">
                                <div class="col-sm-4 col-md-3 col-xl-2">Cognome:</div>
                                <div class="col-sm-8 col-md-9 col-xl-10">
                                    <strong class="fw-bold">{{$post->surname}}</strong>
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="row">
                                <div class="col-sm-4 col-md-3 col-xl-2">Data di compleanno:</div>
                                <div class="col-sm-8 col-md-9 col-xl-10">
                                    <strong class="fw-bold">{{ \Carbon\Carbon::parse($post->date_of_birth)->format('d/m/Y') }}</strong>
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="row">
                                <div class="col-sm-4 col-md-3 col-xl-2">Provincia:</div>
                                <div class="col-sm-8 col-md-9 col-xl-10">
                                    <strong class="fw-bold">{{$post->province->name}}</strong>
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="row">
                                <div class="col-sm-4 col-md-3 col-xl-2">Comune:</div>
                                <div class="col-sm-8 col-md-9 col-xl-10">
                                    <strong class="fw-bold">{{$post->city->name}}</strong>
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="row">
                                <div class="col-sm-4 col-md-3 col-xl-2">Richiesta:</div>
                                <div class="col-sm-8 col-md-9 col-xl-10">
                                    {{--Stampa break line--}}
                                    <strong class="fw-bold">{!! nl2br(e($post->request)) !!}</strong>
                                </div>
                            </div>
                        <li>
                    </ul>
                    <a class="btn btn-primary" href="{{route('admin.index')}}">Torna all'elenco delle lead </a>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
