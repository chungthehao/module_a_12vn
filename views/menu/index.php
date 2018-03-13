<h1>Menu of Gordon&#39;s Crown</h1>
<div id="sidebar">
	<h2>Jump to ...</h2>
	<ul>
		<?php
		foreach($this->cateList as $cate){
			echo '<li><a href="#'.$cate['alias'].'" onclick="goToByScroll(\''.$cate['alias'].'\');">'.$cate['title'].'</a></li>';
		}
		?>
	</ul>
</div>
<div id="foods">
	<?php foreach($this->cateList as $cate) : ?>
	<h2><a class="category" name="<?php echo $cate['alias'];?>"><?php echo $cate['title'];?></a></h2>		
	<h3 class="rating">Rating: <?php echo $cate['aveRatings'];?> (<?php echo $cate['rate'];?> rating<?php echo $cate['more'];?>)</h3>
	<div class="category">
		<div class="foodcategory_image">
			<img src="<?php echo PATH."views/menu/img/$cate[image]";?>" alt="<?php echo $cate['title_image'];?>" />
		</div>
		<ul>
			<?php
			foreach($cate['menuList'] as $menu){
				echo 	'<li>
							<a href="./menu/'.$menu['alias'].'" title="Go to detail view of '.$menu['title'].' - &pound;'.$menu['price'].'">'.$menu['title'].' - &pound;'.$menu['price'].'</a>
						</li>';
			}
			?>					
		</ul>
	</div> <!-- hết div class="category" -->
	<?php endforeach ?>
</div> <!-- hết id = foods -->
<div id="rssfed"><a href="<?php echo PATH;?>menu/feed/"><img src="<?php echo PATH;?>media/img/rss.gif" alt="RSS-Feed with Menus" title="RSS-Feed with Menus""></a></div>