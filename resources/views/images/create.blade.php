@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center py-lg-5">
        <div class="col-md-8 py-5">
            <div class="card">
                <div class="card-header bg-primary ">Création d'image</div>

                <div class="card-body">

        <form method="POST" action="{{ route('image.store') }}" enctype="multipart/form-data">
        @csrf
        @if (session()->has('message'))
            <div class="alert alert-success" role="alert">
                {{ session('message') }}
            </div>
        @endif

        <div class="form-group row">
            <label for="nom" class="col-md-4 col-form-label text-md-right">Image</label>

                <div class="col-md-6">
                    <input id="nom" type="file" class="form-control  @error('nom') is-invalid @enderror" name="nom" value="{{ old('nom') }}" autocomplete="nom" autofocus>
                   <!-- <label class="custom-file-label" for="image"></label>-->
                    @error('nom')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                     @enderror
                </div>
        </div>

        <div class="form-group row">
            <label for="description" class="col-md-4 col-form-label text-md-right">Description*</label>

                <div class="col-md-6">
                    <textarea id="description" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ old('description') }}"  autocomplete="description" autofocus>
                    </textarea>

                    @error('description')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
             </div>
        </div>


            <div class="form-group row">
                <img id="preview" class="img-fluid" src="#" alt="">
            </div>

            <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Envoyer') }}
                                </button>
                            </div>
                        </div>

           
           
           

        </form>
        </div>
            </div>
        </div>
    </div>
</div>

    

@endsection


@section('script')
<!--
    <script>
        $(() => {
            $('input[type="file"]').on('change', (e) => {
                let that = e.currentTarget
                if (that.files && that.files[0]) {
                    $(that).next('.custom-file-label').html(that.files[0].name)
                    let reader = new FileReader()
                    reader.onload = (e) => {
                        $('#preview').attr('src', e.target.result)
                    }
                    reader.readAsDataURL(that.files[0])
                }
            })
        })
    </script> 
    -->

@endsection