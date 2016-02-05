var dirTema = document.querySelector("meta[name='theme_path']").getAttribute('content');

require.config({
	baseUrl: '/',
    urlArgs: "v=001",
    waitSeconds : 60,
	shim: {
		"bootstrap"	: {
			deps : ['jquery'],
		},		
		'jq_ui' : {
			deps : ['jquery'],
		},
		"noty" : {
			deps : ['jquery'],
		},
	},

	paths: {
		// LIBRARY
		bootstrap 		: 'js/bootstrap.min',
		cart			: 'js/shop_cart',
		jcarousel		: dirTema+'/assets/js/lib/jquery.jcarousel.min',
		jq_colorbox		: dirTema+'/assets/js/colorbox/jquery.colorbox-min',
		jq_ui			: 'js/jquery-ui',
		jquery 			: dirTema+'/assets/js/lib/jquery',
		jquery_easing	: dirTema+'/assets/js/lib/jquery.easing-1.3.min',
		jquery_nivo		: dirTema+'/assets/js/lib/jquery.nivo.slider.pack',
		noty			: 'js/jquery.noty',
		tabs			: dirTema+'/assets/js/lib/tabs',

		// ROUTE
		router          : 'js/router',

		// CONTROLLER
		home            : dirTema+'/assets/js/controller/home',
		member          : dirTema+'/assets/js/controller/member',
		main            : dirTema+'/assets/js/controller/default',
		produk          : dirTema+'/assets/js/controller/produk',
	}
});
require([
	'router',
	'bootstrap',
	'main',
], function(router,b,main){
	router.define('/','home@run');
	router.define('home', 'home@run');
	router.define('member/*', 'member@run');
	router.define('register', 'member@run');
	router.define('produk/*', 'produk@run');
	
	main.run();
	router.run();
});