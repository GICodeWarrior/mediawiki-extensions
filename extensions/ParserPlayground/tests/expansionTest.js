var pageDatabase = {
	'Template:Parens': {
		type: 'root',
		contents: [
			'(',
			{
				type: 'tplarg',
				/*
				contents: [
					'1'
				]*/
				name: '1'
			},
			')'
		]
	},
	'ParenCaller': {
		type: 'root',
		contents: [
			{
				type: 'template',
				/*
				contents: [
					{
						type: 'title',
						contents: [
							'Parens'
						]
					},
					{
						type: 'part',
						contents: [
							{
								type: 'name',
								index: 1
							},
							{
								type: 'value',
								contents: [
									'bizbax'
								]
							}
						]
					}
				]*/
				name: 'Parens',
				params: {
					1: 'bizbax'
				}
			}
		]
	}
};

var env = new MWParserEnvironment({
	'domCache': pageDatabase
});
var frame = new PPFrame(env);
frame.expand(pageDatabase['ParenCaller'], 0, function(node, err) {
	if (err) {
		console.log('error', err);
	} else {
		console.log(node);
	}
});

