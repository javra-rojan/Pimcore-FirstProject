pimcore.registerNS("pimcore.object.tags.objectWithVariableDatatype");
pimcore.object.tags.objectWithVariableDatatype = Class.create( pimcore.object.tags.manyToManyObjectRelation,{
    type: "objectWithVariableDatatype",

    getEditToolbarItems: function (){
        var toolbarItems = [
            {
                xtype: "tbspacer",
                width: 20,
                height: 20,
                cls: "pimcore_icon_droptarget"
            },
            {
                xtype: "tbtext" ,
                text: "<b>" +this.fieldConfig.title+ "<br>"
            },
            {
                xtype: "button",
                iconCls: "pimcore_icon_delete",
                handler: this.empty.bind(this)
            }
        ]
        return toolbarItems;
    }
});