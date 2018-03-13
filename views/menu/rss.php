<?php
	header("Content-type: text/xml");
?>
<rss xmlns:atom="http://www.w3.org/2005/Atom" version="2.0">
    <channel>
        <title>Gordon's Crown Menus</title>
        <link><?php echo PATH; ?></link>
		<atom:link href="<?php echo PATH;?>menu/feed/" rel="self" type="application/rss+xml" />
        <description>This is RSS Feed of Gordon's Crown Menus</description>
        <language>en</language>
        <?php foreach($this->menuList as $k => $menu) : ?>
        <item>
            <title><?php echo "Menu ".($k+1); ?></title>
			<link><?php echo PATH; ?>menu/<?php echo $menu['alias']; ?></link>
			<guid isPermaLink="false"><?php echo PATH; ?>menu/<?php echo $menu['alias']; ?></guid>
			<category><![CDATA[<?php echo $menu['cate_title']; ?>]]></category>		
            <description><![CDATA[
				<p><?php echo $menu['description']; ?></p>
				<div name="menuimage"><img src="<?php echo PATH; ?>views/menu/img/<?php echo $menu['image']; ?>" alt="<?php echo $menu['title']; ?>" title="<?php echo $menu['title']; ?>" /></div>
				<div name="menueprice">Price: &pound;<?php echo $menu['price']; ?></div>
				<div name="menuerating">Rating: <?php echo $menu['avrScore']; ?> (<?php echo $menu['rate']; ?> rating<?php echo $menu['more']; ?>)</div>
				<div name="menuetags">Tags: <a href="http://www.gordonscrown.local/tags/fish">fish</a>, <a href="http://www.gordonscrown.local/tags/cocktail">cocktail</a></div>
			]]></description> 	
        </item>
    	<?php endforeach ?>
	</channel>
</rss>