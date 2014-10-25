(function() {
    var pusher = new Pusher('db75849466d9d68be2f3');
    var channel = pusher.subscribe('yomitrack-channel');

    window.App = {};

    App.Notifier = function() {
        this.notify = function(message) {
            alert(message);
        }
    };

    channel.bind('userNearRestaurant', function(data) {
        (new App.Notifier).notify(data.promo)
    });
})();