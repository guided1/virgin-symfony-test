$(function() {
    VirginApi.initInterface();
});


// AMD Would be better here
var VirginApi = {
    initInterface : function() {
        $("body").on("change", "#js-region", function() {
            VirginApi.getChannels();
        });
        $("body").on("change", "#js-package", function() {
            VirginApi.getChannels();
        });

        VirginApi.getPackages();
        VirginApi.getRegions();
    },
    getPackages: function () {
        $.ajax({
            url: "/api/packages.json"
        }).done(function(data) {
            $.each(data.packages, function(i, package){
                $("#js-package").append("<option value='" + package.id + "'>" + package.name + "</option>");
            });
        });
    },

    getRegions: function () {
        $.ajax({
            url: "/api/regions.json"
        }).done(function(data) {
            $.each(data.regions, function(i, region) {
                $("#js-region").append("<option value='" + region.id + "'>" + region.name + "</option>");
            });
        });
    },


    getChannels: function() {
        var regionId = $("#js-region").val();
        var packageId = $("#js-package").val();

        if(regionId && packageId) {
            $.ajax({
                url: "/api/channels/" + regionId +"/packages/" + packageId +".json"
            }).done(function(data) {
                $("#js-list").empty();
                $.each(data.channels, function(i, channel) {
                    $("#js-list").append("<li>" + channel.number + ":"+ channel.name + "</li>");
                });
            });
        }
    }


};