<?php
class Elementor_Box_Favoritos_Precios extends \Elementor\Widget_Base {
	public function get_name() {
		return 'Box_Favoritos_Precios';
	}
	public function get_title() {
		return esc_html__( 'Box Favoritos', 'elementor-addon' );
	}
	public function get_icon() {
		return 'eicon-database';
	}
	public function get_categories() {
		return [ 'basic' ];
	}
	public function get_keywords() {
		return [ 'icon list', 'icon', 'list' ];
	}
	protected function register_controls() {
		// =========================================================================================
		// ===================================== SECCION TAB =====================================
		// =========================================================================================
		global $post;
		$this->start_controls_section( // ==== INI RIBBON ====
			'section_ribbon',
			[
				'label' => esc_html__( 'Ribbon', 'elementor-tato' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control(
			'show_ribbon',
			[
				'label' => esc_html__( 'Show Ribbon', 'elementor-tato' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Show', 'elementor-tato' ),
				'label_off' => esc_html__( 'Hide', 'elementor-tato' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);
		$this->end_controls_section(); // ==== FIN RIBBON ====

		$this->start_controls_section( // ==== INI TITULO ====
			'section_title',
			[
				'label' => esc_html__( 'Title', 'elementor-tato' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);
				
		$this->add_control(
			'image_tour',
			[
				'label' => esc_html__( 'Image', 'elementor-tato' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);	
		
		$this->add_control(
			'title_tour',
			[
				'label' => esc_html__( 'Tour', 'elementor-tato' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( $post->post_title, 'elementor-tato' ),
			]
		);

		$repeater = new \Elementor\Repeater();
		$repeater->add_control(
			'text',
			[
				'label' => esc_html__( 'Text', 'elementor-tato' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'label_block' => true,
				'placeholder' => esc_html__( 'List Item', 'elementor-tato' ),
				'default' => esc_html__( 'List Item', 'elementor-tato' ),
				'dynamic' => [
					'active' => true,
				],
			]
		);
		$repeater->add_control(
			'selected_icon',
			[
				'label' => esc_html__( 'Icon', 'elementor-tato' ),
				'type' => \Elementor\Controls_Manager::ICONS,
				'default' => [
					'value' => 'fas fa-check',
					'library' => 'fa-solid',
				],
				'fa4compatibility' => 'icon',
			]
		);
		$this->add_control(
			'icon_list',
			[
				'label' => esc_html__( 'Items', 'elementor-tato' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'text' => esc_html__( 'List Item #1', 'elementor-tato' ),
						'selected_icon' => [
							'value' => 'fas fa-check',
							'library' => 'fa-solid',
						],
					],
					[
						'text' => esc_html__( 'List Item #2', 'elementor-tato' ),
						'selected_icon' => [
							'value' => 'fas fa-times',
							'library' => 'fa-solid',
						],
					],
					[
						'text' => esc_html__( 'List Item #3', 'elementor-tato' ),
						'selected_icon' => [
							'value' => 'fas fa-dot-circle',
							'library' => 'fa-solid',
						],
					],
				],
				'title_field' => '{{{ elementor.helpers.renderIcon( this, selected_icon, {}, "i", "panel" ) || \'<i class="{{ icon }}" aria-hidden="true"></i>\' }}} {{{ text }}}',
			]
		);
		
		$this->add_control(
			'price_tour',
			[
				'label' => esc_html__( 'Price', 'elementor-tato' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( '250', 'elementor-tato' ),
			]
		);
		$this->end_controls_section();

		$this->start_controls_section( // ==== INI PRICE ====
			'section_buton',
			[
				'label' => esc_html__( 'Button', 'elementor-tato' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'buton_tour',
			[
				'label' => esc_html__( 'Text', 'elementor-tato' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'RESERVAR', 'elementor-tato' ),
			]
		);
		$this->add_control(
			'buton_tour',
			[
				'label' => esc_html__( 'Text', 'elementor-tato' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'RESERVAR', 'elementor-tato' ),
			]
		);
		$this->add_control(
			'button_link',
			[
				'label' => __( 'Link', 'elementor-tato' ),
				'type' => \Elementor\Controls_Manager::URL,				
				'placeholder' => esc_html__( get_permalink($post->ID), 'elementor-tato' ),
			]
		);
		
		$this->end_controls_section();

		// =========================================================================================
		// ===================================== SECCION STYLE =====================================
		// =========================================================================================
		$this->start_controls_section( // SECCION RIBBON 
			'section_ribbon_style',
			[
				'label' => esc_html__( 'Ribbon', 'elementor-tato' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'ribbon_text',
			[
				'label' => esc_html__( 'Ribbon Text', 'elementor-tato' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'PROMOCION', 'elementor-tato' ),
				'selectors' => [
					"{{WRAPPER}} .myPricing" => "--text: '{{VALUE}}';",
				],
			]
		);
		
		$this->add_control( // TITULO COLOR
			'ribbon_first_color',
			[
				'label' => esc_html__( 'First Color', 'elementor-tato' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#FF8300',
				'selectors' => [
					'{{WRAPPER}} .myPricing' => '--first-color: {{VALUE}};',
					
				],
			]
		);
		$this->add_control( // TITULO COLOR
			'ribbon_second_color',
			[
				'label' => esc_html__( 'Second Color', 'elementor-tato' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#d68306',
				'selectors' => [
					'{{WRAPPER}} .myPricing' => '--second-color: {{VALUE}};',					
				],
			]
		);
		$this->end_controls_section();

		$this->start_controls_section( // SECCION TITULO
			'section_title_style',
			[
				'label' => esc_html__( 'Title', 'elementor-tato' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);
		
		$this->add_control( // TITULO COLOR
			'title_color',
			[
				'label' => esc_html__( 'Color', 'elementor-tato' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#fff',
				'selectors' => [
					'{{WRAPPER}} .tato_titulo h5' => 'color: {{VALUE}};',
					
				],
			]
		);

		$this->add_control( // TITULO BAKGROUND COLOR
			'title_background',
			[
				'label' => esc_html__( 'Background', 'elementor-tato' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#431258',
				'selectors' => [
					'{{WRAPPER}} .tato_titulo' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'title_height',
			[
				'label' => esc_html__( 'Height (px)', 'elementor-tato' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'default' => [
					'unit' => 'px',
				],
				'range' => [
					'px' => [
						'min' => 1,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .tato_titulo' => 'height: {{SIZE}}{{UNIT}}',
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section( // SECCION ICON
			'section_icon_style',
			[
				'label' => esc_html__( 'Icon', 'elementor-tato' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_responsive_control(
			'space_between',
			[
				'label' => esc_html__( 'Space Between', 'elementor-tato' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'max' => 50,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .elementor-icon-list-items:not(.elementor-inline-items) .elementor-icon-list-item:not(:last-child)' => 'padding-bottom: calc({{SIZE}}{{UNIT}}/2)',
					'{{WRAPPER}} .elementor-icon-list-items:not(.elementor-inline-items) .elementor-icon-list-item:not(:first-child)' => 'margin-top: calc({{SIZE}}{{UNIT}}/2)',
					'{{WRAPPER}} .elementor-icon-list-items.elementor-inline-items .elementor-icon-list-item' => 'margin-right: calc({{SIZE}}{{UNIT}}/2); margin-left: calc({{SIZE}}{{UNIT}}/2)',
					'{{WRAPPER}} .elementor-icon-list-items.elementor-inline-items' => 'margin-right: calc(-{{SIZE}}{{UNIT}}/2); margin-left: calc(-{{SIZE}}{{UNIT}}/2)',
					'body.rtl {{WRAPPER}} .elementor-icon-list-items.elementor-inline-items .elementor-icon-list-item:after' => 'left: calc(-{{SIZE}}{{UNIT}}/2)',
					'body:not(.rtl) {{WRAPPER}} .elementor-icon-list-items.elementor-inline-items .elementor-icon-list-item:after' => 'right: calc(-{{SIZE}}{{UNIT}}/2)',
				],
			]
		);

		$this->add_responsive_control(
			'icon_align',
			[
				'label' => esc_html__( 'Alignment', 'elementor-tato' ),
				'type' => \Elementor\Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
						'title' => esc_html__( 'Left', 'elementor-tato' ),
						'icon' => 'eicon-h-align-left',
					],
					'center' => [
						'title' => esc_html__( 'Center', 'elementor-tato' ),
						'icon' => 'eicon-h-align-center',
					],
					'right' => [
						'title' => esc_html__( 'Right', 'elementor-tato' ),
						'icon' => 'eicon-h-align-right',
					],
				],
				'prefix_class' => 'elementor%s-align-',
			]
		);

		$this->add_control(
			'divider',
			[
				'label' => esc_html__( 'Divider', 'elementor-tato' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_off' => esc_html__( 'Off', 'elementor-tato' ),
				'label_on' => esc_html__( 'On', 'elementor-tato' ),
				'selectors' => [
					'{{WRAPPER}} .elementor-icon-list-item:not(:last-child):after' => 'content: ""',
				],
				'separator' => 'before',
			]
		);
		
		$this->add_control(
			'divider_style',
			[
				'label' => esc_html__( 'Style', 'elementor-tato' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => [
					'solid' => esc_html__( 'Solid', 'elementor-tato' ),
					'double' => esc_html__( 'Double', 'elementor-tato' ),
					'dotted' => esc_html__( 'Dotted', 'elementor-tato' ),
					'dashed' => esc_html__( 'Dashed', 'elementor-tato' ),
				],
				'default' => 'solid',
				'condition' => [
					'divider' => 'yes',
				],
				'selectors' => [
					'{{WRAPPER}} .elementor-icon-list-items:not(.elementor-inline-items) .elementor-icon-list-item:not(:last-child):after' => 'border-top-style: {{VALUE}}',
					'{{WRAPPER}} .elementor-icon-list-items.elementor-inline-items .elementor-icon-list-item:not(:last-child):after' => 'border-left-style: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'divider_weight',
			[
				'label' => esc_html__( 'Weight', 'elementor-tato' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'default' => [
					'size' => 1,
				],
				'range' => [
					'px' => [
						'min' => 1,
						'max' => 20,
					],
				],
				'condition' => [
					'divider' => 'yes',
				],
				'selectors' => [
					'{{WRAPPER}} .elementor-icon-list-items:not(.elementor-inline-items) .elementor-icon-list-item:not(:last-child):after' => 'border-top-width: {{SIZE}}{{UNIT}}',
					'{{WRAPPER}} .elementor-inline-items .elementor-icon-list-item:not(:last-child):after' => 'border-left-width: {{SIZE}}{{UNIT}}',
				],
			]
		);

		$this->add_control(
			'divider_width',
			[
				'label' => esc_html__( 'Width', 'elementor-tato' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'default' => [
					'unit' => '%',
				],
				'condition' => [
					'divider' => 'yes',
					'view!' => 'inline',
				],
				'selectors' => [
					'{{WRAPPER}} .elementor-icon-list-item:not(:last-child):after' => 'width: {{SIZE}}{{UNIT}}',
				],
			]
		);

		$this->add_control(
			'divider_height',
			[
				'label' => esc_html__( 'Height', 'elementor-tato' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ '%', 'px' ],
				'default' => [
					'unit' => '%',
				],
				'range' => [
					'px' => [
						'min' => 1,
						'max' => 100,
					],
					'%' => [
						'min' => 1,
						'max' => 100,
					],
				],
				'condition' => [
					'divider' => 'yes',
					'view' => 'inline',
				],
				'selectors' => [
					'{{WRAPPER}} .elementor-icon-list-item:not(:last-child):after' => 'height: {{SIZE}}{{UNIT}}',
				],
			]
		);

		$this->add_control(
			'divider_color',
			[
				'label' => esc_html__( 'Color', 'elementor-tato' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#ddd',
				'scheme' => [
					'type' => \Elementor\Scheme_Color::get_type(),
          			'value' => \Elementor\Scheme_Color::COLOR_3,
				],
				'condition' => [
					'divider' => 'yes',
				],
				'selectors' => [
					'{{WRAPPER}} .elementor-icon-list-item:not(:last-child):after' => 'border-color: {{VALUE}}',
				],
			]
		);

		$this->add_control( // ICON COLOR
			'icon_color',
			[
				'label' => esc_html__( 'Color', 'elementor-tato' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .elementor-icon-list-icon i' => 'color: {{VALUE}};',
					'{{WRAPPER}} .elementor-icon-list-icon svg' => 'fill: {{VALUE}};',
				],
				'scheme' => [
					'type' => \Elementor\Scheme_Color::get_type(),
          			'value' => \Elementor\Scheme_Color::COLOR_1,
				],
			]
		);

		$this->add_control( // ICON HOVER
			'icon_color_hover',
			[
				'label' => esc_html__( 'Hover', 'elementor-tato' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .elementor-icon-list-item:hover .elementor-icon-list-icon i' => 'color: {{VALUE}};',
					'{{WRAPPER}} .elementor-icon-list-item:hover .elementor-icon-list-icon svg' => 'fill: {{VALUE}};',
				],
			]
		);

		$this->add_responsive_control( // ICON SIZE
			'icon_size',
			[
				'label' => esc_html__( 'Size', 'elementor-tato' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'default' => [
					'size' => 14,
				],
				'range' => [
					'px' => [
						'min' => 6,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .elementor-icon-list-icon i' => 'font-size: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .elementor-icon-list-icon svg' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control( // ICON ALING
			'icon_self_align',
			[
				'label' => esc_html__( 'Alignment', 'elementor-tato' ),
				'type' => \Elementor\Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
						'title' => esc_html__( 'Left', 'elementor-tato' ),
						'icon' => 'eicon-h-align-left',
					],
					'center' => [
						'title' => esc_html__( 'Center', 'elementor-tato' ),
						'icon' => 'eicon-h-align-center',
					],
					'right' => [
						'title' => esc_html__( 'Right', 'elementor-tato' ),
						'icon' => 'eicon-h-align-right',
					],
				],
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .elementor-icon-list-icon' => 'text-align: {{VALUE}};',
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section( // SECCION ICON TEXT
			'section_text_style',
			[
				'label' => esc_html__( 'Text', 'elementor-tato' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control( // ICON TEXT COLOR
			'text_color',
			[
				'label' => esc_html__( 'Text Color', 'elementor-tato' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .elementor-icon-list-text' => 'color: {{VALUE}};',
				],
				'scheme' => [
					'type' => \Elementor\Scheme_Color::get_type(),
          			'value' => \Elementor\Scheme_Color::COLOR_2,
				],
			]
		);

		$this->add_control( // ICON TEXT HOVER
			'text_color_hover',
			[
				'label' => esc_html__( 'Hover', 'elementor-tato' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .elementor-icon-list-item:hover .elementor-icon-list-text' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control( // ICONO TEXT ESPACIO
			'text_indent',
			[
				'label' => esc_html__( 'Text Indent', 'elementor-tato' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'max' => 50,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .elementor-icon-list-text' => is_rtl() ? 'padding-right: {{SIZE}}{{UNIT}};' : 'padding-left: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_group_control( // ICONO TEXT TYPOGRAPHY
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'icon_typography',
				'selector' => '{{WRAPPER}} .elementor-icon-list-item',
				'scheme' => \Elementor\Scheme_Typography::TYPOGRAPHY_3,
			]
		);

		$this->end_controls_section();

		$this->start_controls_section( // SECCION BOTON STYLE
			'section_buton_style',
			[
				'label' => esc_html__( 'Button', 'elementor-tato' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control( // BOTON TEXT COLOR
			'buton_text_color',
			[
				'label' => esc_html__( 'Text Color', 'elementor-tato' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#fff',
				'selectors' => [
					'{{WRAPPER}} .btn-tato-primary' => 'color: {{VALUE}};',
				],
				'scheme' => [
					'type' => \Elementor\Scheme_Color::get_type(),
          			'value' => \Elementor\Scheme_Color::COLOR_2,
				],
			]
		);

		$this->add_control( // BOTON COLOR
			'buton_color',
			[
				'label' => esc_html__( 'Background', 'elementor-tato' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#431258',
				'selectors' => [
					'{{WRAPPER}} .btn-tato-primary' => 'background: {{VALUE}};',
				],
				'scheme' => [
					'type' => \Elementor\Scheme_Color::get_type(),
          			'value' => \Elementor\Scheme_Color::COLOR_2,
				],
			]
		);

		$this->add_responsive_control( // BOTON ALING
			'buton_aling',
			[
				'label' => esc_html__( 'Alignment', 'elementor-tato' ),
				'type' => \Elementor\Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
						'title' => esc_html__( 'Left', 'elementor-tato' ),
						'icon' => 'eicon-h-align-left',
					],
					'center' => [
						'title' => esc_html__( 'Center', 'elementor-tato' ),
						'icon' => 'eicon-h-align-center',
					],
					'right' => [
						'title' => esc_html__( 'Right', 'elementor-tato' ),
						'icon' => 'eicon-h-align-right',
					],
				],
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .tato-seccion-btn' => 'text-align: {{VALUE}};',
				],
			]
		);

		$this->end_controls_section();
	}

	protected function render() {
		$url = site_url();
		$settings = $this->get_settings_for_display();
		$fallback_defaults = [
			'fa fa-check',
			'fa fa-times',
			'fa fa-dot-circle-o',
		];
		$this->add_render_attribute( 'icon_list', 'class', 'elementor-icon-list-items' );?>	
		<div class="container">
			<div class="card-deck py-5" style="padding:10px">
				<a href="<?php if(! empty($settings['button_link']['url'])) {
										echo $settings['button_link']['url'];								
									} else {
										echo '#';
									}?>" style="text-decoration: none;">
					<div class="card box-shadow">
						<!-- SECCION RIBBON -->
						<?php 
							if ( 'yes' === $settings['show_ribbon'] ) {
								echo '<div class="myPricing">
									<div class=" myRibbon">
									</div>
								</div>';
							}
						?>                                 
						<div class="card-body">
							<!-- SECCION IMAGEN -->
							<?php echo \Elementor\Group_Control_Image_Size::get_attachment_image_html( $settings, 'thumbnail', 'image_tour');?>
							<!-- SECCION TITULO -->
							<div class="tato-seccion-btn tato_titulo">
								<h5><?php echo $settings['title_tour'];?></h5>		
							</div>
							<!-- SECCION LISTA ICONOS -->
							<div class="my-icon-wrapper">
								<?php \Elementor\Icons_Manager::render_icon( $settings['icon'], [ 'aria-hidden' => 'true' ] ); ?>
							</div>
							<!-- <div style="padding: 10px;"> -->
								<ul <?php echo $this->get_render_attribute_string( 'icon_list' ); ?> style="list-style: none; margin: 10px;">
									<?php
									foreach ( $settings['icon_list'] as $index => $item ) :
										$repeater_setting_key = $this->get_repeater_setting_key( 'text', 'icon_list', $index );

										$this->add_render_attribute( $repeater_setting_key, 'class', 'elementor-icon-list-text' );

										$this->add_inline_editing_attributes( $repeater_setting_key );
										$migration_allowed = \Elementor\Icons_Manager::is_migration_allowed();
										?>
										<li class="elementor-icon-list-item" >
											<?php
											// add old default
											if ( ! isset( $item['icon'] ) && ! $migration_allowed ) {
												$item['icon'] = isset( $fallback_defaults[ $index ] ) ? $fallback_defaults[ $index ] : 'fa fa-check';
											}
											$migrated = isset( $item['__fa4_migrated']['selected_icon'] );
											$is_new = ! isset( $item['icon'] ) && $migration_allowed;
											if ( ! empty( $item['icon'] ) || ( ! empty( $item['selected_icon']['value'] ) && $is_new ) ) :
												?>
												<span class="elementor-icon-list-icon">
													<?php
													if ( $is_new || $migrated ) {
														\Elementor\Icons_Manager::render_icon( $item['selected_icon'], [ 'aria-hidden' => 'true' ] );
													} else { ?>
															<i class="<?php echo esc_attr( $item['icon'] ); ?>" aria-hidden="true"></i>
													<?php } ?>
												</span>
											<?php endif; ?>
											<span <?php echo $this->get_render_attribute_string( $repeater_setting_key ); ?>><?php echo $item['text']; ?></span>
										</li>
										<?php
									endforeach;
									?>
								</ul>
							<!-- </div>	 -->
							<!-- SECCION PRECIO -->
							<div class="text-right" style="text-align: right;">
								<div class="titulo-precio pricing-card-title parrafo">
									Precio<br>
									Por Persona <span style="font-size: x-large;">USD <?php echo $settings['price_tour'];?></span>
								</div>
							</div>
							<!-- SECCION BOTON -->
							<!-- <div class="tato-seccion-btn">
								<form action="<?php if(! empty($settings['button_link']['url'])) {
										echo $settings['button_link']['url'];								
									} else {
										echo '#';
									}?>">
									<button type="submit" class="btn btn-tato-primary btn-lg btn-block"><?php echo $settings['buton_tour'];?></butto/>
								</form>
							</div> -->
						</div>  
					</div>
				</a>
			</div>
        </div>
		<style>
			.tatito{
				text-decoration: none;
				list-style: none;
			}
			.box-shadow{
				box-shadow: 0px 0px 10px 0px rgb(0 0 0 / 80%);
				border-radius: 10px 10px 10px 10px;
			}

            .card-body{
                padding: 0.4rem;
            }
            .label-tato{
                margin-bottom: 0.1rem;
            }
            .btn-tato-primary{
                color: #ea657f;
                background-color: #431258;
                border-color: #431258;
            }
            .btn-tato-success{
                color: #fff;
                background-color: #930d5f;
                border-color: #431258;
            }
            .btn-tato-primary:hover
            {
                color: #fff;
                background-color: #930d5f;
                border-color: #431258;
            }

            /*Ribbon Shape CSS*/
            .myPricing{
                /* --text: 'PROMOCION'; */
                /*--first-color: #ff6900; 
                --second-color: #d68306;*/                
                position: relative;
            }

            .myPricing .myRibbon{
                position: absolute;
                top: -10px;
                left: -10px;
                width: 150px;
                height: 150px;
                display: flex;
                justify-content: center;
                align-items: center;
                overflow: hidden;
                z-index: 10;
            }
            .myPricing .myRibbon::before{
                content: var(--text);
                position: absolute;
                width: 150%;
                height: 40px;
                background: var(--first-color);
                transform: rotate(-45deg) translateY(-20px);
                display: flex;
                justify-content: center;
                align-items: center;
                font-size: 14px;
                font-weight: 600;
                color: #fff;
                letter-spacing: 0.1em;
                box-shadow: 0 5px 10px rgba(0,0,0,0.1);
            }
            .myPricing .myRibbon::after{
                content: '';
                position: absolute;
                bottom: 0;
                left: 0;
                width: 10px;
                height: 10px;
                background: var(--second-color);
                z-index: -1;
                box-shadow: 140px -140px var(--second-color);
            }

            /* .promocion {
                position: absolute; 
                border-left: none;
                padding: 0 8px;
                border-radius: 0 0.5rem 0.5rem 0;
                left: 0;
                background: #FF8300;
                color: #FFF;
            } */
        </style>
		<?php
	}
}