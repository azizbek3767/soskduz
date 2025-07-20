{include file="header.tpl" title=$section.meta_title keywords=$section.keywords description=$section.description}

{include file='modules/slider.tpl'}


<section class="waw-wrapper">
    <div class="container">
        <div class="row">
            <div class="waw-more-info-wrapper col-md-4 counter-animate-container">
                <div class="waw-more-info">
                    {fetch_sections assign=facts from=38 status="visible"}
                    {foreach item=fact from=$facts name=facts}
                        <div class="desc-content">
                            <h3>{$fact.name}</h3>
                            <h2 class="special-h1-class"><span class="counter-animate ">{$fact.alias}</span>+</h2>
                            {$fact.summary nofilter}
                        </div>
                    {/foreach}
                </div>
            </div>
            {fetch_section assign=about section=2}{if $about.status eq 'visible'}
                <div class="waw-main-info col-md-8">
                    <div class="section-name">
                        <h2>{$about.alias}</h2>
                        <h1>{$about.name}</h1>
                    </div>
                    <div class="desc-content">{$about.summary nofilter}</div>
                    <div class="waw-button"><span class="btn-def-2"><a
                                    href="{$about.url}">{$LANG.more_details}</a></span></div>
                </div>
            {/if}
        </div>


        <!-- PROGRAM CARDS SECTION -->


        <div class="row">
            {fetch_section assign=about section=3}{if $about.status eq 'visible'}
                <div class="waw-main-info col-md-8">
                    <div class="section-name">
                        <h2>{$about.alias}</h2>
                        <h2 class="special-h1-class">{$about.name}</h2>
                    </div>
                </div>
            {/if}</div>

        <div class="program-cards">
            <ul>
                {foreach item=navItem1 from=$TREE name=navItems1}
                    {foreach item=navItem2 from=$navItem1.subsections}
                        {if $navItem2.parentId == 3}
                            {fetch_section assign=video section=$navItem2.sectionId image=true}
                            {if $video.status eq 'visible'}
                                <li class="program-card">
                                    <a href="{$navItem2.url}" target="_self">
                        <span class="sr-only" role="img"
                              aria-label="People light candles during a demonstration in Bogota, Colombia"></span>
                                        <span class="img-container-wrap">
                                <span class="img-container"
                                      style="background-image: url('{$video.images.medium.url}');"></span>
                            </span>
                                        <span class="program-card-icon">
                                <img src="https://www.sos-kd.uz/uploads/articles/270/logo-SOS.png"
                                     alt="Civic Engagement and Government icon">
                                </span>
                                        <h3 style="color: #15706C;">{$navItem2.alias}</h3>
                                    </a>
                                </li>
                            {/if}
                        {/if}
                    {/foreach}
                {/foreach}
{*                {fetch_section assign=questions section=32 image=true}*}
{*                {if $questions.status eq 'visible'}*}
{*                    <li class="program-card">*}
{*                        <a href="{$questions.url}" target="_self">*}
{*                        <span class="sr-only" role="img"*}
{*                              aria-label="People light candles during a demonstration in Bogota, Colombia"></span>*}
{*                            <span class="img-container-wrap">*}
{*                                 <span class="img-container"*}
{*                                       style="background-image: url('{$questions.images.medium.url}');"></span>*}
{*                            </span>*}
{*                            <span class="program-card-icon">*}
{*                                <img src="https://www.sos-kd.uz/uploads/articles/270/logo-SOS.png"*}
{*                                     alt="Civic Engagement and Government icon">*}
{*                                </span>*}
{*                            <h3 style="color: #15706C;">{$questions.name}</h3>*}
{*                        </a>*}
{*                    </li>*}
{*                {/if}*}
            </ul>
        </div>

        {fetch_section assign=video section=8 image=true}{if $video.status eq 'visible'}
        <div class="section-name" style="margin-top:55px;">
            <h2>Видео</h2>
            <h2 class="special-h1-class" style="margin-bottom:55px;">{$video.name}</h2>
            <div>
                <div class="waw-video-wrapper col-md-8">
                    <div class="waw-video" style="background-image: url('{$video.images.medium.url}');">
                        <a href="{$video.alias}" data-fancybox data-width="640" data-height="360"><span
                                    class="icmicon"></span></a>
                    </div>
                </div>
            </div>
            {/if}
        </div>


        {*<div class="row">

            {fetch_section assign=video section=8 image=true}{if $video.status eq 'visible'}

            <div class="waw-video-wrapper col-md-4">
                <div class="waw-video" style="background-image: url('{$video.images.medium.url}');">
                    <a href="{$video.alias}" data-fancybox data-width="640" data-height="360"><span class="icmicon"></span></a>
                </div>
            </div>
            {/if}
            {fetch_section assign=galleries section=42 image=true}{if $galleries.status eq 'visible'}
            <div class="waw-carousel-wrapper col-md-8 nav-style-2">
                <div class="waw-carousel owl-carousel">
                    {foreach from=$galleries.gallery item=gallery }
                    <div class="carousel-item">
                        <div class="waw-carousel-img" style="background-image: url('{$gallery.url}big-{$gallery.fileName}');">
                            <div class="waw-carousel-action">
                                <a href="{$gallery.url}medium-{$gallery.fileName}" data-fancybox>
                                    <i class="icmzoom-in"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    {/foreach}
                </div>
            </div>

            {/if}

        </div>*}


    </div>
</section>

{*{fetch_section assign=postcards section=23}{if $postcards.status eq 'visible'}
<section class="charity-wrapper">
	<div class="container">
		<div class="section-name">
			<h2>{$LANG.help_us_children}</h2>
			<h2 class="special-h1-class">{$postcards.name}</h2>
			<div class="charity-more-info"><a href="{$postcards.url}">	<h2>{$LANG.view_all}</h2><i class="icmangle-arrow-down"></i></a></div>
		</div>
		<div class="charity-carousel-wrapper nav-style-1">
			<div class="owl-carousel charity-carousel">
				{fetch_articles limit=10 assign=postcards section=34 type_content='products'}
                {foreach item=postcard from=$postcards name=postcards}
                    {include file="modules/product-item-block.tpl" class="carousel-item"}
                {/foreach}
			</div>
		</div>
	</div>
</section>
{/if}*}

{fetch_section assign=news section=7}{if $news.status eq 'visible'}
    <section class="news-wrapper">
        <div class="container">
            <div class="section-name">
                <h2>{$news.alias}</h2>
                <h2 class="special-h1-class">{$news.name}</h2>
                <div class="news-more-info"><a href="{$news.url}"><h2>{$LANG.all_news}</h2><i
                                class="icmangle-arrow-down"></i></a></div>
            </div>
            <div class="row">
                <div class="novelties clearfix">
                    {fetch_articles assign=sectionArticles section=$news.sectionId limit=3 type_content="news"}
                    {if isset($sectionArticles)}
                        {foreach item=content from=$sectionArticles name=sectionArticles}
                            <div class="novelty-wrapper col-md-4">
                                <div class="novelty">
                                    <div class="img-content">
                                        <div class="img"><img src="{$content.images.medium.url}" alt="{$content.title}">
                                        </div>
                                    </div>
                                    <div class="desc-content">
                                        <span> <i class="icmcalendar"></i> {$content.publishedOn|date_format:"%e.%m.%Y"}</span>
                                        <a href="{$content.url}">{$content.title}</a>
                                        <p data-text-limit="150">{$content.summary|strip_tags|truncate:150 nofilter}</p>
                                    </div>
                                </div>
                            </div>
                        {/foreach}
                    {/if}
                </div>
            </div>
        </div>
    </section>
{/if}
{fetch_section assign=partners section=5}{if $partners.status eq 'visible'}
    <section class="partners-wrapper">
        <div class="container">
            <div class="section-name"><h2 class="special-h1-class">{$partners.name}</h2></div>
            <div class="owl-carousel partners-carousel nav-style-2">
                {fetch_articles assign=sectionPartners section=$partners.sectionId limit=30 type_content="partners"}
                {if isset($sectionPartners)}
                    {foreach item=partner from=$sectionPartners name=sectionPartners}
                        <div class="carousel-item">
                            <div class="partners-item">
                                <a href="{$partner.link}">
                                    <div class="img-content">
                                        <div class="img"><img src="{$partner.images.medium.url}" alt="{$partner.title}">
                                        </div>
                                    </div>
                                    <div class="desc-content"><h4>{$partner.title}</h4></div>
                                </a>
                            </div>
                        </div>
                    {/foreach}{/if}


            </div>
        </div>
    </section>
{/if}

{include file="footer.tpl"}
