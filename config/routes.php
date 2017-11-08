<?php
	return array(

		'news/([0-9]+)'                   => 'news/view/$1', //actionView в NewsController
		'news'                            => 'news/index', //actionIndex в NewsController

		'product/([0-9]+)'                => 'product/view/$1', //actionView в ProductController

		'catalog'                         => 'catalog/index',  //actionIndex в CatalogController
		'category/([0-9]+)/page-([0-9]+)' => 'catalog/category/$1/$2', //actionCategory в CatalogController
		'category/([0-9]+)'               => 'catalog/category/$1',  //actionCategory в CatalogController

		'user/register'                   => 'user/register',

		''                                => 'site/index', //actionIndex в SiteController


	);