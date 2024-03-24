@extends('pages.dashboard')

@section('edit')
    {{ __('Update') }} Oferta
@endsection

@section('editacion')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                <div class="card card-default">
                    <div class="card-header">
                        <h1>CHICHI</h1>
                        <span class="card-title">{{ __('Update') }} Oferta</span>
                    </div>
                    <div class="card-body">

                        <form method="POST" action="{{ route('oferta.update', $oferta->id) }}" role="form"
                            enctype="multipart/form-data">
                            <input type="hidden" name="_method" value="PUT">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">


                            @include('oferta.form.prt')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
