pimcore.registerNS("pimcore.object.classes.data.objectWithVariableDatatype");
pimcore.object.classes.data.objectWithVariableDatatype = Class.create(pimcore.object.classes.data.manyToManyObjectRelation,{
    type: 'objectWithVariableDatatype',

    initialize: function ( treenode, initData ){
        this.type = 'objectWithVariableDatatype';
        this.initData(initData);
        this.treeNode(treenode);
    },

    getTypeName: function (){
        return "objectWithVariableDatatype";
    },

    getIconClass: function (){
        return "pimcore_icon_manyToManyObjectRelation";
    },

    getGroup: function (){
        return "relation";
    }
});