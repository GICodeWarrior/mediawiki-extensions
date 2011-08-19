<?php
if( !defined( 'MEDIAWIKI' ) ) {
	die( -1 );
}

class FilterRatingsTemplate extends QuickTemplate {
	public function execute() {
		$articles = $this->data['articles'];
		$filters = $this->data['filters'];
?>

<form method="GET" id="filterForm">
<p>
Project Name: <input type="text" name="project" value="<?php echo htmlentities( $filters['r_project'] ); ?>" />
Importance: <input type="text" name="importance" value="<?php echo htmlentities( $filters['r_importance'] ); ?>" />
Quality: <input type="text" name="quality" value="<?php echo htmlentities( $filters['r_quality'] ); ?>" />
<br />
Categories (comma separated): <input type="text" name="categories" value="<?php echo htmlentities( $filters['categories'] ); ?>" />
<input type="submit" id="submit-query" />
</p>
</form>
<div>
Add to Selection: 
<input type="text" name="selection" id="selection" />
<input type="button" id="add-to-selection" value="Add" />
</div>
<div id="notice">
</div>
<div id="">
<?php if( count($articles) > 0 ) { ?>
<h3>Results</h3>
	<table>
	<tr>
		<th>Project</th>
		<th>Article</th>
		<th>Importance</th>
		<th>Quality</th>
	</tr>	
	<?php foreach( $articles as $article ) { ?>
	<tr>
	<td><?php echo htmlentities( $article['r_project'] ); ?></td>
	<td><a href="<?php echo htmlentities( $article['title']->getLinkURL() ); ?>"><?php echo htmlentities( $article['r_article'] ); ?></a></td>
	<td><?php echo htmlentities( $article['r_importance'] ); ?></td>
	<td><?php echo htmlentities( $article['r_quality'] ); ?></td>
	</tr>
	<?php } ?>
	</table>
<?php } else { ?> 
<p>No results found</p>
<?php } ?>
</div>

		<script type="text/javascript">
		// Should I use RL for tiny snippets like this too?
		$("#add-to-selection").click(function() {
			var selection = $("#selection").val();
			$.post("", {
				action: "addtoselection",
				selection: selection
			}, function(raw_data) {
				var data = $.parseJSON(raw_data);
				$("#notice").hide().html("Added to selection <a href='" + data.selection_url + "'>" + selection + "</a>").fadeIn();
			});
			return false;
		});
		</script>

<?php
	} // execute()
} // class
