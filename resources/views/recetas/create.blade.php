@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.1/trix.css"
        integrity="sha512-494Ejp/5WyoRNfh+nPLhSCQPHhcsbA5PoIGv2/FuEo+QLfW+L7JQGPdh8Qy2ZOmkF27pyYlALrxteMiKau1tyw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection

@section('botones')
    <a href="{{ route('recetas.index') }}" class="btn btn-primary ml-2"><i class="fa fa-arrow-left"
            aria-hidden="true"></i> Regresar</a>

@endsection

@section('content')
    <h2 class="text-center">Crear nueva receta</h2>

    <div class="row justify-content-center mt-3">

        <div class="col-md-8">

            {{-- formulario para agregar receta --}}
            <form method="post" action="{{ route('recetas.store') }}" novalidate enctype="multipart/form-data">
                @csrf
                {{-- titulo receta --}}
                <div class="form-group">
                    <label for="titulo">Titulo Receta</label>
                    <input type="text" name="titulo" class="form-control @error('titulo') is-invalid @enderror" id="titulo"
                        placeholder="Título de Receta" value="{{ old('titulo') }}">
                    @error('titulo')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                {{-- categoria de receta --}}
                <div class="form-group">
                    <label for="categoria">Categoria</label>
                    <select name="categoria" id="categoria" class="form-control @error('categoria') is-invalid @enderror">
                        <option value="">--Seleccionar--</option>
                        @foreach ($categorias as $categoria)
                            <option {{ old('categoria') == $categoria->id ? 'selected' : '' }}
                                value="{{ $categoria->id }}">
                                {{ $categoria->nombre }}</option>
                        @endforeach
                    </select>

                    @error('categoria')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>


                {{-- url del video --}}
                <div class="form-group">
                    <label for="url">Link del video de preparacion (Opcional y solo enlaces de youtube)</label>
                    <input type="url" name="url" class="form-control @error('url') is-invalid @enderror" id="url"
                        placeholder="Ejemplo https://www.youtube.com/ejemplo      (solo enlaces de youtube)"
                        value="{{ old('url') }}">
                    @error('url')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                {{-- ingredientes --}}
                <div class="form-group mt-4">
                    <label for="ingredientes">Ingredientes</label>

                    <input id="ingredientes" value="<ol><li></li></ol>" type="hidden" name="ingredientes" value="{{ old('ingredientes') }}">
                    <trix-editor class="form-control @error('ingredientes') is-invalid @enderror" input="ingredientes">
                    </trix-editor>

                    @error('ingredientes')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                {{-- preparacion --}}
                <div class="form-group mt-4">
                    <label for="preparacion">Preparacion</label>

                    <input id="preparacion" type="hidden" name="preparacion" value="{{ old('preparacion') }}">
                    <trix-editor input="preparacion" class="form-control @error('preparacion') is-invalid @enderror">
                    </trix-editor>

                    @error('preparacion')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>


                {{-- campo de imagen --}}

                <div class="form-group mt-3">
                    <label for="imagen">Agrega una imagen</label>
                    <input type="file" id="imagen" name="imagen"
                        class="form-control @error('ingredientes') is-invalid @enderror" value="{{ old('image') }}">

                    @error('imagen')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                {{-- boton submit --}}
                <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="Agregar Receta">
                </div>
            </form>


        </div>
    </div>

@endsection

@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.1/trix.js"
        integrity="sha512-wEfICgx3CX6pCmTy6go+PmYVKDdi4KHhKKz5Xx/boKOZOtG7+rrm2fP7RUR2o4m/EbPdwbKWnP05dvj4uzoclA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" defer></script>
@endsection