<?php
/**
 * Page Settings class.
 *
 * Adds a custom settings tab and controls in Elementor editor.
 *
 * @package RBELAD_Elementor_Addons
 */

namespace RBELAD_Elementor_Addons;

use Elementor\Controls_Manager;
use Elementor\Core\DocumentTypes\PageBase;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Handles custom Elementor page settings.
 */
class Page_Settings {

	/**
	 * Custom panel tab slug.
	 *
	 * @var string
	 */
	const PANEL_TAB = 'new-tab';

	/**
	 * Constructor.
	 *
	 * Registers actions to add custom panel tab and controls.
	 */
	public function __construct() {
		add_action( 'elementor/init', array( $this, 'add_panel_tab' ) );
		add_action( 'elementor/documents/register_controls', array( $this, 'register_document_controls' ) );
	}

	/**
	 * Register a panel tab slug.
	 *
	 * Allows adding custom controls to this new tab in the Elementor editor.
	 *
	 * @return void
	 */
	public function add_panel_tab() {
		Controls_Manager::add_tab(
			self::PANEL_TAB,
			esc_html__( 'New Tab', 'rb-elementor-addons' )
		);
	}

	/**
	 * Register additional document controls.
	 *
	 * Ensures controls are only added to documents that support elements.
	 *
	 * @param PageBase $document The document instance.
	 *
	 * @return void
	 */
	public function register_document_controls( $document ) {
		// Only add controls to document types that support elements.
		if ( ! $document instanceof PageBase || ! $document::get_property( 'has_elements' ) ) {
			return;
		}

		$document->start_controls_section(
			'rbelad_section',
			array(
				'label' => esc_html__( 'Settings', 'rb-elementor-addons' ),
				'tab'   => self::PANEL_TAB,
			)
		);

		$document->add_control(
			'rbelad_text',
			array(
				'label'   => esc_html__( 'Title', 'rb-elementor-addons' ),
				'type'    => Controls_Manager::TEXT,
				'default' => esc_html__( 'Title', 'rb-elementor-addons' ),
			)
		);

		$document->end_controls_section();
	}
}
