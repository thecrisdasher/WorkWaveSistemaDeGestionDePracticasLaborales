@extends('pages.AdminUsers')
@section('usuarios')

<section class="content container-fluid" style="width: 100%; height: 1000px;">
    <div class="">
        <div class="col-md-12">
            <div class="card card-default" style="padding: 20px; box-shadow: 0 0 0rem 0 rgba(136, 152, 170, 0.15) ">
                <div class="card-header">
                    <span class="card-title">{{ __('Agregar') }} usuario</span>
                </div>
                <div class="card-body" style="box-shadow: 0 15px 1rem 0 rgba(0, 0, 0, 0.2); overflow-x:hidden; width: 100%; border-radius: 0 0  15px 15px;">
                    <form method="POST" action="{{ route('admin-users.store') }}" role="form"
                        enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        @include('admin-users.form.prt')
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection