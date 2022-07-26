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
        console.log(object);
        if( object.data.general.o_className === "Person"){
            alert(object.data.data.salutation+ " " +object.data.data.name);
            // console.log( object.data.data.salutation === "" );
            if( object.data.data.salutation  === "" ){
                throw new pimcore.error.ValidationException("Name must have salutation");
            }
        }

        // if ( !answer ){
        //     throw new pimcore.error.ActionCancelledException("User cancelled this operation");
        // }
    }
});

var test = new pimcore.plugin.Test();