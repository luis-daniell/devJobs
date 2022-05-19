@extends('layouts.app')


@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/medium-editor/5.23.3/css/medium-editor.min.css" integrity="sha512-zYqhQjtcNMt8/h4RJallhYRev/et7+k/HDyry20li5fWSJYSExP9O07Ung28MUuXDneIFg0f2/U3HJZWsTNAiw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/dropzone.min.css" integrity="sha512-jU/7UFiaW5UBGODEopEqnbIAHOI8fO6T99m7Tsmqs2gkdujByJfkCbbfPSN4Wlqlb9TGnsuC0YgUgWkRBK7B9A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection


@section('navegacion')
    @include('ui.adminnav')
@endsection

@section('content')

    <h1 class="text-2xl text-center mt-10">Nueva Vacante</h1>

    <form class="max-w-lg mx-auto my-10">

        <div class="mb-5">
            <label
                for="titulo"
                class="block text-gray-700 text-sm mb-2">Titulo Vacante: </label>
            <input
                id="titulo"
                type="text"
                class="p-3 bg-white-100 rounded form-input w-full @error('email') is-invalid @enderror"
                name="titulo" >
        </div>

        <div class="mb-5">
            <label
                for="categoria"
                class="block text-gray-700 text-sm mb-2">Categoria:
            </label>

            <select
                id="categoria"
                class="block appearance-none w-full border
                border-gray-200 text-gray-700 rounded leading-tight
                focus:outline-none focus:bg-white focus:border-gray-500
                p-3 bg-gray-100"
                name="categoria"
            >

                <option disabled selected> --- Seleccione --- </option>

                @foreach ($categorias as $categoria)
                    <option value="{{ $categoria->id }}">
                        {{ $categoria->nombre }}
                    </option>
                @endforeach

            </select>
        </div>



        <div class="mb-5">
            <label
                for="experiencia"
                class="block text-gray-700 text-sm mb-2">Experiencia:
            </label>

            <select
                id="experiencia"
                class="block appearance-none w-full border
                border-gray-200 text-gray-700 rounded leading-tight
                focus:outline-none focus:bg-white focus:border-gray-500
                p-3 bg-gray-100"
                name="experiencia"
            >

                <option disabled selected> --- Seleccione --- </option>

                @foreach ($experiencias as $experiencia)
                    <option value="{{ $experiencia->id }}">
                        {{ $experiencia->nombre }}
                    </option>
                @endforeach

            </select>
        </div>




        <div class="mb-5">
            <label
                for="ubicacion"
                class="block text-gray-700 text-sm mb-2">Ubicación:
            </label>

            <select
                id="ubicacion"
                class="block appearance-none w-full border
                border-gray-200 text-gray-700 rounded leading-tight
                focus:outline-none focus:bg-white focus:border-gray-500
                p-3 bg-gray-100"
                name="ubicacion"
            >

                <option disabled selected> --- Seleccione --- </option>

                @foreach ($ubicaciones as $ubicacion)
                    <option value="{{ $ubicacion->id }}">
                        {{ $ubicacion->nombre }}
                    </option>
                @endforeach

            </select>
        </div>



        <div class="mb-5">
            <label
                for="salario"
                class="block text-gray-700 text-sm mb-2">Salario:
            </label>

            <select
                id="salario"
                class="block appearance-none w-full border
                border-gray-200 text-gray-700 rounded leading-tight
                focus:outline-none focus:bg-white focus:border-gray-500
                p-3 bg-gray-100"
                name="salario"
            >

                <option disabled selected> --- Seleccione --- </option>

                @foreach ($salarios as $salario)
                    <option value="{{ $salario->id }}">
                        {{ $salario->nombre }}
                    </option>
                @endforeach

            </select>
        </div>




        <div class="mb-5">
            <label
                for="descripcion"
                class="block text-gray-700 text-sm mb-2">Descripcion del puesto:
            </label>
            <div class="editable p-3 bg-gray-100 form-input text-gray-700 "></div>
            <input type="hidden" name="descripcion" id="descripcion">
        </div>





        <div class="mb-5">
            <label
                for="descripcion"
                class="block text-gray-700 text-sm mb-2">Imagen Vacante:
            </label>
            <div id="dropzoneDevJobs" class="dropzone rounded bg-gray-100"></div>

            <input type="hidden" name="imagen" id="imagen">

            <p id="error"></p>

        </div>




        <div class="mb-5">
            <label
                for="skills"
                class="block text-gray-700 text-sm mb-2">Habilidades y Conocimientos:
            </label>

            @php
                $skills = ['HTML5', 'CSS3', 'CSSGrid', 'Flexbox', 'JavaScript', 'jQuery', 'Node', 'Angular', 'VueJS', 'ReactJS', 'React Hooks', 'Redux', 'Apollo', 'GraphQL', 'TypeScript', 'PHP', 'Laravel', 'Symfony', 'Python', 'Django', 'ORM', 'Sequelize', 'Mongoose', 'SQL', 'MVC', 'SASS', 'WordPress', 'Express', 'Deno', 'React Native', 'Flutter', 'MobX', 'C#', 'Ruby on Rails']
            @endphp

            <lista-skills
                :skills="{{ json_encode($skills) }}"
            ></lista-skills>
        </div>



        <button
            type="submit"
            class="bg-teal-500 w-full hover:bg-teal-600 text-gray-100 font-bold p-3 focus:outline focus:shadow-outline uppercase"
        >Publicar Vacante</button>
    </form>

@endsection


@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/medium-editor/5.23.3/js/medium-editor.min.js" integrity="sha512-5D/0tAVbq1D3ZAzbxOnvpLt7Jl/n8m/YGASscHTNYsBvTcJnrYNiDIJm6We0RPJCpFJWowOPNz9ZJx7Ei+yFiA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/dropzone.min.js" integrity="sha512-U2WE1ktpMTuRBPoCFDzomoIorbOyUv0sP8B+INA3EzNAhehbzED1rOJg6bCqPf/Tuposxb5ja/MAUnC8THSbLQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script>

        Dropzone.autoDiscover = false;


        document.addEventListener('DOMContentLoaded', () => {


            //Medium Editor
            const editor = new MediumEditor('.editable', {
                toolbar : {
                    buttons: ['bold', 'italic', 'underline', 'quote', 'anchor', 'justifyLeft', 'justifyCenter', 'justifyRight', 'justifyFull', 'orderedList', 'unorderedList', 'h2', 'h3'],
                    static: true,
                    sticky: true
                },
                placeholder:{
                    text: 'Información de la vacante'
                }
            });


            editor.subscribe('editableInput', function(eventObj, editable){
                const contenido = editor.getContent();
                document.querySelector('#descripcion').value = contenido ;
            })



            //Dropzone
            const dropzoneDevJobs = new Dropzone('#dropzoneDevJobs', {
                url: "/vacantes/imagen",
                dictDefaultMessage: 'Sube aqui tu archivo',
                acceptedFiles: ".png,.jpg,.jpeg,.git,.bmp",
                addRemoveLinks: true,
                dictRemoveFile: 'Borrar archivo',
                maxFiles: 1,
                headers: {
                   'X-CSRF-TOKEN': document.querySelector('meta[name=csrf-token]').content
                },
                success: function(file, response){


                    console.log(response.correcto);
                    document.querySelector('#error').textContent = '';

                    //Coloca la respuesta del servidor en el input hidden
                    document.querySelector('#imagen').value = response.correcto;


                    //Añadir al objeto de archivo
                    file.nombreServidor = response.correcto;


                },
                maxfilesexceeded: function(file){
                    if( this.files[1] != null){
                        this.removeFile(this.files[0]);//Eliminar el archivo anterior
                        this.addFile(file);//Agrega el nuevo archivo

                    }
                },

                removedfile: function(file, response){
                    file.previewElement.parentNode.removeChild(file.previewElement);

                    params = {
                        imagen: file.nombreServidor
                    }

                    axios.post('/vacantes/borrarimagen', params)
                        .then( respuesta => console.log(respuesta))


                }

            });


        })
    </script>



@endsection
