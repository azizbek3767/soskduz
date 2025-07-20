</main>
	<footer>
		<div class="footer-wrapper">
			<div class="container">
				<div class="row">
					<div class="footer-top section-name col-md-12"><h2 class="special-h1-class">{$LANG.contacts}</h2></div>
					<div class="footer-middle clearfix">
						<div class="info-part col-md-8">
							<div class="row">
								<div class="info-desc col-md-4">
									<span><i class="icmplace"></i>{$LANG.office_address}</span>
									<p>{$config.address}</p>
								</div>
								<div class="info-desc col-md-4">
									<span><i class="icmphone-call"></i>{$LANG.phones}</span>
									{if isset($config.phone)}<p>{$config.phone}</p>{/if}
									{if isset($config.phone_two)}<p>{$config.phone_two}</p>{/if}
								</div>
								<div class="info-desc col-md-4">
									<span><i class="icmemail"></i>{$LANG.email_address}</span>
									<p>{$config.email}</p>
								</div>
							</div>	
						</div>
						<div class="form-part col-md-4">
							<h2>{$LANG.newsletter}</h2>
							<form id="newsletter" action="{$GLOBAL_URL}/public/newsletter.php">
								<div class="input-content">
									<input type="email" name="email" class="input-control" placeholder="{$LANG.basket_your_email}" data-error="#newsletter_email">
									<span class="btn-def"><button type="submit" class="newsletter-btn"><i class="icmpaper-plane"></i></button></span>
								</div>
								<div class="social-desc"><h3>{$LANG.social_networks}</h3></div>
								<div class="social-buttons">{social}</div>
							</form>
						</div>
					</div>
					<div class="footer-bottom">
						<div class="copyright">
							<span>Copyright © {$smarty.now|date_format:"%Y"}</span>
						</div>
						<div class="footer-links">
							{fetch_section assign=offer section=54} <a href="{$offer.url}">{$offer.name}</a>
							{if $SITE_LANG == 'en'}
								{fetch_section assign=policy section=63}<a href="{$policy.url}">{$policy.name}</a>
							{elseif $SITE_LANG == 'uz'}
								{fetch_section assign=policy section=60}<a href="{$policy.url}">{$policy.name}</a>
							{else}
								{fetch_section assign=policy section=56}<a href="{$policy.url}">{$policy.name}</a>
							{/if}
						</div>
					</div>
				</div>
			</div>
		</div>
	</footer>
		<!-- Подключение скриптов -->
	<script src="{$THEME_URL}/js/scripts.min.js"></script>
	<script src="{$THEME_URL}/js/jquery.maskedinput.js"></script>
	<script src="{$THEME_URL}/js/validate.min.js"></script>
	<script src="{$THEME_URL}/js/messages.js"></script>
		
	<script src="{$THEME_URL}/js/main.js"></script>
	
	{include file="init/app-init.tpl"}
	
	{include file='init/request-init.tpl'}
	
	<script src="{$THEME_URL}/js/plugins/owl.carousel.min.js"></script>
	
	

	
    <script>
        function goBack() {
            window.history.back();
        }
        window.onload = function(){
			if($(".traderoutes-map path").length > 0){
				var containerCountry = $("[data-container-country]") || null;
				if(!containerCountry)
					return;
				$(".traderoutes-map path").on("mouseenter", function(){
					var itemNum = $(this).attr("data-country");
					containerCountry.map(function(i, el){
						$(el).find(".item").removeClass("is-selected");
						$(el).find(".item").eq(itemNum-1).addClass("is-selected");
					})
					console.log(itemNum);
				});

			}
		}
    </script>
	
	{if $config.yandex_metrika !=''}{yandex_metrika}{/if}
    {if $config.google_analytics !=''}{google_analytics}{/if}
</body>
</html>



