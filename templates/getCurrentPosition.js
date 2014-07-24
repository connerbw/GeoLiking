(function () {

    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(
            success,
            error,
            { enableHighAccuracy: true, maximumAge: 600000 }
        );

        function success(position) {
            var pos = [position.coords.latitude, position.coords.longitude];
            $.cookie('userPos', pos, { expires: 7, path: '/' });
        }

        function error(error) {
            console.warn('ERROR(' + error.code + '): ' + error.message);
        }
    }

}());
