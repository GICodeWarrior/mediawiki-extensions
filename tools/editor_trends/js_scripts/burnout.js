db.editors_dataset.find().forEach(function(user){
	var edits= 	db.editors_dataset.findOne({'username': user.username}, {'monthly_edits':1});
	editor = new Object();
	editor.burnout = new Array();
	editor.username = user.username;
	editor.count = 0;
	editor.sum = 0;
	var burnout = false;
	var time = 0
	for (year=2001;year<2011;year++){
		var y = year;
		year = year + '';
		time = (y-2001) * 12;
		for (month=1;month<13;month++){
			var m = month;
			month = month +'';
			time = time + m;
			if (edits.monthly_edits[year][month] > 249) {
				editor.burnout[time] = edits.monthly_edits[year][month];
				burnout = true;
			}
			if (burnout == true) {
				editor.sum = editor.sum + edits.monthly_edits[year][month];
				editor.count = editor.count +1;
			}
		}
	}

	if (editor.sum / editor.count < 10 && editor.burnout.length >0){
		print(editor.username, editor.count, editor.sum, burnout);
		
	}
	
});