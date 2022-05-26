
@extends('layouts.app')

@section('navegacion')

    @include('ui.adminnav')
@endsection

@section('content')

    <h1 class="text-2xl text-center mt-10">Notificaciones</h1>


    @if( count($notificaciones) > 0)

        <ul class="text-2xl text-center mt-10">

            @foreach ($notificaciones as $notificacion )

                @php
                    $data = $notificacion->data
                @endphp

                {{-- {{ $data['vacante'] }} --}}

                <li class="p-5 border-2 border-gray-400 mb-5">

                    <p class="mb-4">
                        Tienes un nuevo candidato en:
                        <span class="font-bold">{{ $data['vacante'] }}</span>
                    </p>

                    <p class="mb-4">
                        Te escribió:
                        <span class="font-bold">{{ $notificacion->created_at->diffForHumans() }}</span>
                    </p>

                    <a
                        class="bg-teal-500 p-3 inline-block text-xs font-bold uppercase text-white"
                        href="{{ route('candidatos.index', ['id' => $data['id_vacante']]) }}" class="mb-4">
                        Ver Candidatos
                    </a>

                </li>
            @endforeach

        </ul>
    @else
        <p class="text-center mt-5"> No hay Notificaciones</p>

    @endif

@endsection
