@extends('layout.app')
@section('contenido')
<div class='row'>
    <div class="col-md-2"></div>
    <div class="col-md-8">
        <form action="{{ route('predios.store') }}" method="POST">
            @csrf
            <h3><b>Registrar Nuevo Predio</b></h3>
            <hr>
            <label><b>Propietario:</b></label>
            <input type="text" name="propietario" id="propietario" placeholder="Ingrese ..." required class="form-control"> <br> 

            <label><b>Clave Catastral:</b></label>        
            <input type="number" name="clave" id="clave" placeholder="Ingrese la clave catastral" class="form-control"> <br>

            {{-- Coordenada 1 --}}
            <div class="row">
                <div class="col-md-5">
                    <label><b>COORDENADA N° 1</b></label><br>
                    <label><b>Latitud:</b></label>
                    <input type="number" name="latitud1" id="latitud1" class="form-control" readonly><br>
                    <label><b>Longitud:</b></label>
                    <input type="number" name="longitud1" id="longitud1" class="form-control" readonly><br>
                    <label><b>Hora de llegada P1:</b></label>
                    <input type="text" name="hora_p1" id="hora_p1" class="form-control" readonly>
                </div>
                <div class="col-md-7">
                    <div id="mapa1" style="height:180px; width:100%; border:2px solid black;"></div>
                </div>
            </div>
            <br>

            {{-- Coordenada 2 --}}
            <div class="row">
                <div class="col-md-5">
                    <label><b>COORDENADA N° 2</b></label><br>
                    <label><b>Latitud:</b></label>
                    <input type="number" name="latitud2" id="latitud2" class="form-control" readonly><br>
                    <label><b>Longitud:</b></label>
                    <input type="number" name="longitud2" id="longitud2" class="form-control" readonly><br>
                    <label><b>Hora de llegada P2:</b></label>
                    <input type="text" name="hora_p2" id="hora_p2" class="form-control" readonly>
                </div>
                <div class="col-md-7">
                    <div id="mapa2" style="height:180px; width:100%; border:2px solid black;"></div>
                </div>
            </div>
            <br>

            {{-- Coordenada 3 --}}
            <div class="row">
                <div class="col-md-5">
                    <label><b>COORDENADA N° 3</b></label><br>
                    <label><b>Latitud:</b></label>
                    <input type="number" name="latitud3" id="latitud3" class="form-control" readonly><br>
                    <label><b>Longitud:</b></label>
                    <input type="number" name="longitud3" id="longitud3" class="form-control" readonly><br>
                    <label><b>Hora de llegada P3:</b></label>
                    <input type="text" name="hora_p3" id="hora_p3" class="form-control" readonly>
                </div>
                <div class="col-md-7">
                    <div id="mapa3" style="height:180px; width:100%; border:2px solid black;"></div>
                </div>
            </div>
            <br>



            <br>
            <center>
                <button class="btn btn-success">Guardar</button>
                &nbsp;&nbsp;&nbsp;
                <button type="reset" class="btn btn-danger">Limpiar</button>
                &nbsp;&nbsp;&nbsp;
                <button type="button" class="btn btn-primary" onclick="graficarPredio();">Graficar Predio</button>
            </center>
        </form>
    </div>
</div>

<br>
<div class="row">
    <div class="col-md-12">
        <div id="mapa-poligono" style="height:500px; width:100%; border:2px solid blue;"></div>
    </div>
</div>

<script>
    var mapaPoligono;

    function initMap() {
        var latLngDefault = new google.maps.LatLng(-0.9374805, -78.6161327);

        const configurarMapa = (idMapa, idLat, idLng, idHora) => {
            var mapa = new google.maps.Map(document.getElementById(idMapa), {
                center: latLngDefault,
                zoom: 15,
                mapTypeId: google.maps.MapTypeId.ROADMAP
            });

            var marcador = new google.maps.Marker({
                position: latLngDefault,
                map: mapa,
                title: "Seleccione la coordenada",
                draggable: true
            });

            google.maps.event.addListener(marcador, 'dragend', function () {
                let lat = this.getPosition().lat();
                let lng = this.getPosition().lng();
                document.getElementById(idLat).value = lat;
                document.getElementById(idLng).value = lng;

                if (idHora) {
                    let ahora = new Date();
                    let hora = ahora.toTimeString().split(" ")[0];
                    document.getElementById(idHora).value = hora;
                }
            });
        };

        // Crear cada mapa con sus IDs correspondientes
        configurarMapa('mapa1', 'latitud1', 'longitud1', 'hora_p1');
        configurarMapa('mapa2', 'latitud2', 'longitud2', 'hora_p2');
        configurarMapa('mapa3', 'latitud3', 'longitud3', 'hora_p3');

        mapaPoligono = new google.maps.Map(document.getElementById("mapa-poligono"), {
            zoom: 15,
            center: latLngDefault,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        });
    }

    function graficarPredio() {
        var coordenadas = [
            new google.maps.LatLng(document.getElementById('latitud1').value, document.getElementById('longitud1').value),
            new google.maps.LatLng(document.getElementById('latitud2').value, document.getElementById('longitud2').value),
            new google.maps.LatLng(document.getElementById('latitud3').value, document.getElementById('longitud3').value)
        ];

        var poligono = new google.maps.Polygon({
            paths: coordenadas,
            strokeColor: "#FF0000",
            strokeOpacity: 0.8,
            strokeWeight: 2,
            fillColor: "#00FF00",
            fillOpacity: 0.35
        });

        poligono.setMap(mapaPoligono);
    }
</script>
@endsection
