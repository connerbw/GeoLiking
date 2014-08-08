(function () {

    function success(position) {
        var pos = {
            latitude: position.coords.latitude,
            longitude: position.coords.longitude
        };
        $.cookie('lastKnownUserPos', JSON.stringify(pos), { expires: 1, path: '/' });
    }

    function error(error) {
        $.removeCookie('lastKnownUserPos', { path: '/' });
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
