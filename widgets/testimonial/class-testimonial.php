<?php
/**
 * Testimonial Widget.
 *
 * @package RBELAD_Elementor_Addons
 */

namespace RBELAD_Elementor_Addons\Widgets;

use RBELAD_Elementor_Addons\Widgets\Base;

defined( 'ABSPATH' ) || die();

/**
 * Testimonial class.
 */
class Testimonial extends Base {
	/**
	 * Register widget search keywords
	 */
	public function get_keywords() {
		return array(
			'testimonial',
			'blockquote',
		);
	}

	/**
	 * Register widget control
	 */
	protected function register_controls() {
		$this->register_content_tab();
		$this->register_style_tab();
	}

	/**
	 * Widget content tab
	 */
	protected function register_content_tab() {
		$this->__general_content();
	}

	/**
	 * Content - General
	 */
	protected function __general_content() {
		require RBELAD_WIDGET_PATH . 'testimonial/content/general.php';
	}

	/**
	 * Widget style tab
	 */
	protected function register_style_tab() {
		$this->__rating_style();
		$this->__rating_full_style();
		$this->__rating_half_style();
		$this->__rating_empty_style();
		$this->__comment_style();
		$this->__reviewer_img_style();
		$this->__reviewer_name_style();
		$this->__reviewer_designation_style();
		$this->__quote_style();
		$this->__quote_icon_style();
		$this->__reviewer_img_wrap_style();
		$this->__quote_icon_img_style();
		$this->__footer_section_style();
		$this->__absolute_section_style();
		$this->__wrap_style();
	}

	/**
	 * Style - Rating
	 */
	protected function __rating_style() {
		require RBELAD_WIDGET_PATH . 'testimonial/style/rating.php';
	}

	/**
	 * Style - Rating Full
	 */
	protected function __rating_full_style() {
		require RBELAD_WIDGET_PATH . 'testimonial/style/rating-full.php';
	}

	/**
	 * Style - Rating Half
	 */
	protected function __rating_half_style() {
		require RBELAD_WIDGET_PATH . 'testimonial/style/rating-half.php';
	}

	/**
	 * Style - Rating Empty
	 */
	protected function __rating_empty_style() {
		require RBELAD_WIDGET_PATH . 'testimonial/style/rating-empty.php';
	}

	/**
	 * Style - Comment
	 */
	protected function __comment_style() {
		require RBELAD_WIDGET_PATH . 'testimonial/style/comment.php';
	}

	/**
	 * Style - Reviewer Image Wrap
	 */
	protected function __reviewer_img_wrap_style() {
		require RBELAD_WIDGET_PATH . 'testimonial/style/reviewer-img-wrap.php';
	}

	/**
	 * Style - Reviewer Image
	 */
	protected function __reviewer_img_style() {
		require RBELAD_WIDGET_PATH . 'testimonial/style/reviewer-img.php';
	}

	/**
	 * Style - Reviewer Name
	 */
	protected function __reviewer_name_style() {
		require RBELAD_WIDGET_PATH . 'testimonial/style/reviewer-name.php';
	}

	/**
	 * Style - Reviewer Designation
	 */
	protected function __reviewer_designation_style() {
		require RBELAD_WIDGET_PATH . 'testimonial/style/reviewer-designation.php';
	}

	/**
	 * Style - Quote
	 */
	protected function __quote_style() {
		require RBELAD_WIDGET_PATH . 'testimonial/style/quote.php';
	}

	/**
	 * Style - Quote Icon
	 */
	protected function __quote_icon_style() {
		require RBELAD_WIDGET_PATH . 'testimonial/style/quote-icon.php';
	}

	/**
	 * Style - Quote Icon Image
	 */
	protected function __quote_icon_img_style() {
		require RBELAD_WIDGET_PATH . 'testimonial/style/quote-icon-img.php';
	}

	/**
	 * Style - Footer Section
	 */
	protected function __footer_section_style() {
		require RBELAD_WIDGET_PATH . 'testimonial/style/footer-section.php';
	}

	/**
	 * Style - Absolute Section
	 */
	protected function __absolute_section_style() {
		require RBELAD_WIDGET_PATH . 'testimonial/style/absolute-section.php';
	}

	/**
	 * Style - Wrap
	 */
	protected function __wrap_style() {
		require RBELAD_WIDGET_PATH . 'testimonial/style/wrap.php';
	}

	/**
	 * Register render display control
	 */
	protected function render() {
		require RBELAD_WIDGET_PATH . 'testimonial/render/design-1.php';
	}
}
