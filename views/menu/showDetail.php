<p><a href="<?php echo PATH;?>menu" title="&larr; Back to the menu">&larr; Back to the menu</a></p>
<h1><?php echo $this->menu['title'].' - &pound;'.$this->menu['price'];?></h1>
<div class="food">
	<h3 class="category"><?php echo $this->menu['cate_title'];?></h3>
	<!-- food specific image is optional, but looks nice -->
	<div class="food_image">
		<img src="<?php echo PATH;?>views/menu/img/<?php echo $this->menu['image'];?>" alt="<?php echo $this->menu['title'].' - &pound;'.$this->menu['price'];?>" />
	</div>
	<div class="food_description">
		<p>
			<?php echo $this->menu['description'];?>
		</p>
	</div>

	<h3>Tags: &nbsp;</h3>
	<div id="tags-wrapper">
		<div class="tag" id="tag1">
			<a href="./../../tags/cocktail" title="Show where this tag is being used">cocktail</a>
		</div>
		<div class="tag" id="tag2">
			<a href="./../../tags/fish" title="Show where this tag is being used">fish</a>					
		</div>
		&nbsp;
	</div>

	<?php 
		$check = 0; // =0: menu này chưa rate, =1 menu này rate rồi
		if(isset($_SESSION['voted'])){
			if(in_array($this->menu['id'], $_SESSION['voted'])){
				$check = 1;
			}
		}
	 ?>

	<h3>Rating: &nbsp;</h3>
	<div id="ratings-wrapper">
		<div id="rating"><?php echo $this->menu['avrScore'];?> (<?php echo $this->menu['rate'];?> rating<?php echo $this->menu['more'];?>)</div>
		<?php if($check == 0) : ?>
		<div id="ratingswitch" style="visibility:visible">
			<a href="#" onclick="toggleRatingForm()">Add a rating</a>
		</div>
		<div id="ratingform" style="visibility:collapse; height:0px">
			<form action="<?php echo PATH."menu/".$this->menu['alias']; ?>" method="post" id="newratingform">
				<fieldset class="input">
					<div class="text" id="rating_input">
						<label for="rating">Select your rating:</label>
						<select name="rating" id="rating">							
							<option value="1">1 bad</option>
							<option value="2">2</option>
							<option value="3">3 ok</option>
							<option value="4">4</option>
							<option value="5" selected>5 delicious</option>
						</select>
						<span class="message"></span>
					</div>
					<div class="text" id="rating_captcha">
						<label for="captcha_input">Type in the text from the image:</label>
						<!-- captcha image: do not store on filesystem, but generate dynamically - modify path in /media/js/rating.js -->
						<img src="<?php echo PATH; ?>captcha/captcha.php" name="captcha_image" id="captcha_image" alt="Image with text to type in" title="Image with text to type in">
						<input type="text" name="captcha_input" id="captcha_input" size="5" maxlength="5"/>
					<?php if(isset($this->flag) && $this->flag == '2') : ?>
						<span class="message_error">
							Text didn't match the text on the CAPTCHA image. Please try again with a new one!
						</span>
						<!-- mở form ra cho ngta nhập lại khi nhập lỗi -->
						<script>toggleRatingForm();</script>
					<?php else : ?>
						<span class="message"></span>
					<?php endif ?>
					</div>
				</fieldset>
				<fieldset class="submit">
					<div class="submit">
						<input type="submit" value="Submit rating" />
					</div>
				</fieldset>
				<input type="hidden" name="action" value="rate" />
				<input type="hidden" name="menuId" value="<?php echo $this->menu['id']; ?>" />
			</form>
		</div> <!-- end div id="ratingform" -->
		<?php endif ?>
	</div> <!-- end div id="ratings-wrapper" -->			
</div>
<p><a href="<?php echo PATH;?>menu" title="&larr; Back to the menu">&larr; Back to the menu</a></p>