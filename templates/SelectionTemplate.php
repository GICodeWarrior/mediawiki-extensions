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
	</tr>	
	<?php foreach( $articles as $article ) { ?>
	<tr>
	<td><a href="<?php echo $article['title']->getLinkURL(); ?>"><?php echo $article['s_article']; ?></a></td>
	<td><?php echo wfTimeStamp( TS_ISO_8601, $article['s_timestamp'] );	?></td>
	</tr>
	<?php } ?>
	</table>
<?php } else { ?> 
<p>No such selection found</p>
<?php } ?>
</div>


<?php
	} // execute()
} // class
