pimcore.registerNS("pimcore.plugin.addNavItem");


pimcore.plugin.addNavItem = Class.create(pimcore.plugin.admin, {
    getClassName: function() {
        return "pimcore.plugin.addNavItem";
    },

    initialize: function() {
        pimcore.plugin.broker.registerPlugin(this);
        this.navEl = Ext.get('pimcore_menu_search').insertSibling('<li id="pimcore_menu_mds" data-menu-tooltip="Discord" class="pimcore_menu_item pimcore_menu_needs_children"><img src="https://img.icons8.com/cute-clipart/64/000000/discord-new-logo.png"/></li>', 'after');
        this.menu = new Ext.menu.Menu({
            items: [{
                text: "My Discord link",
                iconCls: "pimcore_icon_apply",
                handler: function () {
                    alert("www.discord.com");
                }
            }
            ],
            cls: "pimcore_navigation_flyout"
        });
        pimcore.layout.toolbar.prototype.mdsMenu = this.menu
    },

    pimcoreReady: function (params,broker){
        var toolbar = pimcore.globalmanager.get("layout_toolbar");
        this.navEl.on("mousedown", toolbar.showSubMenu.bind(toolbar.mdsMenu));
        pimcore.plugin.broker.fireEvent("mdsMenuReady", toolbar.mdsMenu)
    }
});

var samplePlugin = new pimcore.plugin.addNavItem();