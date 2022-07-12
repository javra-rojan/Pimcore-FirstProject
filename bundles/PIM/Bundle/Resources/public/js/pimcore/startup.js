pimcore.registerNS("pimcore.plugin.PIMRelationsBundle");

pimcore.plugin.PIMRelationsBundle = Class.create(pimcore.plugin.admin, {
    getClassName: function () {
        return "pimcore.plugin.PIMRelationsBundle";
    },

    initialize: function () {
        pimcore.plugin.broker.registerPlugin(this);
    },

    pimcoreReady: function (params, broker) {
        // alert("PIMRelationsBundle ready!");
    }
});

var PIMRelationsBundlePlugin = new pimcore.plugin.PIMRelationsBundle();
