<?php
// This file is generated. Do not modify it manually.
return array(
	'newsletter-mjml' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 3,
		'name' => 'newsletter/newsletter-mjml',
		'version' => '0.1.0',
		'title' => 'Newsletter',
		'category' => 'text',
		'icon' => 'smiley',
		'description' => 'Create newsletter MJML',
		'attributes' => array(
			'content' => array(
				'type' => 'string',
				'source' => 'html',
				'selector' => 'p'
			)
		),
		'example' => array(
			
		),
		'supports' => array(
			'html' => false
		),
		'textdomain' => 'newsletter-mjml',
		'editorScript' => 'file:./index.js',
		'editorStyle' => 'file:./index.css',
		'style' => 'file:./style-index.css'
	)
);
