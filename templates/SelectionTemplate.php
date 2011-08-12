<?php
if( !defined( 'MEDIAWIKI' ) ) {
	die( -1 );
}

class SelectionTemplate extends QuickTemplate {
	public function execute() {
		$articles = $this->data['articles'];
		$name = $this->data['name'];
		$csv_link = $this->data['csv_link'];
?>

<div id="">
<?php if( count($articles) > 0 ) { ?>
<h3>Articles in Selection <?php echo $name; ?></h3> <small><a href="<?php echo $csv_link; ?>">Export CSV</a></small>
	<table>
	<tr>
		<th>Article</th>
		<th>Added on</th>
		<th>Revision</th>
		<th>Actions</th>
	</tr>	
	<?php foreach( $articles as $article ) { ?>
	<tr>
	<td><a href="<?php echo $article['title']->getLinkURL(); ?>"><?php echo $article['s_article']; ?></a></td>
	<td><?php echo wfTimeStamp( TS_ISO_8601, $article['s_timestamp'] );	?></td>
	<td><?php if($article['s_revision'] != null) { ?>
		<a href="<?php echo $article['title']->getLinkUrl(array('oldid' => $article['s_revision'])); ?>"><?php echo $article['s_revision']; ?></a>
		<?php } ?>
	</td>
	<td>
		<div class="item-actions" data-namespace="<?php echo $article['s_namespace']; ?>" data-article="<?php echo $article['s_article']; ?>">
		<div class="revision-input" style="display:none">
			<input type="text" class="revision-id" placeholder="Enter revision id" value="<?php echo $article['s_revision']; ?>" />
			(<a href="#" class="revision-save">Save</a> | <a href="#" class="revision-cancel">Cancel</a>)
		</div>
		<a href="#" class="change-revision">Set Revision</a> |
		<a href="#" class="delete-article">Delete</a>
		</div>
	</td>
	</tr>
	<?php } ?>
	</table>
<?php } else { ?> 
<p>No such selection found</p>
<?php } ?>
</div>

		<script type="text/javascript">
		$(document).ready(function() {
			$(".change-revision").click(function() {
				var parent = $(this).parent("div.item-actions");
				var input_box = parent.children(".revision-input");
				input_box.fadeToggle();
				return false;
			});
			$(".revision-save").click(function() {
				var parent = $(this).parents("div.item-actions");
				var ns = parent.attr("data-namespace"),
					article = parent.attr("data-article");
				var input = $("input.revision-id", parent);
				var input_box = parent.children(".revision-input");
				var revid = input.val();

				$.post('', {
					action: 'setrevision',
					namespace: ns,
					article: article,
					revision: revid
				}, function() {
					input_box.fadeOut();
				});

				return false;
			});
			$(".delete-article").click(function() {
				var parent = $(this).parents("div.item-actions");
				var ns = parent.attr("data-namespace"),
					article = parent.attr("data-article");

				$.post('', {
					action: 'deletearticle',
					namespace: ns,
					article: article
				}, function() {
				});

				return false;
			});

			$(".revision-cancel").click(function() {
				var parent = $(this).parents("div.item-actions");
				var input_box = parent.children(".revision-input");
				input_box.fadeOut();
			});
		});
		</script>

<?php
	} // execute()
} // class
