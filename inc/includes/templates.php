<?php
/**
 * Shortcode Markup
 *
 * TMPL - Single Demo Preview
 * TMPL - No more demos
 * TMPL - Filters
 * TMPL - List
 *
 * @package Astra Sites
 * @since 1.0.0
 */

defined( 'ABSPATH' ) or exit;

?>

<script type="text/template" id="tmpl-ast-template-base-skeleton">
	<div class="dialog-widget dialog-lightbox-widget dialog-type-buttons dialog-type-lightbox" id="ast-sites-modal">
		<div class="dialog-widget-content dialog-lightbox-widget-content">
			<div class="astra-sites-content-wrap">
				<div id="ast-sites-floating-notice-wrap-id" class="ast-sites-floating-notice-wrap"><div class="ast-sites-floating-notice"></div></div>
				<?php
				$status = get_option( 'astra-sites-batch-is-complete', 'no' );
				if ( 'yes' === $status ) {
					?>
					<div class="ast-sites-floating-notice-wrap refreshed-notice slide-in">
						<div class="ast-sites-floating-notice">
							<div class="astra-sites-sync-library-message success notice notice-success is-dismissible">
								<?php _e( 'Template library refreshed!', 'astra-sites' ); ?> <button type="button" class="notice-dismiss"><span class="screen-reader-text"><?php _e( 'Dismiss', 'astra-sites' ); ?></span></button>
							</div>
						</div>
					</div>
				<?php } ?>
				<div class="dialog-message dialog-lightbox-message" data-type="pages">
					<div class="dialog-content dialog-lightbox-content theme-browser"></div>
					<div class="theme-preview"></div>
				</div>
				<div class="dialog-message dialog-lightbox-message-block" data-type="blocks">
					<div class="dialog-content dialog-lightbox-content-block theme-browser"></div>
					<div class="theme-preview-block"></div>
				</div>
			</div>
			<div class="dialog-buttons-wrapper dialog-lightbox-buttons-wrapper"></div>
		</div>
		<div class="dialog-background-lightbox"></div>
	</div>
</script>

<script type="text/template" id="tmpl-ast-template-modal__header-back">
	<div class="dialog-lightbox-back"><span class="dialog-lightbox-back-text"><?php echo __( 'Back to Pages', 'astra-sites' ); ?></span></div>
</script>

<script type="text/template" id="tmpl-ast-template-modal__header">
	<div class="dialog-header dialog-lightbox-header">
		<div class="ast-sites-modal__header">
			<div class="ast-sites-modal__header__logo-area position-left-last">
				<div class="ast-sites-modal__header__logo">
					<span class="ast-sites-modal__header__logo__icon-wrapper"></span>
				</div>
				<div class="back-to-layout" title="<?php _e( 'Back to Layout', 'astra-sites' ); ?>" data-step="1"><i class="icon-chevron-left"></i></div>
			</div>
			<div class="ast-sites-modal__header__menu-area astra-sites-step-1-wrap">
				<div class="elementor-template-library-header-menu">
					<div class="search-form">
						<input autocomplete="off" placeholder="<?php _e( 'Search...', 'astra-sites' ); ?>" type="search" aria-describedby="live-search-desc" id="wp-filter-search-input" class="wp-filter-search">
						<span class="icon-search search-icon"></span>
						<div class="astra-sites-autocomplete-result"></div>
					</div>
				</div>
			</div>
			<div class="elementor-templates-modal__header__menu-area astra-sites-step-1-wrap ast-sites-modal__options">
				<div class="elementor-template-library-header-menu">
					<div class="elementor-template-library-menu-item elementor-active" data-template-source="remote" data-template-type="pages"><span class="icon-file"></span><?php _e( 'Pages', 'astra-sites' ); ?></div>		
					<div class="elementor-template-library-menu-item" data-template-source="remote" data-template-type="blocks"><span class="icon-layers"></span><?php _e( 'Blocks', 'astra-sites' ); ?></div>
					<div class="astra-sites__sync-wrap">
						<div class="astra-sites-sync-library-button">
							<span class="icon-refresh" aria-hidden="true" title="<?php _e( 'Sync Library', 'astra-sites' ); ?>"></span>
						</div>
					</div>
				</div>
			</div>
			<div class="elementor-templates-modal__header__items-area">
				<div class="ast-sites-modal__header__close ast-sites-modal__header__close--normal ast-sites-modal__header__item">
					<i class="eicon-close" aria-hidden="true" title="<?php _e( 'Close', 'astra-sites' ); ?>"></i>
					<span class="elementor-screen-only"><?php _e( 'Close', 'astra-sites' ); ?></span>
				</div>
			</div>
		</div>
	</div>
</script>

<script type="text/template" id="tmpl-astra-sites-list">

	<#
		var count = 0;
		for ( key in data ) {
			var page_data = data[ key ][ 'pages' ];
			if ( 0 == Object.keys( page_data ).length ) {
				continue;
			}
			var type_class = ' site-type-' + data[ key ]['astra-sites-type'];
			var site_type = data[ key ][ 'astra-sites-type' ] || '';
			var site_title = data[ key ]['title'].slice( 0, 25 );
			if ( data[ key ]['title'].length > 25 ) {
				site_title += '...';
			}
			count++;
	#>
			<div class="theme astra-theme site-single publish page-builder-elementor {{type_class}}" data-site-id={{key}} data-template-id="">
				<div class="inner">
					<span class="site-preview" data-href="" data-title={{site_title}}>
						<div class="theme-screenshot one loading" data-step="1" data-src={{data[ key ]['thumbnail-image-url']}} data-featured-src={{data[ key ]['featured-image-url']}}></div>
					</span>
					<div class="theme-id-container">
						<h3 class="theme-name">{{{site_title}}}</h3>
					</div>
					<# if ( site_type && 'free' !== site_type ) { #>
						<img class="agency-icon" src="<?php echo ASTRA_SITES_URI . 'inc/assets/images/agency.svg'; ?>" alt="<?php _e( 'Agency Template', 'astra-sites' ); ?>" title="<?php _e( 'Agency Template', 'astra-sites' ); ?>" />
					<# } #>
				</div>
			</div>
	<#
		}
	#>
</script>

<script type="text/template" id="tmpl-astra-blocks-list">

	<#
		var count = 0;
		for ( key in data ) {
			var site_title = ( undefined == data[ key ]['category'][0] ) ? data[ key ]['title'] : data[ key ]['category'][0];
			count++;
	#>
		<div class="astra-sites-library-template astra-theme" data-block-id={{key}}>
			<div class="astra-sites-library-template-inner theme-screenshot" data-step="1">
				<div class="elementor-template-library-template-body">
					<img src="{{data[ key ]['featured-image-url']}}">
				</div>
				<div class="theme-id-container">
					<h3 class="theme-name">{{{site_title}}}</h3>
				</div>
			</div>
		</div>
	<#
		}
		if ( count == 0 ) {
	#>
		<div class="astra-sites-no-sites">
			<div class="inner">
				<h3><?php _e( 'Sorry No Result Found.', 'astra-sites' ); ?></h3>
				<div class="content">
					<div class="description">
						<p>
						<?php
						/* translators: %1$s External Link */
						printf( __( 'Don\'t see a template you would like to import?<br><a target="_blank" href="%1$s">Please Suggest Us!</a>', 'astra-sites' ), esc_url( 'https://wpastra.com/sites-suggestions/?utm_source=demo-import-panel&utm_campaign=astra-sites&utm_medium=suggestions' ) );
						?>
						</p>
						<div class="back-to-layout-button"><span class="button astra-sites-back"><?php _e( 'Back to Templates', 'astra-sites' ); ?></span></div>
					</div>
				</div>
			</div>
		</div>
	<#
		}
	#>
</script>

<script type="text/template" id="tmpl-astra-sites-list-search">

	<#
		var count = 0;

		for ( ind in data ) {
			var site_type = data[ ind ]['site-pages-type'];
			var type_class = ' site-type-' + site_type;
			var site_id = ( undefined == data.site_id ) ? data[ind].site_id : data.site_id;
			if ( undefined == site_type ) {
				continue;
			}
			if ( 'gutenberg' == data[ind]['site-pages-page-builder'] ) {
				continue;
			}
			var site_title = data[ ind ]['title'].slice( 0, 25 );
			if ( data[ ind ]['title'].length > 25 ) {
				site_title += '...';
			}
			count++;
	#>
		<div class="theme astra-theme site-single publish page-builder-elementor {{type_class}}" data-template-id={{ind}} data-site-id={{site_id}}>
			<div class="inner">
				<span class="site-preview" data-href="" data-title={{site_title}}>
					<div class="theme-screenshot one loading" data-step="2" data-src={{data[ ind ]['thumbnail-image-url']}} data-featured-src={{data[ ind ]['featured-image-url']}}></div>
				</span>
				<div class="theme-id-container">
					<h3 class="theme-name">{{{site_title}}}</h3>
				</div>
				<# if ( site_type && 'free' !== site_type ) { #>
					<img class="agency-icon" src="<?php echo ASTRA_SITES_URI . 'inc/assets/images/agency.svg'; ?>" alt="<?php _e( 'Agency Template', 'astra-sites' ); ?>" title="<?php _e( 'Agency Template', 'astra-sites' ); ?>" />
				<# } #>
			</div>
		</div>
	<#
		}

		if ( count == 0 ) {
	#>
		<div class="astra-sites-no-sites">
			<div class="inner">
				<h3><?php _e( 'Sorry No Result Found.', 'astra-sites' ); ?></h3>
				<div class="content">
					<div class="description">
						<p>
						<?php
						/* translators: %1$s External Link */
						printf( __( 'Don\'t see a template you would like to import?<br><a target="_blank" href="%1$s">Please Suggest Us!</a>', 'astra-sites' ), esc_url( 'https://wpastra.com/sites-suggestions/?utm_source=demo-import-panel&utm_campaign=astra-sites&utm_medium=suggestions' ) );
						?>
						</p>
						<div class="back-to-layout-button"><span class="button astra-sites-back"><?php _e( 'Back to Templates', 'astra-sites' ); ?></span></div>
					</div>
				</div>
			</div>
		</div>
	<#
		}
	#>
</script>

<script type="text/template" id="tmpl-astra-sites-search">

	<#
		var count = 0;

		for ( ind in data ) {
			if ( 'gutenberg' == data[ind]['site-pages-page-builder'] ) {
				continue;
			}

			var site_id = ( undefined == data.site_id ) ? data[ind].site_id : data.site_id;
			var site_type = data[ ind ]['site-pages-type'];

			if ( 'site' == data[ind]['type'] ) {
				site_type = data[ ind ]['astra-sites-type'];
			}

			var parent_name = '';
			if ( undefined != data[ind]['parent-site-name'] ) {
				var parent_name = $( "<textarea/>") .html( data[ind]['parent-site-name'] ).text();
			}

			var complete_title = parent_name + ' - ' + data[ ind ]['title'];
			var site_title = complete_title.slice( 0, 25 );
			if ( complete_title.length > 25 ) {
				site_title += '...';
			}

			var tmp = site_title.split(' - ');
			var title1 = site_title;
			var title2 = '';
			if ( undefined !== tmp && undefined !== tmp[1] ) {
				title1 = tmp[0];
				title2 = ' - ' + tmp[1];
			} else {
				title1 = tmp[0];
				title2 = '';
			}

			var type_class = ' site-type-' + site_type;
			count++;
	#> 
		<div class="theme astra-theme site-single publish page-builder-elementor {{type_class}}" data-template-id={{ind}} data-site-id={{site_id}}>
			<div class="inner">
				<span class="site-preview" data-href="" data-title={{title2}}>
					<div class="theme-screenshot one loading" data-type={{data[ind]['type']}} data-step={{data[ind]['step']}} data-show="search" data-src={{data[ ind ]['thumbnail-image-url']}} data-featured-src={{data[ ind ]['featured-image-url']}}></div>
				</span>
				<div class="theme-id-container">
					<h3 class="theme-name"><strong>{{title1}}</strong>{{title2}}</h3>
				</div>
				<# if ( site_type && 'free' !== site_type ) { #>
					<img class="agency-icon" src="<?php echo ASTRA_SITES_URI . 'inc/assets/images/agency.svg'; ?>" alt="<?php _e( 'Agency Template', 'astra-sites' ); ?>" title="<?php _e( 'Agency Template', 'astra-sites' ); ?>" />
				<# } #>
			</div>
		</div>
	<#
		}

		if ( count == 0 ) {
	#>
		<div class="astra-sites-no-sites">
			<div class="inner">
				<h3><?php _e( 'Sorry No Result Found.', 'astra-sites' ); ?></h3>
				<div class="content">
					<div class="description">
						<p>
						<?php
						/* translators: %1$s External Link */
						printf( __( 'Don\'t see a template you would like to import?<br><a target="_blank" href="%1$s">Please Suggest Us!</a>', 'astra-sites' ), esc_url( 'https://wpastra.com/sites-suggestions/?utm_source=demo-import-panel&utm_campaign=astra-sites&utm_medium=suggestions' ) );
						?>
						</p>
						<div class="back-to-layout-button"><span class="button astra-sites-back"><?php _e( 'Back to Templates', 'astra-sites' ); ?></span></div>
					</div>
				</div>
			</div>
		</div>
	<#
		}
	#>
</script>

<script type="text/template" id="tmpl-astra-sites-insert-button">
	<div id="elementor-template-library-header-preview-insert-wrapper" class="elementor-templates-modal__header__item" data-template-id={{data.template_id}} data-site-id={{data.site_id}}>
		<a class="elementor-template-library-template-action elementor-template-library-template-insert elementor-button">
			<i class="eicon-file-download" aria-hidden="true"></i>
			<span class="elementor-button-title"><?php _e( 'Insert', 'astra-sites' ); ?></span>
		</a>

	</div>
</script>

/**
 * TMPL - Third Party Required Plugins
 */
?>
<script type="text/template" id="tmpl-astra-sites-third-party-required-plugins">
	<div class="astra-sites-third-party-required-plugins-wrap">
		<h3 class="theme-name"><?php esc_html_e( 'Required Plugin Missing', 'astra-sites' ); ?></h3>
		<p><?php esc_html_e( 'This starter site requires premium plugins. As these are third party premium plugins, you\'ll need to purchase, install and activate them first.', 'astra-sites' ); ?></p>
		<ul class="astra-sites-third-party-required-plugins">
			<# for ( key in data ) { #>
				<li class="plugin-card plugin-card-{{data[ key ].slug}}'" data-slug="{{data[ key ].slug }}" data-init="{{data[ key ].init}}" data-name="{{data[ key ].name}}"><a href="{{data[ key ].link}}" target="_blank">{{data[ key ].name}}</a></li>
			<# } #>
		</ul>
	</div>
</script>

<script type="text/template" id="tmpl-astra-sites-no-sites">
	<div class="astra-sites-no-sites">
		<div class="inner">
			<h3><?php _e( 'Sorry No Result Found.', 'astra-sites' ); ?></h3>
			<div class="content">
				<div class="empty-item">
					<img class="empty-collection-part" src="<?php echo ASTRA_SITES_URI . 'inc/assets/images/empty-collection.svg'; ?>" alt="empty-collection">
				</div>
				<div class="description">
					<p>
					<?php
					/* translators: %1$s External Link */
					printf( __( 'Don\'t see a template you would like to import?<br><a target="_blank" href="%1$s">Please Suggest Us!</a>', 'astra-sites' ), esc_url( 'https://wpastra.com/sites-suggestions/?utm_source=demo-import-panel&utm_campaign=astra-sites&utm_medium=suggestions' ) );
					?>
					</p>
					<div class="back-to-layout-button"><span class="button astra-sites-back"><?php _e( 'Back to Templates', 'astra-sites' ); ?></span></div>
				</div>
			</div>
		</div>
	</div>
	<#
</script>

<script type="text/template" id="tmpl-astra-sites-elementor-preview">
	<#
	let wrap_height = $elscope.find( '.astra-sites-content-wrap' ).height();
	wrap_height = ( wrap_height - 45 );
	wrap_height = wrap_height + 'px';
	#>
	<div id="astra-blocks" class="themes wp-clearfix" data-site-id="{{data.id}}" style="display: block;">
		<div class="single-site-wrap">
			<div class="single-site">
				<div class="single-site-preview-wrap">
					<div class="single-site-preview" style="max-height: {{wrap_height}};">
						<img class="theme-screenshot" data-src="" src="{{data['featured-image-url']}}">
					</div>
				</div>
			</div>
		</div>
	</div>
</script>

<script type="text/template" id="tmpl-astra-sites-elementor-preview-actions">
	<#
	var demo_link = '';
	var action_str = '';
	if ( 'blocks' == AstraElementorSitesAdmin.type ) {
		demo_link = astraElementorSites.astra_blocks[AstraElementorSitesAdmin.block_id]['url'];
		action_str = 'Block';
	} else {
		demo_link = data['astra-page-url'];
		action_str = 'Template';
	}
	#>
	<div class="astra-preview-actions-wrap">
		<div class="astra-preview-actions-inner-wrap">
			<div class="astra-preview-actions">
				<div class="site-action-buttons-wrap">
					<div class="astra-sites-import-template-action site-action-buttons-right">

						<#
						var is_free = true;
						if ( 'pages' == AstraElementorSitesAdmin.type ) {
							if( 'free' !== data['site-pages-type'] && ! astraElementorSites.license_status ) {
								is_free = false;
							}
						}
						if( ! is_free ) { #>
							<a class="button button-hero button-primary" href="{{astraElementorSites.getProURL}}" target="_blank">{{astraElementorSites.getProText}}<i class="dashicons dashicons-external"></i></a>
						<# } else { #>
							<div type="button" class="button button-hero button-primary ast-library-template-insert disabled"><?php _e( 'Import ', 'astra-sites' ); ?>{{action_str}}</div>
							<div type="button" class="button button-hero button-primary ast-import-elementor-template disabled"><?php _e( 'Save ', 'astra-sites' ); ?>{{action_str}}</div>
						<# } #>


						<div class="astra-sites-tooltip"><span class="astra-sites-tooltip-icon" data-tip-id="astra-sites-tooltip-plugins-settings"><span class="dashicons dashicons-editor-help"></span></span></div>
					</div>
				</div>
			</div>
			<div class="ast-tooltip-wrap">
				<div>
					<div class="ast-tooltip-inner-wrap" id="astra-sites-tooltip-plugins-settings">
						<ul class="required-plugins-list"><span class="spinner is-active"></span></ul>
					</div>
				</div>
			</div>
		</div>
	</div>
</script>

<?php
