<div class="main-content mt-5">
    <div class="content" id="page-content-wrapper">
        <div class="container card bg-white">
            <div class="section">
                <h2 class="title text-center">MAPA DE NBC</h2>
                <div class="team">
                    <div class="row">
                        <div class="col-sm-12">
                            <div id="map" style= "width: 100%; height: 600px;" class="mb-4"></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            {{-- <x-maps-google id="map" :mapType="'satellite'"></x-maps-google> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script src='https://unpkg.com/leaflet@1.8.0/dist/leaflet.js' crossorigin=''></script>
<script>
        let map, markers = [];
        /* ----------------------------- Initialize Map ----------------------------- */
        function initMap() {
            map = L.map('map', {
                center: {
                    lat: 28.626137,
                    lng: 79.821603,
                },
                zoom: 13
            });

            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '© OpenStreetMap'
            }).addTo(map);

            map.on('click', mapClicked);
            initMarkers();
        }
        initMap();


    /* --------------------------- Initialize Markers --------------------------- */
    function initMarkers() {
        // console.log(<?php echo $initialMarkers ?>);
        const initialMarkers = <?php echo json_encode($initialMarkers); ?>;
        console.log(initialMarkers);

        for (let index = 0; index < initialMarkers.length; index++) {

            const data = initialMarkers[index];
            const marker = generateMarker(data, index);
            @foreach($nbcs as $nbc)
                marker.addTo(map).bindPopup(`<b>{{$nbc->latitud}},  {{$nbc->longitud}}</b>`);
            @endforeach
            map.panTo(data.position);
            markers.push(marker)
        }
    }

    function generateMarker(data, index) {
        return L.marker(data.position, {
                draggable: data.draggable
            })
            .on('click', (event) => markerClicked(event, index))
            .on('dragend', (event) => markerDragEnd(event, index));
    }

    /* ------------------------- Handle Map Click Event ------------------------- */
    function mapClicked($event) {
        console.log(map);
        console.log($event.latlng.lat, $event.latlng.lng);
    }

    /* ------------------------ Handle Marker Click Event ----------------------- */
    function markerClicked($event, index) {
        console.log(map);
        console.log($event.latlng.lat, $event.latlng.lng);
    }

    /* ----------------------- Handle Marker DragEnd Event ---------------------- */
    function markerDragEnd($event, index) {
        console.log(map);
        console.log($event.target.getLatLng());
    }
</script>