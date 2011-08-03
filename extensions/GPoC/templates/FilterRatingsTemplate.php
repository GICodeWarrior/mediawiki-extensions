<?php
if( !defined( 'MEDIAWIKI' ) ) {
	die( -1 );
}

class FilterRatingsTemplate extends QuickTemplate {
	public function execute() {
		$articles = $this->data['articles'];
		$filters = $this->data['filters'];
		$action = $this->data['action'];
		$selection = $this->data['selection'];
?>

<form method="GET" id="filterForm">
<p>
Project Name: <input type="text" name="project" value="<?php echo $filters['r_project']?>" /> 
Importance: <input type="text" name="importance" value="<?php echo $filters['r_importance']?>" /> 
Quality: <input type="text" name="quality" value="<?php echo $filters['r_quality']?>" />
<br />
Categories (comma separated): <input type="text" name="categories" value="<?php echo $filters['categories']?>" />
<input type="submit" id="submit-query" />
</p>
<div>
Add to Selection: 
<input type="text" name="selection" id="selection" />
<input type="hidden" name="action" id="action" />
<input type="button" id="add-to-selection" value="Add" />
</div>
</form>
<div id="notice">
<?php if( $action == 'addtoselection' ) { ?> 
Articles successfully added to selection <?php echo $selection; ?>
<?php } ?>
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
	<td><?php echo $article['r_project'] ?></td>
	<td><a href="<?php echo $article['title']->getLinkURL(); ?>"><?php echo $article['r_article']; ?></a></td>	
	<td><?php echo $article['r_importance']; ?></td>	
	<td><?php echo $article['r_quality']; ?></td>	
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
			$("#action").val("addtoselection");
			$("#filterForm").submit();			
			return false;
		});
		$("#submit-query").click(function() {
			$("#selection").val("");
			// Hitting submit shouldn't add to selection
			$("#filterForm").submit();			
			return false;
		});
		</script>

<?php
	} // execute()
} // class
