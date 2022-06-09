pimcore.registerNS("pimcore.plugin.JavraRojanBundle");

pimcore.plugin.JavraRojanBundle = Class.create(pimcore.plugin.admin, {
    getClassName: function () {
        return "pimcore.plugin.JavraRojanBundle";
    },

    initialize: function () {
        pimcore.plugin.broker.registerPlugin(this);
    },

    pimcoreReady: function (params, broker) {
        // alert("JavraRojanBundle ready!");
    }
});

var JavraRojanBundlePlugin = new pimcore.plugin.JavraRojanBundle();
