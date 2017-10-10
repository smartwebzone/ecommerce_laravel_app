/**
 * @license Copyright (c) 2003-2015, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.md or http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function( config ) {

	// The toolbar groups arrangement, optimized for two toolbar rows.
    config.extraPlugins = 'htmlbuttons';
    config.htmlbuttons = [
        {
            name:'h2',
            icon:'icon1.png',
            html:'<h2 itemprop="">Search something</h2>',
            title:'h2 with schema'
        },
        {
            name:'h3',
            icon:'icon1.png',
            html:'<h3 itemprop="">Search something</h3>',
            title:'h3 with schema'
        },
        {
            name:'img',
            icon:'icon3.png',
            html:'<img itemprop="image" src="">',
            title:'image with schema'
        },
        {
            name:'span',
            icon:'icon2.png',
            html:'<span itemprop="heading"> </span>',
            title:'A span with schema'
        },
        {
            name:'divs',
            icon:'puzzle.png',
            title:'Insert items',
            items : [
                {
                    name:'button4',
                    icon:'icon1.png',
                    html:'<div class="wrapper"><ol><li>Item 1</li></ol></div>',
                    title:'A div with a list inside'
                },
                {
                    name:'button5',
                    icon:'icon2.png',
                    html:'<p class="heading"> </p>',
                    title:'A paragraph with a class'
                }

            ]
        }
    ];

    config.extraPlugins = 'menubutton';
    config.extraPlugins = 'button';
    config.extraPlugins = 'menu';
    config.extraPlugins = 'autogrow';
    config.extraPlugins = 'loremipsum';

    config.resize_minHeight = 600;
	config.toolbarGroups = [
      //  { name: 'Loremipsum', groups: ['Loremipsum'] },
		{ name: 'clipboard',   groups: [ 'clipboard', 'undo', 'Loremipsum' ] },
		{ name: 'editing',     groups: [ 'find', 'selection', 'spellchecker' ] },
		{ name: 'links' },
		{ name: 'insert' },
		{ name: 'forms' },

		{ name: 'document',	   groups: [ 'mode', 'document', 'doctools' ] },
		{ name: 'others' },
		'/',
		{ name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
		{ name: 'paragraph',   groups: [ 'list', 'indent', 'blocks', 'align', 'bidi' ] },

		{ name: 'styles' },
		{ name: 'colors' },
        { name: 'tools' },
		{ name: 'buttons', groups: ['h2','h3', 'img', 'span']}

	];


    config.extraAllowedContent = {
        'div span p a em strong ': {
            attributes: ['itemscope', 'itemtype', 'itemprop'],
        },
        'time': {
            attributes: ['itemprop', 'datetime']
        }
    }

     config.height = 500;
     config.width = 'auto';

	// Remove some buttons provided by the standard plugins, which are
	// not needed in the Standard(s) toolbar.
	config.removeButtons = 'Underline,Subscript,Superscript';

	// Set the most common block elements.
	config.format_tags = 'p;h1;h2;h3;pre';

	// Simplify the dialog windows.
	config.removeDialogTabs = 'image:advanced;link:advanced';
    config.allowedContent = true;
    config.extraAllowedContent = true;

    config.autoGrow_onStartup = true;
    config.autoGrow_minHeight = 400;
    config.autoGrow_maxHeight = 1000;
    config.autoGrow_bottomSpace = 50;


};
