@extends('pages.AdminUsers')



@section('editacion')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Update') }} Usuario</span>
                    </div>
                    <div class="card-body">

                        <form method="POST" action="{{ route('admin-users.update', $users_admin->id) }}" role="form"
                            enctype="multipart/form-data">
                            <input type="hidden" name="_method" value="PUT">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">


                            @include('admin-users.form.prt')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
