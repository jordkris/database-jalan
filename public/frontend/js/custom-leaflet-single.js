let main_url_map = localStorage.getItem('base_url');
//single map
$.ajax({
    url: main_url_map + 'api/getDataLatLong/' + location.href.split("/").at(-1),
    type: 'GET',
    success: (data) => {
        var map = new L.Map('map', {
            zoom: 9,
            center: new L.latLng(data[0].loc)
        }); //set center from first location

        map.addLayer(new L.TileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png')); //base layer

        var markersLayer = new L.LayerGroup(); //layer contain searched elements

        map.addLayer(markersLayer);

        var controlSearch = new L.Control.Search({
            position: 'topright',
            layer: markersLayer,
            initial: false,
            zoom: 12,
            marker: false
        });

        map.addControl(controlSearch);

        ////////////populate map with markers from sample data
        for (i in data) {
            var title = data[i].title, //value searched
                loc = data[i].loc, //position found
                marker = new L.Marker(new L.latLng(loc), {
                    title: title
                }); //se property searched
            marker.bindPopup('title: ' + title);
            markersLayer.addLayer(marker);
        }
        $('.search-button').html('<i class="fas fa-search fa-2x"></i>');
        // $('#mapdetail').css('height', "300px");
    },
    error: (error) => {
        console.log(error)
    }
});