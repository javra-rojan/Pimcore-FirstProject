pimcore.registerNS("pimcore.plugin.ImportFromJsonBundle");

pimcore.plugin.ImportFromJsonBundle = Class.create(pimcore.plugin.admin, {
    getClassName: function () {
        return "pimcore.plugin.ImportFromJsonBundle";
    },

    initialize: function () {
        pimcore.plugin.broker.registerPlugin(this);
    },

    pimcoreReady: function (params, broker) {
        // alert("ImportFromJsonBundle ready!");
    }
});

var ImportFromJsonBundlePlugin = new pimcore.plugin.ImportFromJsonBundle();
