@extends('layouts.app')

@section('content')

<div class="card">
    <div class="card-header">Dashboard</div>

    <div class="card-body">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif

        You are logged in!
    </div>
</div>

{{-- extras --}}
@can('Crear ligas')
<!-- Basic initialization -->
<div class="card">
    <div class="card-header header-elements-inline">
        <h5 class="card-title">Basic initialization</h5>
        <div class="header-elements">
            <div class="list-icons">
                <a class="list-icons-item" data-action="collapse"></a>
                <a class="list-icons-item" data-action="reload"></a>
                <a class="list-icons-item" data-action="remove"></a>
            </div>
        </div>
    </div>

    <div class="card-body">
    </div>

    <table class="table datatable-button-html5-basic">
        <thead>
            <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Job Title</th>
                <th>DOB</th>
                <th>Status</th>
                <th>Salary</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Marth</td>
                <td><a href="#">Enright</a></td>
                <td>Traffic Court Referee</td>
                <td>22 Jun 1972</td>
                <td><span class="badge badge-success">Active</span></td>
                <td>$85,600</td>
            </tr>
            <tr>
                <td>Jackelyn</td>
                <td>Weible</td>
                <td><a href="#">Airline Transport Pilot</a></td>
                <td>3 Oct 1981</td>
                <td><span class="badge badge-secondary">Inactive</span></td>
                <td>$106,450</td>
            </tr>
        </tbody>
    </table>
</div>
<!-- /basic initialization -->

<!-- Column selectors -->
<div class="card">
    <div class="card-header header-elements-inline">
        <h5 class="card-title">Column selectors</h5>
        <div class="header-elements">
            <div class="list-icons">
                <a class="list-icons-item" data-action="collapse"></a>
                <a class="list-icons-item" data-action="reload"></a>
                <a class="list-icons-item" data-action="remove"></a>
            </div>
        </div>
    </div>

    <div class="card-body">
       
    </div>

    <table class="table datatable-button-html5-columns">
        <thead>
            <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Job Title</th>
                <th>DOB</th>
                <th>Status</th>
                <th>Salary</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Marth</td>
                <td><a href="#">Enright</a></td>
                <td>Traffic Court Referee</td>
                <td>22 Jun 1972</td>
                <td><span class="badge badge-success">Active</span></td>
                <td>$85,600</td>
            </tr>
            <tr>
                <td>Jackelyn</td>
                <td>Weible</td>
                <td><a href="#">Airline Transport Pilot</a></td>
                <td>3 Oct 1981</td>
                <td><span class="badge badge-secondary">Inactive</span></td>
                <td>$106,450</td>
            </tr>
        </tbody>
    </table>
</div>
<!-- /column selectors -->
@endcan




<script>
    

Toastnotify.create({
    text: "Habilita las notificaciones de escritorio para Gmail.",
    type:"default",  // String volores default|dark|primary|info|warning|danger|success|secondary|pink Valores por defecto "default"
    duration: 5000, // Number 
    rounded:true, //boolean Valor por false
    animationIn: "fadeInLeft", // String Valor por defecto "fadeInLeft" puedes usuar Animate.css https://daneden.github.io/animate.css/ 
    animationOut: "fadeOutLeft", // String Valores por defecto "fadeOutLeft" puedes usuar Animate.css
    classes: "gradient-tinder", // String puedes usar uno o mas classes separados por un espacio
    buttonOk: "OK", // String Valor por defecto "OK"
    buttonCancel: "No, gracias", // String Valor por defecto "No, gracias"
    image: "https://instagram.flim1-1.fna.fbcdn.net/vp/797bcb870452079e3ed5efa63d1a1821/5CBE3A01/t51.12442-15/e15/c16.114.662.662/s150x150/49829008_625558677898861_1062597542930286557_n.jpg?_nc_ht=instagram.flim1-1.fna.fbcdn.net",
    icon: "mdi mdi-cart", // use  https://materialdesignicons.com/cdn/2.0.46/  mdi mdi-icono OR font awesome fa fa-icono
    important: true, // boolean  Valor por defecto false
    callbackOk: function () {
        console.log('Precionado OK');
    },
    callbackCancel: function () {
        console.log('Precionado Cancelado');
    }
});
                            

</script>



@endsection
