<?php

/**
 * Contest parse tests cases.
 *
 * @ingroup Contest
 * @since 0.1
 *
 * @licence GNU GPL v3
 * @author Jeroen De Dauw < jeroendedauw@gmail.com >
 */
class ContestParseTests extends MediaWikiTestCase {
	
	/**
	 * Tests @see ContestUtils::replaceRelativeLinks
	 */
	public function testObjectSelectCount() {
		$tests = array(
			'[[Foo|Bar]]' => '[' . Title::newFromText( 'Foo' )->getFullUrl() . ' Bar]',
			'[[Foo|Foo]]' => '[' . Title::newFromText( 'Foo' )->getFullUrl() . ' Foo]',
			'[[MediaWiki:Foo|Foo]]' => '[' . Title::newFromText( 'MediaWiki:Foo' )->getFullUrl() . ' Foo]',
			'[[Foo bar|ohai there]]' => '[' . Title::newFromText( 'Foo bar' )->getFullUrl() . ' ohai there]',
		
			'[[Foo]]' => '[' . Title::newFromText( 'Foo' )->getFullUrl() . ' Foo]',
			'[[MediaWiki:Foo]]' => '[' . Title::newFromText( 'MediaWiki:Foo' )->getFullUrl() . ' MediaWiki:Foo]',
			'[[Foo bar]]' => '[' . Title::newFromText( 'Foo bar' )->getFullUrl() . ' Foo bar]',
		
			'This should [not be altered!' => 'This should [not be altered!',
			"This''' should [not be alt/\\|ered!'''" => "This''' should [not be alt/\\|ered!'''",
			'[http://foo.bar/wiki/Baz O_o]' => '[http://foo.bar/wiki/Baz O_o]',
		);
		
		foreach ( $tests as $source => $target ) {
			$this->assertEquals(
				$target,
				ContestUtils::replaceRelativeLinks( $source )
			);
		}
	}
	
}
