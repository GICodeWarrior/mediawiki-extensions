{
	"blocks": [
		{
			"type": "heading",
			"level": 2,
			"line": {
				"text": "This is a heading",
				"annotations": [
					{
						"type": "italic",
						"range": {
							"start": 10,
							"end": 17
						}
					}
				]
			}
		},
		{
			"type": "rule"
		},
		{
			"type": "comment",
			"text": "Hello wild world of wikitext!"
		},
		{
			"type": "table",
			"attributes": {
				"class": "wikitable",
				"width": "50%"
			},
			"rows": [
				[
					{
						"type": "heading",
						"document": {
							"blocks": [
								{
									"type": "paragraph",
									"lines": [
										{
											"text": "This is a table heading"
										}
									]
								}
							]
						}
					}
				],
				[
					{
						"type": "data",
						"document": {
							"blocks": [
								{
									"type": "paragraph",
									"lines": [
										{
											"text": "This is a table cell"
										}
									]
								},
								{
									"type": "paragraph",
									"lines": [
										{
											"text": "This is another paragraph in a table cell"
										}
									]
								}
							]
						}
					}
				]
			]
		},
		{
			"type": "paragraph",
			"lines": [
				{
					"text": "This is a test paragraph!",
					"annotations": [
						{
							"type": "italic",
							"range": {
								"start": 0,
								"end": 4
							}
						},
						{
							"type": "xlink",
							"range": {
								"start": 8,
								"end": 22
							},
							"data": {
								"url": "http://www.a.com"
							}
						},
						{
							"type": "bold",
							"range": {
								"start": 10,
								"end": 14
							}
						}
					]
				},
				{
					"text": "Paragraphs can have more than one line.",
					"annotations": [
						{
							"type": "italic",
							"range": {
								"start": 11,
								"end": 14
							}
						},
						{
							"type": "bold",
							"range": {
								"start": 20,
								"end": 24
							}
						}
					]
				}
			]
		},
		{
			"type": "paragraph",
			"lines": [
				{
					"text": "Documents can have one or more blocks.",
					"annotations": [
						{
							"type": "bold",
							"range": {
								"start": 0,
								"end": 9
							}
						}
					]
				}
			]
		},
		{
			"type": "list",
			"style": "number",
			"items": [
				{
					"line": {
						"text": "First item"
					},
					"lists": [
						{
							"type": "list",
							"style": "bullet",
							"items": [
								{
									"line": {
										"text": "First sub-item"
									}
								},
								{
									"line": {
										"text": "Second sub-item"
									}
								},
								{
									"line": {
										"text": "Third sub-item"
									}
								}
							]
						}
					]
				},
				{
					"line": {
						"text": "Second item",
						"annotations": [
							{
								"type": "italic",
								"range": {
									"start": 0,
									"end": 6
								}
							}
						]
					}
				},
				{
					"line": {
						"text": "Third item",
						"annotations": [
							{
								"type": "bold",
								"range": {
									"start": 0,
									"end": 5
								}
							}
						]
					}
				},
				{
					"line": {
						"text": "Fourth item",
						"annotations": [
							{
								"type": "ilink",
								"range": {
									"start": 7,
									"end": 12
								},
								"data": {
									"title": "User:JohnDoe"
								}
							}
						]
					}
				}
			]
		}
	]
}