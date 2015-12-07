var AppRouter = Backbone.Router.extend({

	routes: {
		""                  : "start",
		"content/:id"       : "contentDetails"
	},

	initialize: function () {
		this.headerView = new HeaderView();
		$('.headtpl').html(this.headerView.el);
	},

	start:function(){
		this.startView=new StartView();
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
		this.headerView.selectMenuItem();
	},

	addWine: function() {
		var wine = new Wine();
		$('#content').html(new WineView({model: wine}).el);
		this.headerView.selectMenuItem('add-menu');
	},

	about: function () {
		if (!this.aboutView) {
			this.aboutView = new AboutView();
		}
		$('#content').html(this.aboutView.el);
		this.headerView.selectMenuItem('about-menu');
	}

});

utils.loadTemplate(['HeaderView', 'ContentView', 'ContentListView'], function() {
	app = new AppRouter();
	Backbone.history.start();
});
