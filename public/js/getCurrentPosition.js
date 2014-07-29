(function () {

    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(
            success,
            error,
            { enableHighAccuracy: true, maximumAge: 60000 }
        );

        function success(position) {
            var pos = {
                latitude: position.coords.latitude,
                longitude: position.coords.longitude
            };
            $.cookie('userPos', JSON.stringify(pos), { expires: 1, path: '/' });
        }

        function error(error) {
            $.removeCookie('userPos', { path: '/' });
            console.warn('ERROR(' + error.code + '): ' + error.message);
        }
    }

}());
