window.Content = Backbone.Model.extend({
	urlRoot: "api/content",

	initialize: function () {
		this.validators = {};
		this.validators.title = function (value) {
			return value.length > 0 ? {isValid: true} : {isValid: false, message: "You must enter a title"};
		};
		this.validators.content = function (value) {
			return value.length > 0 ? {isValid: true} : {isValid: false, message: "You must enter a grape variety. lol kidding"};
		};
	},

	validateItem: function (key) {
		return (this.validators[key]) ? this.validators[key](this.get(key)) : {isValid: true};
	},

	// TODO: Implement Backbone's standard validate() method instead.
	validateAll: function () {
		var messages = {};
		for (var key in this.validators) {
			if(this.validators.hasOwnProperty(key)) {
				var check = this.validators[key](this.get(key));
				if (check.isValid === false) {
					messages[key] = check.message;
				}
			}
		}
		return _.size(messages) > 0 ? {isValid: false, messages: messages} : {isValid: true};
	},

	defaults: {
		id: null,
		uid: null,
		gid: null,
		ctid: null,
		title: "",
		subtitle: "",
		content: "",
		created: null,
		active: 0,
		categoryname: "",
		username: "",
		grpname: "",
		taglist: []
	}
});

window.ContentCollection = Backbone.Collection.extend({
	model: Content,
	url: "api/content/all"
});
