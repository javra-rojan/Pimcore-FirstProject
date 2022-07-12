pimcore.registerNS("pimcore.plugin.Test");

pimcore.plugin.Test = Class.create(pimcore.plugin.admin,{
    getClassName: function (){
        return "pimcore.plugin.Test";
    },

    initialize: function(){
        pimcore.plugin.broker.registerPlugin(this);
    },

    pimcoreReady: function (params, broker){
        // alert("Test js activated");
    },

    preSaveObject: function (object , type){
        var answer = confirm("do you want to save " + object.data.general.o_className + "?");
        if ( !answer ){
            throw new pimcore.error.ActionCancelledException("User cancelled this operation");
        }
    }
});

var test = new pimcore.plugin.Test();