pimcore.registerNS("pimcore.plugin.JavraTaskBundle");

pimcore.plugin.JavraTaskBundle = Class.create(pimcore.plugin.admin, {
    getClassName: function () {
        return "pimcore.plugin.JavraTaskBundle";
    },

    initialize: function () {
        pimcore.plugin.broker.registerPlugin(this);
    },

    pimcoreReady: function (params, broker) {
        // alert("JavraTaskBundle ready!");
    }
});

var JavraTaskBundlePlugin = new pimcore.plugin.JavraTaskBundle();
