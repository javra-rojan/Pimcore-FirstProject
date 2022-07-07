pimcore.registerNS("pimcore.plugin.ObjectWithVariableDatatypeBundle");

pimcore.plugin.ObjectWithVariableDatatypeBundle = Class.create(pimcore.plugin.admin, {
    getClassName: function () {
        return "pimcore.plugin.ObjectWithVariableDatatypeBundle";
    },

    initialize: function () {
        pimcore.plugin.broker.registerPlugin(this);
    },

    pimcoreReady: function (params, broker) {
        // alert("ObjectWithVariableDatatypeBundle ready!");
    }
});

var ObjectWithVariableDatatypeBundlePlugin = new pimcore.plugin.ObjectWithVariableDatatypeBundle();
