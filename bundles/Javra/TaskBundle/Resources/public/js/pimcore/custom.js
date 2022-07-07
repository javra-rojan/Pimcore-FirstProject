pimcore.registerNS("pimcore.plugin.csvImport");

pimcore.plugin.csvImport = Class.create(pimcore.plugin.admin, {
    getClassName: function() {
        return "pimcore.plugin.csvImport";
    },

    initialize: function() {
        pimcore.plugin.broker.registerPlugin(this);
    },

    // pimcoreReady: function (params,broker){
    //     alert("Sample Plugin Ready!");
    // }
});

var samplePlugin = new pimcore.plugin.csvImport();