@extends('pages.AdminEmpresas')

@section('editacion')
<section class="content container-fluid" style="width: 100%; height: 700px;">
    <div class="">
        <div class="col-md-12">
            <div class="card card-default" style="box-shadow: 0 0 0rem 0 rgba(136, 152, 170, 0.15)">
                <div class="card-header">
                    <span class="card-title">Actualizar Empresa</span>
                </div>
                <div class="card-body"
                    style="box-shadow: 0 15px 1rem 0 rgba(0, 0, 0, 0.2); overflow-x:hidden; width: 100%; border-radius: 0 0 15px 15px;">
                    
                    <form method="POST" action="{{ route('admin-empresas.update', $admin_empresas->id_empresa) }}"
                        role="form" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        
                        @include('admin-empresas.form.prt')

                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
