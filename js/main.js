var AppRouter = Backbone.Router.extend({

	routes: {
		"": "start",
		"content/add": "contentAdd",
		"content/:id": "contentDetails"
	},

	initialize: function () {
		this.headerView = new HeaderView();
		$('.headtpl').html(this.headerView.el);
	},

	start: function(){
		this.startView = new StartView();
	},

	list: function(page) {
		var p = page ? parseInt(page, 10) : 1;
		var contentList = new ContentCollection();
		contentList.fetch({success: function(){
			$(".maintpl").html(new ContentListView({model: contentList, page: p}).el);
		}});
		this.headerView.selectMenuItem('home-menu');
	},

	contentDetails: function (id) {
		var content = new Content({id: id});
		content.fetch({success: function(){
			$(".maintpl").html(new ContentView({model: content}).el);
		}});
	},

	contentAdd: function() {
		var content = new Content();
		$('.maintpl').html(new ContentAddView({model: content}).el);
		this.headerView.selectMenuItem('add-menu');
	}

});

utils.loadTemplate(['HeaderView', 'ContentView', 'ContentListView', 'ContentAddView'], function() {
	app = new AppRouter();
	Backbone.history.start();
});
