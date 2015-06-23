(function () {

    function success(position) {
        var pos = {
            latitude: position.coords.latitude,
            longitude: position.coords.longitude
        };
        $.cookie('geoLikePos', JSON.stringify(pos), { expires: 1, path: '/' });
    }

    function error(error) {
        $.removeCookie('geoLikePos', { path: '/' });
        console.warn('ERROR(' + error.code + '): ' + error.message);
    }

    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(
            success,
            error,
            { enableHighAccuracy: true, maximumAge: 60000 }
        );
    }

}());
