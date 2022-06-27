pimcore.registerNS("pimcore.plugin.JavraCalculateBundle");

pimcore.plugin.JavraCalculateBundle = Class.create(pimcore.plugin.admin, {
    getClassName: function () {
        return "pimcore.plugin.JavraCalculateBundle";
    },

    initialize: function () {
        pimcore.plugin.broker.registerPlugin(this);
    },

    pimcoreReady: function (params, broker) {
        // alert("JavraCalculateBundle ready!");
    }
});

var JavraCalculateBundlePlugin = new pimcore.plugin.JavraCalculateBundle();
