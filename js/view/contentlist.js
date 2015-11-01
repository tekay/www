window.ContentListView = Backbone.View.extend({
    options:{page:5},
    initialize: function () {
        this.render();
    },

    render: function () {
        var contentList = this.model.models;
        var len = contentList.length;
        var startPos = (this.options.page - 1) * 8;
        /*var startPos = (this.options.page - 1) * 8;*/
        var endPos = Math.min(startPos + 8, len);

        $(this.el).html('<ul class="thumbnails"></ul>');

        for (var i = startPos; i < endPos; i++) {
            $('.thumbnails', this.el).append(new ContentView({model: contentList[i]}).render().el);
        }

        return this;
    }
});

window.ContentListItemView = Backbone.View.extend({

    tagName: "li",

    className: "span3",

    initialize: function () {
        this.model.bind("change", this.render, this);
        this.model.bind("destroy", this.close, this);
    },

    render: function () {
        $(this.el).html(this.template(this.model.toJSON()));
        return this;
    }

});
